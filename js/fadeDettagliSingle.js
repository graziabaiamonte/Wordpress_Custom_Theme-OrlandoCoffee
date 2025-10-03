// Animazione fade per i dettagli - pagina singol product
document.addEventListener("DOMContentLoaded", function () {
  // Seleziona gli elementi da animare
  const elementsToAnimate = document.querySelectorAll(".appari");

  if (elementsToAnimate.length > 0) {
    // Applica l'animazione con GSAP usando fromTo
    gsap.fromTo(
      elementsToAnimate,
      {
        scale: 0, // Scala iniziale (0)
        rotation: 20, // Rotazione iniziale (20 gradi)
        opacity: 0,
      },
      {
        scale: 1, // Scala finale (1)
        rotation: 0, // Rotazione finale (0 gradi)
        duration: 1, // Durata dell'animazione
        opacity: 1,
        ease: "power2.out", // Tipo di easing
      }
    );
  }
});

// Animazione fade dettagli - pagina shop
jQuery(document).ready(function ($) {
  function loadFilteredProducts(filter) {
    $.ajax({
      url: ajaxurl, // Assicurati che sia definito nel tema WordPress
      type: "GET",
      data: { action: "filter_products", filter: filter },
      success: function (response) {
        $(".shop-container").html(response); // Aggiorna il contenitore dei prodotti

        // Riapplica l'animazione ai nuovi elementi
        $(".appariShop").css("animation", "none"); // Resetta l'animazione
        setTimeout(() => {
          $(".appariShop").css("animation", "scaleUp 0.5s ease-out");
        }, 10);
      },
    });
  }

  // Evento per il cambio filtro
  $(".filter-button").on("click", function () {
    let selectedFilter = $(this).data("filter");
    loadFilteredProducts(selectedFilter);
  });
});
