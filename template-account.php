<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * Template Name: Account Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tema_orlando
 */

get_header();
?>

<div class="mainAccount secondary">
    <?php echo do_shortcode( '[woocommerce_my_account]' ); ?>
</div>


<?php
get_footer();