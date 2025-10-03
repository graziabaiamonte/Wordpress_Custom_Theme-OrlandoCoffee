<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

get_header();

// Ottieni l'ID del prodotto corrente
global $post;
$product = wc_get_product($post->ID);

// Verifica che il prodotto esista
if ($product) :
    $colore = get_field('colore', $product->get_id());
    $background_style = $colore ? 'background-color: ' . esc_attr($colore) . ';' : '';
    $textColor_style = $colore ? 'color: ' . esc_attr($colore) . ';' : 'color: #000;'; // Fallback a nero

?>




<div class="mainSingleProduct"  >
    <div class="product-hero">

        <!-- desktop -->
        <div class="heroProduct desktop" >

            <div class="descrizioneProduct">
                    <!-- Descrizione  del prodotto -->
                    <div class="product-description secondary appari" style="<?php echo $background_style; ?>">
                        <div class="mainTestoDescription" ></div>     
                    </div>
            </div>

            <div class="boxFotoMain">
                <!-- Immagine del prodotto principale -->
                <?php
                global $product; // Accedi al prodotto corrente
                $product_id = $product->get_id(); // Recupera l'ID del prodotto
                $image_id = $product->get_image_id(); // Recupera l'ID dell'immagine principale
                $image_url = wp_get_attachment_image_url($image_id, 'full'); // Ottieni l'URL dell'immagine a piena risoluzione
                ?>
                <img class="mainFoto" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_post_meta($image_id, '_wp_attachment_image_alt', true)); ?>" class="MainProductImage">

               <!-- Sezione immagine ACF -->                
                    <?php
                    // Recupera le immagini dai campi ACF 'dettaglio_1' e 'dettaglio_2'
                    $dettaglio_1_davanti = get_field('dettaglio_1_davanti'); 
                    $dettaglio_2_davanti = get_field('dettaglio_2_davanti'); 
                    $dettaglio_2_dietro = get_field('dettaglio_2_dietro'); 

                    // Verifica se 'dettaglio_1' esiste
                    if ($dettaglio_1_davanti) :
                    ?>
                        <img src="<?php echo esc_url($dettaglio_1_davanti['url']); ?>" alt="<?php echo esc_attr($dettaglio_1_davanti['alt']); ?>" class="Dettaglio1 appari parallax-img">
                    <?php
                    endif;

                    // Verifica se 'dettaglio_2_davanti' esiste
                    if ($dettaglio_2_davanti) :
                    ?>
                        <img src="<?php echo esc_url($dettaglio_2_davanti['url']); ?>" alt="<?php echo esc_attr($dettaglio_2_davanti['alt']); ?>" class="Dettaglio2 appari parallax-img">
                    <?php
                    endif;

                    // Verifica se 'dettaglio_2_dietro' esiste
                    if ($dettaglio_2_dietro) :
                        ?>
                            <img src="<?php echo esc_url($dettaglio_2_dietro['url']); ?>" alt="<?php echo esc_attr($dettaglio_2_dietro['alt']); ?>" class="Dettaglio2Dietro appari parallax-img">
                        <?php
                        endif;
                    
                    ?>
                    <!-- Fine sezione immagine ACF -->

            </div>

            <div class="product-info secondary">

                        <h1 class="productTitle primary" style="<?php echo $textColor_style; ?>" ><?php the_title(); ?></h1>
                        <p class="descriptionText"><?php the_content(); ?></p> 

                        <!-- Prezzo del prodotto -->
                        <p class="productPrice"><?php echo $product->get_price_html(); ?></p>    

                        <!-- Aggiungi al carrello -->
                        <div class="cartButton secondary">
                            <?php woocommerce_template_single_add_to_cart(); ?>
                        </div>                    

            </div>

        </div>
        
    
        <!-- MOBILE -->
        <div class="mobile">
            
            <div class="heroProductMobile ">
            
                <div class="boxTitleMobile">
                        <h1 class="productTitle primary" style="<?php echo $textColor_style; ?>" ><?php the_title(); ?></h1>
                    </div>
                
                <div class="boxFotoMain">
                    
                        
                    <!-- Immagine del prodotto principale -->
                        <?php
                        global $product; // Accedi al prodotto corrente
                        $product_id = $product->get_id(); // Recupera l'ID del prodotto
                        $image_id = $product->get_image_id(); // Recupera l'ID dell'immagine principale
                        $image_url = wp_get_attachment_image_url($image_id, 'full'); // Ottieni l'URL dell'immagine a piena risoluzione
                        ?>
                        <img class="mainFoto" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_post_meta($image_id, '_wp_attachment_image_alt', true)); ?>" class="MainProductImage">

                     
                     
                     
                        <!-- Sezione immagine ACF -->                
                     <?php
                    // Recupera le immagini dai campi ACF 'dettaglio_1' e 'dettaglio_2'
                    $dettaglio_1_davanti = get_field('dettaglio_1_davanti'); 
                    $dettaglio_2_davanti = get_field('dettaglio_2_davanti'); 
                    $dettaglio_2_dietro = get_field('dettaglio_2_dietro'); 

                    // Verifica se 'dettaglio_1' esiste
                    if ($dettaglio_1_davanti) :
                    ?>
                        <img src="<?php echo esc_url($dettaglio_1_davanti['url']); ?>" alt="<?php echo esc_attr($dettaglio_1_davanti['alt']); ?>" class="Dettaglio1 appari">
                    <?php
                    endif;

                    // Verifica se 'dettaglio_2_davanti' esiste
                    if ($dettaglio_2_davanti) :
                    ?>
                        <img src="<?php echo esc_url($dettaglio_2_davanti['url']); ?>" alt="<?php echo esc_attr($dettaglio_2_davanti['alt']); ?>" class="Dettaglio2 appari">
                    <?php
                    endif;

                    // Verifica se 'dettaglio_2_dietro' esiste
                    if ($dettaglio_2_dietro) :
                        ?>
                            <img src="<?php echo esc_url($dettaglio_2_dietro['url']); ?>" alt="<?php echo esc_attr($dettaglio_2_dietro['alt']); ?>" class="Dettaglio2Dietro appari">
                        <?php
                        endif;
                    
                    ?>
                    <!-- Fine sezione immagine ACF -->

                    
                </div>         
            </div>


            <div class="product-descriptionMobile secondary appari" style="<?php echo $background_style; ?>"></div>


            <div  class="product-infoMobile secondary">
                        <p class="descriptionTextMobile"><?php the_content(); ?></p> 

                        <!-- Prezzo del prodotto -->
                        <p class="productPriceMobile"><?php echo $product->get_price_html(); ?></p>

                        <!-- Aggiungi al carrello -->
                        <div class="cartButtonMobile secondary">
                            <?php woocommerce_template_single_add_to_cart(); ?>
                        </div>
            </div>

        </div>

    </div>
        

        
    </div>

   


    <!-- Sezione Prodotti Correlati -->

    <?php
// Ottieni le categorie del prodotto corrente
$product_cats = wp_get_post_terms($product->get_id(), 'product_cat', array('fields' => 'ids'));

if (!empty($product_cats)) {
    // Ottieni prodotti nella stessa categoria, escludendo il prodotto attuale
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 3, // Limita a 3 prodotti
        'post__not_in'   => array($product->get_id()), // Escludi il prodotto attuale
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'id',
                'terms'    => $product_cats, // Filtra per le categorie del prodotto attuale
            ),
        ),
    );

    $related_query = new WP_Query($args);

    // Mostra la sezione solo se ci sono prodotti correlati
    if ($related_query->have_posts()) : ?>
        <div class="prodottiRelated">
            <h4 class="secondary">PRODOTTI SIMILI</h4>
            <div class="related-products-grid">
                <?php while ($related_query->have_posts()) : $related_query->the_post();
                    $related_product = wc_get_product(get_the_ID()); ?>
                    <div class="related-product-card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="related-product-image">
                                <?php echo $related_product->get_image('full'); ?>

                                 <!-- Sezione immagine ACF -->                
                                        <?php
                                        // Recupera le immagini dai campi ACF 'dettaglio_1' e 'dettaglio_2'
                                        $dettaglio_1_davanti = get_field('dettaglio_1_davanti'); 
                                        $dettaglio_2_davanti = get_field('dettaglio_2_davanti'); 
                                        $dettaglio_2_dietro = get_field('dettaglio_2_dietro'); 

                                        // Verifica se 'dettaglio_1' esiste
                                        if ($dettaglio_1_davanti) :
                                        ?>
                                            <img src="<?php echo esc_url($dettaglio_1_davanti['url']); ?>" alt="<?php echo esc_attr($dettaglio_1_davanti['alt']); ?>" class="Dettaglio1 appari">
                                        <?php
                                        endif;

                                        // Verifica se 'dettaglio_2_davanti' esiste
                                        if ($dettaglio_2_davanti) :
                                        ?>
                                            <img src="<?php echo esc_url($dettaglio_2_davanti['url']); ?>" alt="<?php echo esc_attr($dettaglio_2_davanti['alt']); ?>" class="Dettaglio2 appari">
                                        <?php
                                        endif;

                                        // Verifica se 'dettaglio_2_dietro' esiste
                                        if ($dettaglio_2_dietro) :
                                            ?>
                                                <img src="<?php echo esc_url($dettaglio_2_dietro['url']); ?>" alt="<?php echo esc_attr($dettaglio_2_dietro['alt']); ?>" class="Dettaglio2Dietro appari">
                                            <?php
                                            endif;
                                        
                                        ?>
                                    <!-- Fine sezione immagine ACF -->
                                     
                            </div>



                            



                            <h5 class="titoloRelated secondary"><?php the_title(); ?></h5>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php
        // Ripristina i dati originali del post
        wp_reset_postdata();
    endif;
}
?>




</div>


</div>

<?php
endif;

get_footer();