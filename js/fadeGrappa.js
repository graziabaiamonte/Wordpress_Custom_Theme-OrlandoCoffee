// Verifica che gli elementi esistano prima di eseguire il codice
if (document.querySelector(".section-grappa") && 
    document.querySelector("#mainTestoGrappa") && 
    document.querySelector("#secondTestoGrappa") && 
    document.querySelector("#lineaGrappa") && 
    document.querySelector("#grappaBianca") && 
    document.querySelector("#grappaNera") && 
    document.querySelector("#bollino1Grappa") && 
    document.querySelector("#bollino2Grappa") && 
    document.querySelector("#bollino3Grappa") && 
    document.querySelector(".buttonShopGrappa")) {

    // Cambia il colore dello sfondo separatamente
    // ScrollTrigger.create({
    //     trigger: ".section-grappa",
    //     start: "top center",  
    //     end: "bottom center", 
    //     onEnter: () => {
    //         gsap.to("body", { "--color": "#3C3C3B", duration: 1 });
    //     },
    //     onEnterBack: () => {
    //         gsap.to("body", { "--color": "#3C3C3B", duration: 1 });
    //     },
    // });

    // Crea la timeline per le animazioni
    const timelineGrappa = gsap.timeline({
        scrollTrigger: {
            trigger: ".section-grappa",
            start: "top bottom",
            end: "bottom center",
            scrub: false,
            markers: false,
            toggleActions: "play reverse play reverse",
        }
    });

    timelineGrappa
    .from("#mainTestoGrappa", {
        y: 20,
        opacity: 0,
        duration: 0.5,
        ease: "power2.out",
    })
    .from(["#secondTestoGrappa", "#lineaGrappa"], { 
        y: 200,
        opacity: 0,
        duration: 0.5,
        ease: "power2.out",
        stagger: 0.1, 
    }, "<") 
    .from("#grappaBianca", {
        x: 1000,
        opacity: 1,
        ease: "power2.out",
        duration: 2.3,
        onComplete: () => {
            gsap.to("#grappaBianca", {
                y: "+=10",
                duration: 2,
                ease: "sine.inOut",
                repeat: -1,
                yoyo: true,
            });
        },
    }, "<") 
    .from("#grappaNera", {
        x: 1000,
        opacity: 1,
        duration: 1.5,
        ease: "power2.out",
        onComplete: () => {
            gsap.to("#grappaNera", {
                y: "-=5",
                duration: 2,
                ease: "sine.inOut",
                repeat: -1,
                yoyo: true,
            });
        },
    }, "<") 
    .from(["#bollino1Grappa", "#bollino2Grappa", "#bollino3Grappa"], {
        x: -200,
        opacity: 0,
        duration: 0.5,
        ease: "power2.out",
        stagger: 0.1, // Ritardo di 0.1s tra gli elementi
    }, "<");

} else {
    // console.log("Gli elementi necessari non sono presenti nella pagina.");
}
