// Verifica che gli elementi esistano prima di eseguire il codice
if (
  document.querySelector(".section-coffee") &&
  document.querySelector("#testoMain") &&
  document.querySelector("#testoMainSinistra") &&
  document.querySelector("#testoMainD") &&
  document.querySelector("#testoSecondD") &&
  document.querySelector("#lineaSecond") &&
  document.querySelector("#buttonCoffee")
) {
  // Crea la timeline per le animazioni con GSAP e ScrollTrigger
  const timelineCoffee = gsap.timeline({
    scrollTrigger: {
      trigger: "#intro",
      start: "top bottom",
      end: "bottom center",
      scrub: false,
      toggleActions: "play reverse play reverse",
      markers: false,
    },
  });

  // Animazioni per gli elementi
  timelineCoffee
    // .from("#testoMain", {
    //     y: 200,
    //     opacity: 0,
    // })
    .from("#testoMainSinistra", {
      x: -200,
      opacity: 0,
    })
    .from(
      "#testoMainD",
      {
        x: 300,
        opacity: 0,
      },
      "<"
    )
    .from(
      "#testoSecondD",
      {
        x: 300,
        opacity: 0,
      },
      "<"
    )
    .from("#lineaSecond", {
      x: 300,
      opacity: 0,
    })
    .from("#buttonCoffee", {
      x: 300,
      opacity: 0,
    });
} else {
  // console.log("Gli elementi necessari non sono presenti nella pagina.");
}
