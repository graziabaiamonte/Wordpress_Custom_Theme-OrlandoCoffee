jQuery(function($) {
    // Funzione per aggiornare il mini cart tramite AJAX
    function aggiornaMiniCart() {
        $.get(wc_add_to_cart_params.ajax_url, {
            action: 'woocommerce_get_cart'
        }, function(response) {
            // Trova l'elemento del mini cart e aggiorna il suo contenuto
            var miniCart = $('.woocommerce-mini-cart');
            var newContent = $(response).find('.woocommerce-mini-cart').html();
            
            // Se il contenuto è valido, sostituisci quello attuale
            if (newContent) {
                miniCart.html(newContent);
            }
        });
    }

    // Ascolta quando un prodotto è stato aggiunto al carrello
    $('body').on('added_to_cart', function() {
        aggiornaMiniCart();
    });

    // Ascolta quando un prodotto è stato rimosso dal carrello
    $('body').on('removed_from_cart', function() {
        aggiornaMiniCart();
    });
});
