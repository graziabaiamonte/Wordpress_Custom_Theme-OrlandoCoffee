// CODICE PER VIDEO CON CANVAS PER SINCRONIZZAZIONE PERFETTA
const sliceDiv = document.getElementById("slice");
const video = document.querySelector("#slice video"); // The original video element
const canvases = []; // Stores { canvas, ctx, sliceIndex, logicalWidth, logicalHeight }
const gridX = 3; // Number of slices

// Main function to set up the sliced video display using canvas
function setupVideoSlices() {
  if (!video) {
    console.error("Video element #slice video not found.");
    return;
  }
  if (!sliceDiv) {
    console.error("Container element #slice not found.");
    return;
  }

  // Wait for video metadata to be loaded to get intrinsic dimensions
  if (
    video.readyState < video.HAVE_METADATA ||
    video.videoWidth === 0 ||
    video.videoHeight === 0
  ) {
    const onMetadataLoaded = () => {
      video.removeEventListener("loadedmetadata", onMetadataLoaded);
      video.removeEventListener("loadeddata", onMetadataLoaded); // Also listen to loadeddata as fallback
      setupVideoSlices(); // Retry setup
    };
    video.addEventListener("loadedmetadata", onMetadataLoaded, { once: true });
    video.addEventListener("loadeddata", onMetadataLoaded, { once: true });
    // console.log("Waiting for video metadata...");
    return;
  }

  const containerW = sliceDiv.offsetWidth;
  const containerH = sliceDiv.offsetHeight;

  if (containerW === 0 || containerH === 0) {
    console.warn(
      "#slice container has no dimensions. Slicing may not work as expected. Retrying in 100ms."
    );
    setTimeout(setupVideoSlices, 100); // Retry if container not ready
    return;
  }

  // Clear any existing slice divs created by this script
  const existingSliceDivs = sliceDiv.querySelectorAll(
    ":scope > div.slice-generated-container"
  );
  existingSliceDivs.forEach((div) => div.remove());
  canvases.length = 0; // Clear the canvases array

  for (let i = 0; i < gridX; i++) {
    const sliceContainer = document.createElement("div");
    sliceContainer.classList.add("slice-generated-container"); // Mark for potential cleanup
    sliceDiv.appendChild(sliceContainer);

    // Calculate slice dimensions using Math.round for potentially more even distribution
    // and to avoid floating point inaccuracies leading to gaps.
    const currentSliceIdealStart = (i * containerW) / gridX;
    const nextSliceIdealStart = ((i + 1) * containerW) / gridX;

    const sliceLeftComputed = Math.round(currentSliceIdealStart);
    let sliceWidthComputed;

    if (i === gridX - 1) {
      // For the last slice, ensure it extends exactly to containerW from its computed start.
      sliceWidthComputed = containerW - sliceLeftComputed;
    } else {
      // For other slices, width is the difference between the rounded start of the next slice
      // and the rounded start of this slice.
      sliceWidthComputed = Math.round(nextSliceIdealStart) - sliceLeftComputed;
    }

    // Safety for tiny containers or extreme rounding:
    if (sliceWidthComputed < 0) sliceWidthComputed = 0;

    sliceContainer.style.position = "absolute";
    sliceContainer.style.left = sliceLeftComputed + "px";
    sliceContainer.style.top = "0px";
    sliceContainer.style.width = sliceWidthComputed + "px";
    sliceContainer.style.height = containerH + "px";
    sliceContainer.style.overflow = "hidden"; // Clip content if canvas somehow overflows

    const dpr = window.devicePixelRatio || 1;
    const canvas = document.createElement("canvas");
    canvas.width = Math.round(sliceWidthComputed * dpr); // Use computed width for canvas backing store
    canvas.height = Math.round(containerH * dpr);
    canvas.style.width = "100%"; // Fill the sliceContainer
    canvas.style.height = "100%"; // Fill the sliceContainer
    sliceContainer.appendChild(canvas);

    const ctx = canvas.getContext("2d");
    ctx.scale(dpr, dpr); // Scale context for high-DPI displays

    canvases.push({
      canvas: canvas,
      ctx: ctx,
      sliceIndex: i,
      logicalWidth: sliceWidthComputed, // Use the calculated sliceWidth
      logicalHeight: containerH,
    });

    // Add classes for GSAP animation
    if (i === 0) sliceContainer.classList.add("left");
    else if (i === 1) sliceContainer.classList.add("center");
    else sliceContainer.classList.add("right");
  }

  // Hide original video but keep it playing for audio and frames
  video.style.position = "absolute";
  video.style.opacity = "0";
  video.style.pointerEvents = "none";
  video.style.width = "1px"; // Minimize layout impact
  video.style.height = "1px";
  video.style.top = "-10px"; // Move effectively off-screen
  video.style.left = "-10px";

  video.muted = true; // Essential for autoplay in many browsers
  video.loop = true; // Assuming looping video, adjust if not
  video.setAttribute("playsinline", ""); // Good for mobile
  video.play().catch((e) => console.error("Video play attempt failed:", e));

  // Start the rendering loop
  // Only start rendering loop if it's not already running? Or just let rAF handle it.
  // For simplicity, we'll just call it. If called multiple times, rAF handles queuing.
  // A more robust approach might track if a frame is already requested.
  // For this case, it's likely fine as setupVideoSlices is called once on load.

  // Animazioni GSAP (rimangono simili, agiscono sui div contenitori)
  // Initialize GSAP animations *after* the slice divs are created
  gsap.fromTo(
    "#slice div.left",
    { rotateY: 0 },
    {
      rotateY: -45,
      ease: "power2.out",
      scrollTrigger: {
        trigger: "#slice",
        start: "top top",
        end: "bottom top",
        scrub: true,
        markers: false,
      },
    }
  );

  gsap.fromTo(
    "#slice div.right",
    { rotateY: 0 },
    {
      rotateY: 45,
      ease: "power2.out",
      scrollTrigger: {
        trigger: "#slice",
        start: "top top",
        end: "bottom top",
        scrub: true,
        markers: false,
      },
    }
  );
  renderFrame();
}

function renderFrame() {
  if (!video || canvases.length === 0) {
    // If setup is not complete or video removed, stop requesting frames
    return;
  }

  if (
    !video.paused &&
    !video.ended &&
    video.videoWidth > 0 &&
    video.videoHeight > 0
  ) {
    const containerW = sliceDiv.offsetWidth;
    const containerH = sliceDiv.offsetHeight;

    const videoW = video.videoWidth;
    const videoH = video.videoHeight;

    // Calculate 'object-fit: cover' properties for the video within the #slice container
    let sx = 0,
      sy = 0,
      sWidth = videoW,
      sHeight = videoH;
    const videoAspect = videoW / videoH;
    const containerAspect = containerW / containerH;
    if (videoAspect > containerAspect) {
      // Video wider than container (crop width)
      sHeight = videoH;
      sWidth = videoH * containerAspect;
      sx = (videoW - sWidth) / 2;
    } else {
      // Video taller than container (crop height)
      sWidth = videoW;
      sHeight = videoW / containerAspect;
      sy = (videoH - sHeight) / 2;
    }

    canvases.forEach((item) => {
      const { ctx, sliceIndex, logicalWidth, logicalHeight } = item;

      // Revised calculation for source rectangle for this specific slice
      // This ensures contiguous sampling from the source video frame by using
      // a rounding strategy similar to how slice container widths are calculated.
      const currentSliceSourceXIdeal = sx + (sliceIndex * sWidth) / gridX;
      const nextSliceSourceXIdeal = sx + ((sliceIndex + 1) * sWidth) / gridX;

      let sliceSourceXComputed = Math.round(currentSliceSourceXIdeal);
      let sliceSourceWidthComputed;

      if (sliceIndex === gridX - 1) {
        // For the last slice, ensure it samples up to the very end of the
        // 'covered' source width (sx + sWidth).
        sliceSourceWidthComputed =
          Math.round(sx + sWidth) - sliceSourceXComputed;
      } else {
        // For other slices, width is the difference between the rounded start
        // of the next slice's source and the rounded start of this slice's source.
        sliceSourceWidthComputed =
          Math.round(nextSliceSourceXIdeal) - sliceSourceXComputed;
      }

      // Safety for tiny dimensions or extreme rounding:
      if (sliceSourceWidthComputed < 0) sliceSourceWidthComputed = 0;

      ctx.clearRect(0, 0, logicalWidth, logicalHeight); // Clear logical area

      ctx.drawImage(
        video, // Source HTMLVideoElement
        sliceSourceXComputed, // Source X from video frame
        sy, // Source Y from video frame
        sliceSourceWidthComputed, // Width of source rectangle for this slice
        sHeight, // Height of source rectangle (full covered height)
        0, // Destination X on canvas (0)
        0, // Destination Y on canvas (0)
        logicalWidth, // Destination width on canvas
        logicalHeight // Destination height on canvas
      );
    });
  }
  requestAnimationFrame(renderFrame);
}

// Ensure DOM is ready before calling this, l'animazione avviene solo in desktop
function isDesktop() {
  return window.innerWidth >= 768; // o la tua breakpoint per desktop
}

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", () => {
    if (isDesktop()) setupVideoSlices();
  });
} else {
  if (isDesktop()) setupVideoSlices();
}

const sliceDiv = document.getElementById("slice"),
  video = document.querySelector("#slice video"),
  canvases = [],
  gridX = 3;
function setupVideoSlices() {
  if (!video) {
    console.error("Video element #slice video not found.");
    return;
  }
  if (!sliceDiv) {
    console.error("Container element #slice not found.");
    return;
  }
  if (
    video.readyState < video.HAVE_METADATA ||
    0 === video.videoWidth ||
    0 === video.videoHeight
  ) {
    let e = () => {
      video.removeEventListener("loadedmetadata", e),
        video.removeEventListener("loadeddata", e),
        setupVideoSlices();
    };
    video.addEventListener("loadedmetadata", e, { once: !0 }),
      video.addEventListener("loadeddata", e, { once: !0 });
    return;
  }
  let t = sliceDiv.offsetWidth,
    i = sliceDiv.offsetHeight;
  if (0 === t || 0 === i) {
    console.warn(
      "#slice container has no dimensions. Slicing may not work as expected. Retrying in 100ms."
    ),
      setTimeout(setupVideoSlices, 100);
    return;
  }
  let o = sliceDiv.querySelectorAll(":scope > div.slice-generated-container");
  o.forEach((e) => e.remove()), (canvases.length = 0);
  for (let d = 0; d < 3; d++) {
    let s = document.createElement("div");
    s.classList.add("slice-generated-container"), sliceDiv.appendChild(s);
    let r = (d * t) / 3,
      l = ((d + 1) * t) / 3,
      n = Math.round(r),
      a;
    (a = 2 === d ? t - n : Math.round(l) - n) < 0 && (a = 0),
      (s.style.position = "absolute"),
      (s.style.left = n + "px"),
      (s.style.top = "0px"),
      (s.style.width = a + "px"),
      (s.style.height = i + "px"),
      (s.style.overflow = "hidden");
    let c = window.devicePixelRatio || 1,
      v = document.createElement("canvas");
    (v.width = Math.round(a * c)),
      (v.height = Math.round(i * c)),
      (v.style.width = "100%"),
      (v.style.height = "100%"),
      s.appendChild(v);
    let p = v.getContext("2d");
    p.scale(c, c),
      canvases.push({
        canvas: v,
        ctx: p,
        sliceIndex: d,
        logicalWidth: a,
        logicalHeight: i,
      }),
      0 === d
        ? s.classList.add("left")
        : 1 === d
        ? s.classList.add("center")
        : s.classList.add("right");
  }
  (video.style.position = "absolute"),
    (video.style.opacity = "0"),
    (video.style.pointerEvents = "none"),
    (video.style.width = "1px"),
    (video.style.height = "1px"),
    (video.style.top = "-10px"),
    (video.style.left = "-10px"),
    (video.muted = !0),
    (video.loop = !0),
    video.setAttribute("playsinline", ""),
    video.play().catch((e) => console.error("Video play attempt failed:", e)),
    gsap.fromTo(
      "#slice div.left",
      { rotateY: 0 },
      {
        rotateY: -45,
        ease: "power2.out",
        scrollTrigger: {
          trigger: "#slice",
          start: "top top",
          end: "bottom top",
          scrub: !0,
          markers: !1,
        },
      }
    ),
    gsap.fromTo(
      "#slice div.right",
      { rotateY: 0 },
      {
        rotateY: 45,
        ease: "power2.out",
        scrollTrigger: {
          trigger: "#slice",
          start: "top top",
          end: "bottom top",
          scrub: !0,
          markers: !1,
        },
      }
    ),
    renderFrame();
}
function renderFrame() {
  if (video && 0 !== canvases.length) {
    if (
      !video.paused &&
      !video.ended &&
      video.videoWidth > 0 &&
      video.videoHeight > 0
    ) {
      let e = sliceDiv.offsetWidth,
        t = sliceDiv.offsetHeight,
        i = video.videoWidth,
        o = video.videoHeight,
        d = 0,
        s = 0,
        r = i,
        l = o,
        n = e / t;
      i / o > n
        ? ((l = o), (d = (i - (r = o * n)) / 2))
        : ((r = i), (s = (o - (l = i / n)) / 2)),
        canvases.forEach((e) => {
          let { ctx: t, sliceIndex: i, logicalWidth: o, logicalHeight: n } = e,
            a = d + (i * r) / 3,
            c = d + ((i + 1) * r) / 3,
            v = Math.round(a),
            p;
          (p = 2 === i ? Math.round(d + r) - v : Math.round(c) - v) < 0 &&
            (p = 0),
            t.clearRect(0, 0, o, n),
            t.drawImage(video, v, s, p, l, 0, 0, o, n);
        });
    }
    requestAnimationFrame(renderFrame);
  }
}
function isDesktop() {
  return window.innerWidth >= 768;
}
"loading" === document.readyState
  ? document.addEventListener("DOMContentLoaded", () => {
      isDesktop() && setupVideoSlices();
    })
  : isDesktop() && setupVideoSlices();
