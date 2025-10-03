
// CODICE GIUSTO CON ERRORI IN CONSOLE
// // Array di direzioni casuali per far entrare ogni chicco da posizioni diverse
// const directions = [
//     { x: -200, y: 0 },  
//     { x: 200, y: 0 },   
//     { x: 0, y: -200 },  
//     { x: 0, y: 200 },   
//     { x: -200, y: -200 },
//     { x: 200, y: -200 },  
//     { x: -200, y: 200 }   
// ];

// // Seleziona tutti i chicchi
// const chicchi = Array.from(document.querySelectorAll('.chicco'));

// // Movimento elementi basato sul mouse
// // document.addEventListener('mousemove', (e) => {
// //     const xMovement = (e.clientX - window.innerWidth / 2) * 0.02;
// //     const yMovement = (e.clientY - window.innerHeight / 2) * 0.02;

// //     if (chicchi.length > 0) {
// //         gsap.to(chicchi, {
// //             x: xMovement,
// //             y: yMovement,
// //             duration: 0.2,
// //             ease: "power1.out"
// //         });
// //     }
    
// // });


// // Anima ogni chicco
// chicchi.forEach((chicco, index) => {
//     const direction = directions[index % directions.length]; // Prendi una direzione dall'array

//     gsap.fromTo(chicco, 
//         {
//             x: direction.x, // Partenza fuori dallo schermo
//             y: direction.y,
//             opacity: 0
//         },
//         {
//             x: 0,           // Arriva alla posizione originale
//             y: 0,
//             opacity: 1,
//             duration: 1,    // Durata animazione
//             ease: "power2.out",
//             scrollTrigger: {
//                 trigger: ".pack", // La sezione di attivazione
//                 start: "top 75%",       
//                 end: "bottom 25%",
//                 toggleActions: "play none none none"
//             }
//         }
//     );
// });

// // Movimento aggiuntivo dei chicchi durante lo scroll
// let lastScrollY = window.scrollY;

// window.addEventListener('scroll', () => {
//     const scrollDifference = window.scrollY - lastScrollY;

//     if (scrollDifference !== 0) {
//         gsap.to(chicchi, {
//             y: `-=${scrollDifference > 0 ? 10 : -10}`, // Sposta verso l'alto o verso il basso in base alla direzione dello scroll
//             duration: 0.3,
//             ease: "power1.out"
//         });
//     }

//     lastScrollY = window.scrollY;
// });





// CODICE SENZA ERRORI IN CONSOLE
document.addEventListener("DOMContentLoaded", () => {
    // Array di direzioni casuali per far entrare ogni chicco da posizioni diverse
    const directions = [
        { x: -200, y: 0 },  
        { x: 200, y: 0 },   
        { x: 0, y: -200 },  
        { x: 0, y: 200 },   
        { x: -200, y: -200 },
        { x: 200, y: -200 },  
        { x: -200, y: 200 }   
    ];

    // Seleziona tutti i chicchi
    const chicchi = Array.from(document.querySelectorAll('.chicco'));
    const packSection = document.querySelector('.pack');

    if (chicchi.length && packSection) {
        // Anima ogni chicco
        chicchi.forEach((chicco, index) => {
            const direction = directions[index % directions.length]; // Prendi una direzione dall'array

            gsap.fromTo(chicco, 
                {
                    x: direction.x, // Partenza fuori dallo schermo
                    y: direction.y,
                    opacity: 0
                },
                {
                    x: 0,           // Arriva alla posizione originale
                    y: 0,
                    opacity: 1,
                    duration: 1,    // Durata animazione
                    ease: "power2.out",
                    scrollTrigger: {
                        trigger: ".pack", // La sezione di attivazione
                        start: "top 75%",       
                        end: "bottom 25%",
                        toggleActions: "play none none none"
                    }
                }
            );
        });

        // Movimento aggiuntivo dei chicchi durante lo scroll
        let lastScrollY = window.scrollY;

        window.addEventListener('scroll', () => {
            const scrollDifference = window.scrollY - lastScrollY;

            if (scrollDifference !== 0) {
                gsap.to(chicchi, {
                    y: `-=${scrollDifference > 0 ? 5 : -5}`, // Sposta verso l'alto o verso il basso in base alla direzione dello scroll
                    duration: 0.3,
                    ease: "power1.out"
                });
            }

            lastScrollY = window.scrollY;
        });
    }
});
