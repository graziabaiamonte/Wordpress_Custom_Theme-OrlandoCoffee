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
