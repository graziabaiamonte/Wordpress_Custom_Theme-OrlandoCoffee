// POPUP MENU
const hamburgerMenu = document.querySelector(".hamburgerMenu");
const popup = document.getElementById("popup");
const closeBtn = document.getElementById("closeBtn");

// Mostra il popup quando clicchi sull'hamburger menu
hamburgerMenu.addEventListener("click", () => {
  console.log("clicco su hamburger");
  popup.classList.add("active");
  popup.classList.remove("closing");
});

// Chiudi il popup quando clicchi sul pulsante di chiusura
closeBtn.addEventListener("click", () => {
  // popup.classList.add('closing');
  popup.classList.remove("active");
});

// Chiudi il popup se clicchi al di fuori del menu
// window.addEventListener('click', (e) => {
//     if (e.target === popup) {
//         popup.classList.add('closing');
//         popup.classList.remove('active');
//     }
// });

// HEADER CHE COMPARE ALLO SCROLL TOP
// document.addEventListener("DOMContentLoaded", () => {
//     const header = document.querySelector("#header");
//     let lastScrollY = window.scrollY;

//     // Inizialmente visibile
//     header.style.transform = "translateY(0)";

//     window.addEventListener("scroll", () => {
//       const currentScrollY = window.scrollY;

//       if (currentScrollY > lastScrollY) {
//         // Scroll verso il basso - nascondi l'header
//         header.style.transform = "translateY(-100%)";
//       } else {
//         // Scroll verso l'alto - mostra l'header
//         header.style.transform = "translateY(0)";
//       }

//       lastScrollY = currentScrollY;
//     });
//   });

// CODICE SENZA ERRORI IN CONSOLE

document.addEventListener("DOMContentLoaded", () => {
  // Mappa dei colori di sfondo e classi dell'header
  // The keys here are used to set body's --color CSS variable.
  // They usually match actual background colors, but can be logical keys
  // for sections sharing a visual background but needing different header styles.
  const colorMap = {
    "#EFEBDC": "headerLight", // For #slice, .section-liquori
    coffee_key: "headerDark", // For #intro (coffee section) - visual background is #EFEBDC
    "#3C3C3B": "headerLight", // For .section-grappa, .section-amaro, .section-franc
    "#B9A1A3": "headerDark", // For .section-gin
    "#fff": "headerLight", // For .mainFranc
  };

  const header = document.getElementById("header");
  const body = document.body;

  if (!header) {
    // console.log("L'elemento 'header' non è presente nel DOM.");
    return; // Interrompe l'esecuzione dello script
  }

  // Funzione per aggiornare il colore dell'header
  const updateHeaderColor = () => {
    const bgColor = getComputedStyle(body).getPropertyValue("--color").trim();

    header.className = ""; // Rimuove tutte le classi

    if (colorMap[bgColor]) {
      header.classList.add(colorMap[bgColor]);
    }
  };

  // Osserva i cambiamenti di stile nel body
  const observer = new MutationObserver(updateHeaderColor);
  observer.observe(body, { attributes: true, attributeFilter: ["style"] });

  // Inizializza il colore dell'header
  updateHeaderColor();

  // Funzione per creare uno ScrollTrigger solo se l'elemento esiste
  const createScrollTrigger = (selector, color) => {
    const element = document.querySelector(selector);
    if (!element) {
      // console.log(`Elemento '${selector}' non trovato nel DOM.`);
      return;
    }

    ScrollTrigger.create({
      trigger: element,
      start: "top center",
      end: "bottom center",
      onEnter: () => gsap.to(body, { "--color": color, duration: 1 }),
      onEnterBack: () => gsap.to(body, { "--color": color, duration: 1 }),
    });
  };

  // Creazione degli ScrollTrigger con controllo esistenza
  createScrollTrigger("#slice", "#EFEBDC");
  // #intro is the coffee section, its visual background is #EFEBDC, but we use 'coffee_key' for headerDark
  createScrollTrigger("#intro", "coffee_key");
  createScrollTrigger(".section-grappa", "#3C3C3B");
  createScrollTrigger(".section-liquori", "#EFEBDC");
  createScrollTrigger(".section-amaro", "#3C3C3B");
  createScrollTrigger(".section-gin", "#B9A1A3");
  createScrollTrigger(".section-franc", "#3C3C3B");
  createScrollTrigger(".mainFranc", "#fff");
});

// Animazione per il titolo del video/intro coffee
let mm = gsap.matchMedia();

mm.add(
  {
    // Desktop and larger
    isDesktop: "(min-width: 769px)",
    // Mobile
    isMobile: "(max-width: 768px)",
  },
  (context) => {
    let { isMobile } = context.conditions;

    gsap.fromTo(
      ".testoMain",
      { y: 0, opacity: 1 },
      {
        y: isMobile ? 450 : 650, // y: 400 on mobile, 650 on desktop
        ease: "none",
        opacity: 1,
        scrollTrigger: {
          trigger: "#intro",
          start: "top bottom", // quando l’elemento entra nello schermo
          end: "top 30%",
          scrub: 1, // lo rende sincronizzato con lo scroll
          markers: false,
        },
      }
    );
  }
);

// loader
document.addEventListener("DOMContentLoaded", function () {
  const hasVisitedHomepage = localStorage.getItem("visitedHomepage");
  const preloader = document.getElementById("preloader");

  // Exit if preloader element doesn't exist
  if (!preloader) {
    return;
  }

  const isHomepage =
    window.location.pathname === "/" ||
    window.location.pathname === "/index.php";

  // The inline script in <head> and CSS '.preloader-initially-hidden #preloader'
  // should handle hiding the preloader immediately if it's not the first homepage visit.
  // This JS logic now primarily focuses on the FIRST visit to the homepage.
  if (isHomepage && !hasVisitedHomepage) {
    if (!hasVisitedHomepage) {
      localStorage.setItem("visitedHomepage", "true");

      let count = 0;
      const duration = 5000; // 5 seconds
      const intervalTime = duration / 100; // 50ms
      const progressBar = document.querySelector(".progress-bar");
      const progressText = document.querySelector(".progress-text");

      // If essential preloader parts are missing, hide preloader and exit.
      if (!progressBar || !progressText) {
        // console.error("Progress bar or text element not found in preloader.");
        preloader.style.display = "none";
        document.documentElement.classList.add("preloader-initially-hidden"); // Ensure it stays hidden
        return;
      }

      const interval = setInterval(() => {
        count++;
        progressBar.style.width = count + "%";
        progressText.textContent = count + "%";

        if (count >= 100) {
          clearInterval(interval);
          setTimeout(() => {
            if (preloader) {
              preloader.classList.add("slide-out");
              setTimeout(() => {
                preloader.style.display = "none";
                // Add class to html tag to ensure it stays hidden on refresh before navigating away
                document.documentElement.classList.add(
                  "preloader-initially-hidden"
                );
              }, 800); // Corrisponde alla durata della transizione slide-out
            }
          }, 200);
        }
      }, intervalTime);
    }
  } else {
    // All other cases (not homepage, or homepage already visited):
    // The preloader should already be hidden by the inline script + CSS.
    // If it's somehow still visible, this ensures it's hidden, though ideally not needed.
    // if (preloader && getComputedStyle(preloader).display !== 'none') {
    //   preloader.style.display = 'none';
    // }
  }
});

// per risolvere il seguente problema: Gli elementi dell'elenco (<li>) non sono contenuti negli elementi principali <ul>, <ol> o <menu>. Gli screen reader richiedono che gli elementi dell'elenco (<li>) siano contenuti in un elemento <ul>, <ol> o <menu> principale per poterli descrivere in modo corretto. Scopri di più sulla struttura dell'elenco corretta.
document.addEventListener("DOMContentLoaded", function () {
  // Trova tutti i <li> che NON sono dentro un <ul>, <ol> o <menu>
  document.querySelectorAll("li").forEach(function (li) {
    const parent = li.parentElement;
    if (!["UL", "OL", "MENU"].includes(parent.tagName)) {
      // Crea un <ul> "wrapper"
      const ul = document.createElement("ul");
      ul.style.listStyle = "none"; // Rimuove i pallini
      ul.style.margin = "0"; // Elimina margini
      ul.style.padding = "0"; // Elimina padding

      // Inserisce il nuovo <ul> prima del <li> e ci sposta dentro il <li>
      parent.insertBefore(ul, li);
      ul.appendChild(li);
    }
  });
});
