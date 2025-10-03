// DESKTOP
const iconCart = document.querySelector(".iconCartDesk");
const popupCart = document.getElementById("popupCart");
const closeBtnCart = document.getElementById("closeBtnCart");

// Mostra il popup quando clicchi sull'hamburger menu
iconCart.addEventListener("click", () => {
  console.log("clicco su cart");
  popupCart.classList.add("active");
  popupCart.classList.remove("closing");
});

// Chiudi il popup quando clicchi sul pulsante di chiusura
closeBtnCart.addEventListener("click", () => {
  popupCart.classList.remove("active");
});

// MOBILE
const iconCartMobile = document.querySelector(".mobileIconCart");
const popupCartMobile = document.getElementById("popupCart");
const closeBtnCartMobile = document.getElementById("closeBtnCart");

// Mostra il popup quando clicchi sull'hamburger menu
iconCartMobile.addEventListener("click", () => {
  console.log("clicco su cart");
  popupCartMobile.classList.add("active");
  popupCartMobile.classList.remove("closing");
});

// Chiudi il popup quando clicchi sul pulsante di chiusura
closeBtnCartMobile.addEventListener("click", () => {
  popupCartMobile.classList.remove("active");
});

// document.addEventListener("DOMContentLoaded", function() {
//     console.log("✅ DOM caricato correttamente");

//     // Gestisci l'evento "aggiunto al carrello"
//     document.body.addEventListener("added_to_cart", function(event) {
//         console.log("🛒 Prodotto aggiunto al carrello");

//         // Avvia la richiesta AJAX per aggiornare il mini-carrello
//         fetch('/orlando/?wc-ajax=get_refreshed_fragments', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/x-www-form-urlencoded',
//             },
//             body: 'action=woocommerce_get_refreshed_fragments'
//         })
//         .then(response => response.json())
//         .then(data => {
//             console.log('🔄 Risposta AJAX ricevuta:', data);

//             if (data.fragments) {
//                 console.log('🔄 Frammenti trovati:', Object.keys(data.fragments));

//                 // Aggiorna il mini-cart
//                 const miniCartSelector = '.woocommerce-mini-cart.cart_list.product_list_widget ';

//                 if (data.fragments[miniCartSelector]) {
//                     const miniCartElement = document.querySelector(miniCartSelector);
//                     if (miniCartElement) {
//                         console.log(`✅ Aggiornamento del mini-carrello (${miniCartSelector})`);
//                         miniCartElement.innerHTML = data.fragments[miniCartSelector];
//                     } else {
//                         console.log(`⚠️ Elemento mini-cart non trovato: ${miniCartSelector}`);
//                     }
//                 }

//                 // Aggiorna il contatore prodotti nel carrello
//                 const miniCartCountSelector = 'span.mini-cart-count';
//                 if (data.fragments[miniCartCountSelector]) {
//                     const miniCartCountElement = document.querySelector(miniCartCountSelector);
//                     if (miniCartCountElement) {
//                         console.log(`✅ Aggiornamento del contatore (${miniCartCountSelector})`);
//                         miniCartCountElement.innerHTML = data.fragments[miniCartCountSelector];
//                     }
//                 }

//                 console.log("🛒 Mini-cart aggiornato!");
//             } else {
//                 console.error('❌ I frammenti non sono stati trovati nella risposta.');
//             }
//         })
//         .catch(error => {
//             console.error('❌ Errore durante l\'aggiornamento del mini-cart:', error);
//         });
//     });

//     // Trigger l'evento "aggiunto al carrello" quando il pulsante è cliccato
//     const addToCartButton = document.querySelector(".single_add_to_cart_button");
//     if (addToCartButton) {
//         addToCartButton.addEventListener("click", function(e) {
//             console.log("📦 Aggiungi al carrello cliccato");
//             // Trigger l'evento "added_to_cart"
//             document.body.dispatchEvent(new Event("added_to_cart"));
//         });
//     }
// });
