//  CODICE GIUSTO CON ERRORI IN CONSOLE
// 
// document.addEventListener("DOMContentLoaded", () => {
//     const triggerAnimation = (cards) => {
//         // Rimuovi la classe "visible" da tutte le schede
//         cards.forEach((card) => card.classList.remove("visible"));

//         // Usa un timeout per forzare il reflow e riapplica la classe
//         setTimeout(() => {
//             cards.forEach((card) => card.classList.add("visible"));
//         }, 50);
//     };

//     const filterLinks = document.querySelectorAll('.filter-link');
//     const sections = document.querySelectorAll('.products-section');

//     // Mostra i prodotti Bestseller al caricamento
//     const bestsellerSection = document.getElementById('bestsellerProducts');
//     if (bestsellerSection) {
//         const cards = bestsellerSection.querySelectorAll('.product-card');
//         triggerAnimation(cards);
//     }

//     // Gestione del click sui filtri
//     filterLinks.forEach((link) => {
//         link.addEventListener('click', (e) => {
//             e.preventDefault();

//             // Rimuovi 'active' da tutti i filtri e aggiungilo al filtro cliccato
//             filterLinks.forEach((item) => item.classList.remove('active'));
//             e.target.classList.add('active');

//             // Nascondi tutte le sezioni di prodotti
//             sections.forEach((section) => section.style.display = 'none');

//             // Mostra la sezione corrispondente al filtro selezionato
//             const filter = e.target.getAttribute('data-filter');
//             const section = document.getElementById(filter + 'Products');
//             if (section) {
//                 section.style.display = 'flex';

//                 // Riattiva l'animazione per le schede visibili
//                 const cards = section.querySelectorAll('.product-card');
//                 triggerAnimation(cards);
//             }
//         });
//     });
// });






// // animazione per titolo pagina singolo prodotto  in mobile
// // script.js

// // Inizializza GSAP e ScrollTrigger
// gsap.registerPlugin(ScrollTrigger);

// // Anima il titolo
// gsap.to(".boxTitleMobile", {
//     scrollTrigger: {
//         trigger: ".heroProductMobile", 
//         start: "top center", 
//         end: "bottom top", 
//         scrub: true, 
//     },
//     scale: 0, // Riduci la scala a 0
//     // opacity: 0, 
//     ease: "power2.out",
// });










// CODICE GIUSTO SENZA ERRORI IN CONSOLE
document.addEventListener("DOMContentLoaded", () => {
    const triggerAnimation = (cards) => {
        if (!cards.length) return; // Evita errori se non ci sono card

        // Rimuovi la classe "visible" da tutte le schede
        cards.forEach((card) => card.classList.remove("visible"));

        // Usa un timeout per forzare il reflow e riapplica la classe
        setTimeout(() => {
            cards.forEach((card) => card.classList.add("visible"));
        }, 50);
    };

    const filterLinks = document.querySelectorAll('.filter-link');
    const sections = document.querySelectorAll('.products-section');

    if (filterLinks.length && sections.length) {
        // Mostra i prodotti Bestseller al caricamento
        const bestsellerSection = document.getElementById('bestsellerProducts');
        if (bestsellerSection) {
            const cards = bestsellerSection.querySelectorAll('.product-card');
            triggerAnimation(cards);
        }

        // Gestione del click sui filtri
        filterLinks.forEach((link) => {
            link.addEventListener('click', (e) => {
                e.preventDefault();

                // Rimuovi 'active' da tutti i filtri e aggiungilo al filtro cliccato
                filterLinks.forEach((item) => item.classList.remove('active'));
                e.target.classList.add('active');

                // Nascondi tutte le sezioni di prodotti
                sections.forEach((section) => section.style.display = 'none');

                // Mostra la sezione corrispondente al filtro selezionato
                const filter = e.target.getAttribute('data-filter');
                const section = document.getElementById(filter + 'Products');
                if (section) {
                    section.style.display = 'flex';

                    // Riattiva l'animazione per le schede visibili
                    const cards = section.querySelectorAll('.product-card');
                    triggerAnimation(cards);
                }
            });
        });
    }
});

// Animazione per titolo pagina singolo prodotto in mobile
// if (document.querySelector(".boxTitleMobile") && document.querySelector(".heroProductMobile")) {
//     gsap.registerPlugin(ScrollTrigger);

//     gsap.to(".boxTitleMobile", {
//         scrollTrigger: {
//             trigger: ".heroProductMobile",
//             start: "top center",
//             end: "bottom top",
//             scrub: true,
//         },
//         scale: 1.5, 
//         ease: "power2.out",
//     });
// }
