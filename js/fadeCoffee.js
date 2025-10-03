if (
  document.querySelector(".section-coffee") &&
  document.querySelector("#testoMain") &&
  document.querySelector("#testoMainSinistra") &&
  document.querySelector("#testoMainD") &&
  document.querySelector("#testoSecondD") &&
  document.querySelector("#lineaSecond") &&
  document.querySelector("#buttonCoffee")
) {
  let e = gsap.timeline({
    scrollTrigger: {
      trigger: "#intro",
      start: "top bottom",
      end: "bottom center",
      scrub: !1,
      toggleActions: "play reverse play reverse",
      markers: !1,
    },
  });
  e.from("#testoMainSinistra", { x: -200, opacity: 0 })
    .from("#testoMainD", { x: 300, opacity: 0 }, "<")
    .from("#testoSecondD", { x: 300, opacity: 0 }, "<")
    .from("#lineaSecond", { x: 300, opacity: 0 })
    .from("#buttonCoffee", { x: 300, opacity: 0 });
}
