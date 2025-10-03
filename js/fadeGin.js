if (document.querySelector(".section-gin") && 
    document.querySelector("#mainTestoGin") && 
    document.querySelector("#ginPompelmo") && 
    document.querySelector("#secondTestoGin") && 
    document.querySelector("#lineaGin") && 
    document.querySelector("#gustoOriginal") && 
    document.querySelector("#ginOriginal") && 
    document.querySelector("#gustoLimone") && 
    document.querySelector("#ginLimone") && 
    document.querySelector("#gustoPompelmo") && 
    document.querySelector(".buttonShopGin")) {

   
    // ScrollTrigger.create({
    //     trigger: ".section-gin",
    //     start: "top bottom",  
    //     end: "bottom center", 
    //     onEnter: () => {
    //         gsap.to("body", { "--color": "#B9A1A3", duration: 1 });
    //     },
    //     onEnterBack: () => {
    //         gsap.to("body", { "--color": "#B9A1A3", duration: 1 });
    //     },
    // });

    // Crea la timeline per le animazioni
    const timelineGin = gsap.timeline({
        scrollTrigger: {
            trigger: ".section-gin",
            start: "top bottom",
            end: "bottom center",
            scrub: false,
            markers: false,
            toggleActions: "play reverse play reverse",
        }
    });

    // Animazioni per gli elementi
    timelineGin
    .from(["#mainTestoGin", "#secondTestoGin"], { 
        y: 50,
        opacity: 0,
        duration: 0.5,
        ease: "power2.out",
    })
    .from( "#ginPompelmo", { 
        x: -2000,
        opacity: 1,
        duration: 1.5,
        ease: "power2.out",
    }, "<") 
    .from("#lineaGin", {
        y: 200,
        opacity: 0,
        duration: 0.5,
        ease: "power2.out",
    }, "<") // Sincronizzato con l'animazione precedente
    .from(["#gustoOriginal", "#ginOriginal"], { 
        x: -2000,
        opacity: 1,
        duration: 1.5,
        ease: "power2.out",
        stagger: 0.6, //  ritardo tra i due
        onComplete: () => {
            gsap.to("#ginOriginal", {
                y: "-=10",
                duration: 1,
                ease: "sine.inOut",
                repeat: -1,
                yoyo: true,
            });
        },
    }, "<") 
    .from("#gustoLimone", { 
        x: 2000,
        opacity: 1,
        duration: 1.1,
        ease: "power2.out",
        stagger: 0.2,
        
    }, "<") 
    .from("#gustoPompelmo", { 
        y: 30,
        opacity: 0,
        duration: 1.5,
        ease: "power2.out",
    }, "<")
    .from("#ginLimone", { 
        x: 100,
        opacity: 0,
        duration: 1.5,
        ease: "power2.out",
        onComplete: () => {
            gsap.to("#ginLimone", {
                y: "+=10",
                duration: 1,
                ease: "sine.inOut",
                repeat: -1,
                yoyo: true,
            });
        },
    }, "<");


    
    gsap.from(".buttonShopGin", {
        y: 20,
        opacity: 0,
        duration: 0.5,
        ease: "power2.inOut",
        scrollTrigger: {
            trigger: ".section-gin",
            start: "top top",
            end: "bottom center",
            scrub: false,
            markers: false,
        }
    });

} else {
    // console.log("Gli elementi necessari non sono presenti nella pagina.");
}
