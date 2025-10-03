<?php
/**
 * Template Name: Category Page
 *
 * @package tema_orlando
 */

get_header();

// Rileva la categoria dall'URL, di default 'bestseller'
$active_filter = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : 'bestseller';
?>


<div class="mainShop secondary">
    <!-- <div class="heroShop">
        <h1 class="primary">Lorem Ipsum</h1>
    </div> -->

    <!-- Filtri -->
    
    <div class="filtersBox primary">
       
        <div class="filters">
            <a href="?category=bestseller" class="filter-link <?php echo ($active_filter === 'bestseller' ? 'active' : ''); ?>" data-filter="bestseller">Bestseller</a>
            <a href="?category=coffee" class="filter-link <?php echo ($active_filter === 'caffe' ? 'active' : ''); ?>" data-filter="caffe">Caffe'</a>
            <a href="?category=gin" class="filter-link <?php echo ($active_filter === 'gin' ? 'active' : ''); ?>" data-filter="gin">Gin</a>
            <a href="?category=grappa" class="filter-link <?php echo ($active_filter === 'grappe' ? 'active' : ''); ?>" data-filter="grappa">Grappe</a>
            <a href="?category=amaro" class="filter-link <?php echo ($active_filter === 'amari' ? 'active' : ''); ?>" data-filter="amaro">Amari</a>
            <a href="?category=liquori" class="filter-link <?php echo ($active_filter === 'liquori' ? 'active' : ''); ?>" data-filter="liquori">Liquori</a>
        </div>

    </div>  

   
    

    <!-- Sezioni per visualizzare i prodotti -->
    <div id="productSections">
        <?php
        // Define categories and corresponding IDs for product sections
        $categories = [
            'bestseller' => '', // order by date for bestseller
            'gin' => 'gin',
            'coffee' => 'caffe',
            'grappa' => 'grappe',
            'amaro' => 'amari',
            'liquori' => 'liquori'
        ];



        // Loop through each category and fetch products
        foreach ($categories as $filter => $category_slug) :
            // Set up the query arguments for the current category
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 8,
                'orderby' => is_string($category_slug) ? 'title' : 'date', // Ordering logic
                'order' => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => is_string($category_slug) ? $category_slug : '',
                        'operator' => 'IN'
                    )
                )
            );

            // If category is 'bestseller', modify query to show top-selling products
            if ($filter === 'bestseller') {
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 8,
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
            } else {
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 8,
                    'orderby' => 'title',
                    'order' => 'DESC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'slug',
                            'terms' => $category_slug,
                            'operator' => 'IN',
                        ),
                    ),
                );
            }
            
            $loop = new WP_Query($args);

            if ($loop->have_posts()) :
                ?>
                <div id="<?php echo $filter; ?>Products" class="products-section" style="display:<?php echo ($filter === $active_filter ? 'flex' : 'none'); ?>;">

                    <?php
                    while ($loop->have_posts()) : $loop->the_post();
                        global $product;
                        ?>
                        <div class="product-card">
                            <a href="<?php the_permalink(); ?>" class="product-link">
                                
                            
                            <div class="productImage">
    <?php
    global $product;

    // Ottieni l'ID dell'immagine principale del prodotto
    $image_id = $product->get_image_id();

    // Recupera l'URL dell'immagine a piena risoluzione
    if ($image_id) {
        $image_url = wp_get_attachment_image_url($image_id, 'full');
        $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', true); // Recupera il testo alternativo
        ?>
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>" class="mainProductImage">
        <?php
    }

    // Sezione immagine ACF
    $dettaglio_1 = get_field('dettaglio_1'); // Recupera l'immagine dal campo ACF 'dettaglio_1'
    if ($dettaglio_1) :
        ?>
        <img src="<?php echo esc_url($dettaglio_1['url']); ?>" alt="<?php echo esc_attr($dettaglio_1['alt']); ?>" class="dettaglio1">
        <?php
    endif;
    ?>
</div>




                                <div class="producInfo">
                                    <h2 class="product-title"><?php the_title(); ?></h2>
                                    <!-- <p class="price"><?php echo $product->get_price_html(); ?></p> -->
                                </div>

                                <!-- <div class="product-add-to-cart">
                                    <?php woocommerce_template_single_add_to_cart(); ?>
                                </div> -->

                                
                            </a>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <?php
            endif;
        endforeach;
        ?>
    </div>
</div>

<script>
    // Funzione generica per gestire il click sui filtri
    document.querySelectorAll('.filter-link').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            // Rimuovi la classe 'active' da tutti i filtri
            document.querySelectorAll('.filter-link').forEach(function(item) {
                item.classList.remove('active');
            });

            // Aggiungi la classe 'active' al filtro cliccato
            e.target.classList.add('active');

            // Nascondi tutte le sezioni di prodotti
            document.querySelectorAll('.products-section').forEach(function(section) {
                section.style.display = "none";
            });

            // Mostra la sezione corrispondente al filtro selezionato
            const filter = e.target.getAttribute('data-filter');
            const section = document.getElementById(filter + 'Products');
            if (section) {
                section.style.display = "flex";
            }
        });
    });
</script>

<?php
get_footer();
