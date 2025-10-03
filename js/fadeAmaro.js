if (document.querySelector(".section-amaro") && 
    document.querySelector("#mainTestoAmaro") && 
    document.querySelector("#secondTestoAmaro") && 
    document.querySelector("#lineaAmaro") && 
    document.querySelector("#amaro") && 
    document.querySelector("#buttonShopAmaroo")) {

    // Cambia il colore dello sfondo separatamente
    // ScrollTrigger.create({
    //     trigger: ".section-amaro",
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
    const timelineAmaro = gsap.timeline({
        scrollTrigger: {
            trigger: ".section-amaro",
            start: "top bottom",
            end: "bottom center",
            scrub: false,
            markers: false,
            toggleActions: "play reverse play reverse",
        }
    });

    
    timelineAmaro
    .from("#amaro", {
        x: 1000,
        opacity: 1,
        duration: 1.3,
        ease: "power2.inOut",
    }, 0)
    .from(["#mainTestoAmaro", "#secondTestoAmaro"], { 
        x: -200,
        opacity: 0,
        duration: 1.5,
        ease: "power2.inOut",
        stagger: 0.2, 
    }, "<")
    .from("#lineaAmaro", {
        y: 200,
        opacity: 0,
        duration: 1.5,
        ease: "power2.inOut",
    }, "<") 
   
    .from("#amaroMobile", {
        x: 200,
        opacity: 1,
        duration: 1.3,
        ease: "power2.inOut",
    }, "-=0.5"); 

    
    gsap.from("#buttonShopAmaroo", {
        y: 20,
        opacity: 0,
        duration: 0.5,
        ease: "power2.inOut",
        scrollTrigger: {
            trigger: ".section-amaro",
            start: "top top",
            end: "+=200px",
            scrub: false,
            markers: false,
        }
    });
} else {
    // console.log("Gli elementi necessari non sono presenti nella pagina.");
}






