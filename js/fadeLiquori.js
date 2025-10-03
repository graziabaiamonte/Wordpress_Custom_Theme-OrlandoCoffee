// CODICE GIUSTO SENZA ERRORI NELLA CONSOLE
// 
// Seleziona tutti gli elementi coinvolti nell'animazione
const elementsToAnimate = [
  "#mainTestoLiquori",
  "#secondTestoLiquori",
  ".pistacchio", 
  ".classico", 
  ".cioccolato", 
  ".caffe", 
  ".limoncello", 
  ".limoncelloCrema",
  "#classico", 
  "#pistacchio", 
  "#cioccolato", 
  "#caffe", 
  "#limoncelloCrema", 
  "#limoncello"
];

// Filtra solo quelli presenti nel DOM
const existingElements = elementsToAnimate.filter(selector => document.querySelector(selector));

if (existingElements.length > 0) {
  // Crea la timeline per le animazioni
  const timelineLiquorii = gsap.timeline({
    scrollTrigger: {
      trigger: ".section-liquori",
      start: "top center",
      end: "bottom top",
      scrub: false,
      markers: false,
      toggleActions: "play none none none",
    }
  });

  timelineLiquorii
    .from("#mainTestoLiquori", {
      x: 200,
      opacity: 0,
      duration: 0.5,
      ease: "power2.inOut",
    })
    .from("#secondTestoLiquori", {
      x: -200,
      opacity: 0,
      ease: "power2.inOut",
    }, "<")
    .from([".pistacchio", ".classico", ".cioccolato", ".caffe", ".limoncello", ".limoncelloCrema"].filter(selector => document.querySelector(selector)), {
      y: 500,
      opacity: 0,
      duration: 0.4,
      ease: "power2.inOut",
      stagger: 0.1,
    })
    .from(["#classico", "#pistacchio", "#cioccolato", "#caffe", "#limoncelloCrema", "#limoncello"].filter(selector => document.querySelector(selector)), {
      y: 450,
      opacity: 0,
      duration: 0.5,
      ease: "power2.inOut",
      stagger: 0.1,
    }, "<");

} else {
  // console.log("Gli elementi necessari per l'animazione non sono presenti nel DOM.");
}



// Slider
const slider = document.querySelector('.slider');
const slides = slider ? Array.from(slider.children) : [];
const dotsContainer = document.querySelector('.slider-dots');

if (slider && slides.length > 0) {
  // Creare i dots
  slides.forEach((_, index) => {
    const dot = document.createElement('button');
    dot.classList.add('slider-dot');
    if (index === 0) dot.classList.add('active'); // Imposta il primo dot come attivo
    dot.dataset.index = index; // Salva l'indice per il click
    dotsContainer.appendChild(dot);
  });

  // Aggiungi evento ai dots
  const dots = document.querySelectorAll('.slider-dot');
  dots.forEach(dot => {
    dot.addEventListener('click', (e) => {
      const index = e.target.dataset.index;
      slider.scrollTo({
        left: slider.offsetWidth * index,
        behavior: 'smooth'
      });
      updateActiveDot(index);
    });
  });

  // Funzione per aggiornare il dot attivo
  function updateActiveDot(index) {
    dots.forEach(dot => dot.classList.remove('active'));
    dots[index].classList.add('active');
  }

  // Sincronizza dots con lo scroll dello slider
  slider.addEventListener('scroll', () => {
    let index = Math.round(slider.scrollLeft / slider.offsetWidth);
    updateActiveDot(index);
  });
} else {
  // console.log("Slider non trovato o nessun elemento presente.");
}
