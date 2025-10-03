<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Orlando
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>

<!-- per fare in modo che il loader venga mostrato solo la prima volta che si visita l'homepage -->
<script>
  (function() {
    const isHomepage = window.location.pathname === "/" || window.location.pathname === "/index.php";

    let hasVisitedHomepage = false;

try {
  hasVisitedHomepage = localStorage.getItem("visitedHomepage");
} catch (e) {
  console.warn("localStorage non disponibile:", e);
  hasVisitedHomepage = false; // Fingi che sia la prima visita
}


    if (!isHomepage || (isHomepage && hasVisitedHomepage)) {
      // If it's NOT the homepage, OR if it IS the homepage but has been visited before,
      // add a class to <html> to signal that the preloader should be hidden.
      document.documentElement.classList.add('preloader-initially-hidden');
    }
  })();
</script>


	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- GSAP -->
	<script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
	<script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>

    <script defer type="module" src="https://orlandocaffe.com/wp-content/themes/tema_orlando/js/heroCubeAnimation.js"></script>
    <script defer type="module" src="https://orlandocaffe.com/wp-content/themes/tema_orlando/js/packCoffe.js"></script>
    <script  defer type="module" src="https://orlandocaffe.com/wp-content/themes/tema_orlando/js/fadeCoffee.js"></script>
    <script defer type="module" src="https://orlandocaffe.com/wp-content/themes/tema_orlando/js/flying-element.js"></script>

	<script defer type="module" src="https://orlandocaffe.com/wp-content/themes/tema_orlando/js/hamburgerMenu.js"></script>
	<script defer type="module" src="https://orlandocaffe.com/wp-content/themes/tema_orlando/js/cartMenu.js"></script>  


	<script defer type="module" src="https://orlandocaffe.com/wp-content/themes/tema_orlando/js/fadeGrappa.js"></script>
	<script defer type="module" src="https://orlandocaffe.com/wp-content/themes/tema_orlando/js/fadeGin.js"></script>
	<script defer type="module" src="https://orlandocaffe.com/wp-content/themes/tema_orlando/js/fadeAmaro.js"></script> 
	<script defer type="module" src="https://orlandocaffe.com/wp-content/themes/tema_orlando/js/fadeLiquori.js"></script>

	<script defer type="module" src="https://orlandocaffe.com/wp-content/themes/tema_orlando/js/fadeDettagliSingle.js"></script>
	<script defer type="module" src="https://orlandocaffe.com/wp-content/themes/tema_orlando/js/fadeShop.js"></script>
    
	<?php wp_head(); ?>


    <!-- css -->
    <link media="screen and (max-width: 768px)" rel="stylesheet" href="https://orlandocaffe.com/wp-content/themes/tema_orlando/css/style-mobile.css">


    <!-- da scrivere poichè il valore di LCP è alto  -->
    <link rel="preload" as="video" href="https://orlandocaffe.com/wp-content/uploads/2025/05/video_home_reduced-.mp4" type="video/mp4">
    <link rel="preload" as="video" href="https://orlandocaffe.com/wp-content/uploads/2025/05/video-home-2.webm" type="video/webm">



    <!-- poichè render-blocking resources  -->
    <!-- <link rel="preload" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" as="style"> -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap">
</noscript>


    <link rel="preload" href="https://orlandocaffe.com/wp-includes/js/jquery/jquery.min.js?ver=3.7.1" as="script">


    <link rel="preload" href="https://orlandocaffe.com/wp-content/themes/tema_orlando/assets/fonts/orlando_new.woff" as="font" type="font/woff" crossorigin="anonymous">

     <!-- poichè render-blocking resources  -->
     <!-- <link rel="preload" href="https://orlandocaffe.com/wp-content/cache/wpo-minify/1747382355/assets/wpo-minify-header-fccb17db.min.js" as="script">

     <link rel="preload" href="https://orlandocaffe.com/wp-content/cache/wpo-minify/1747382355/assets/wpo-minify-header-ff5d4046.min.css" as="style"> -->



<!-- per verificare google search console -->
    <meta name="google-site-verification" content="QHdxczyU3Rpsl1a7Iv45Xwm2yzNcSXzPxE4vjwuZEI4" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0X8D1Q9RP8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-0X8D1Q9RP8');
    </script>



    <!-- Opengraph meta -->
    <meta property="og:title" content="Orlando Caffè">
    <meta property="og:description" content="Orlando Caffè è un marchio di caffè di alta qualità, con una lunga tradizione e una passione per il caffè. Offriamo una vasta gamma di prodotti, tra cui caffè in grani, capsule e macinato, tutti realizzati con ingredienti selezionati e processi artigianali.">
    <meta property="og:image" content="https://orlandocaffe.com/wp-content/uploads/2025/03/logo-completo-s.svg">
    <meta property="og:url" content="https://orlandocaffe.com/">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Orlando Caffè">


</head>

<body <?php body_class(); ?>>

<!-- loader -->
<?php if ( is_front_page() ) : ?>
<div id="preloader">
  <div class="preloader-content">
    <img src="https://orlandocaffe.com/wp-content/uploads/2025/03/logoFooterrrr.svg" alt="Logo" class="logo" />
    <div class="progress-container">
      <div class="progress-bar"></div>
      <div class="progress-text">0%</div>
    </div>
  </div>
</div>
<?php endif; ?>





<?php wp_body_open(); ?>
<div id="page" class="site">
	<!-- <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'orlando' ); ?></a> -->

	<header id="header" class="secondary">
		
		<div class="menuDestra widthSame">
			<button class="hamburgerMenu" aria-label="Open Menu">
				<svg stroke-width="5"  id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 100 125">
					<path d="M87.5,22H12.5c-1.1,0-2-.9-2-2h0c0-1.1.9-2,2-2h75c1.1,0,2,.9,2,2h0c0,1.1-.9,2-2,2Z"/>
					<path d="M87.5,52H12.5c-1.1,0-2-.9-2-2h0c0-1.1.9-2,2-2h75c1.1,0,2,.9,2,2h0c0,1.1-.9,2-2,2Z"/>
					<path d="M87.5,82H12.5c-1.1,0-2-.9-2-2h0c0-1.1.9-2,2-2h75c1.1,0,2,.9,2,2h0c0,1.1-.9,2-2,2Z"/>
				</svg>
			</button>

			<span class="mobileIconCart"> <?php echo do_shortcode('[whmc_mini_cart]'); ?></span>
		</div>	
		
	
      
	<a aria-label="home page " href="https://orlandocaffe.com/home-page/">
		<div class="boxLogo widthSame">
			<svg class="svgLogo"  id="Livello_1" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 213.7 	68.8">
				<path class="st0" d="M71,31c0-3.6-2.6-7-8.3-7h-8.8v24.9h4.3v-10.7h1.4l8.4,10.7h4.3l-8.5-10.8c4.9-.5,7.3-3.8,7.3-7.1ZM58.1,37.1v-12.1h3.3c3,0,5.3,2.5,5.3,5.7s-2.2,6.3-5.2,6.3h-3.4Z"/>
				<path class="st0" d="M81.2,47.7v-23.7h-4.3v24.9h16.3v-6.4c-1.6,3.7-4.6,5.1-12.1,5.3Z"/>
				<path class="st0" d="M106.2,23.9l-8.4,24.9h6.4c-1.2-2-1.7-4.5-1.6-7.4h9.5s2.5,7.4,2.5,7.4h4.3l-8.4-24.9h-4.3ZM102.6,40.5c.1-2.3.7-4.8,1.6-7.5.8-2.3,1.9-5.6,2.5-7.5l5,15h-9.1Z"/>
				<path class="st0" d="M139.3,38.1v8.6l-11.5-22.8h-4.3v24.9h6.4c-2.8-3-5.3-8.2-5.3-14.1v-8.8l11.6,22.9h4.3v-24.9h-6.4c2.8,3,5.3,8.1,5.3,14.1Z"/>
				<path class="st0" d="M155.6,23.9h-8.8v24.9h8.7c5.7,0,12.3-3.1,12.3-12.4s-6.6-12.4-12.3-12.4ZM154.5,47.8h-3.4v-22.8h3.4c5.8,0,9.1,3.6,9.1,11.4s-3.4,11.4-9.1,11.4Z"/>
				<path class="st0" d="M185.5,23.1c-7.6,0-12.9,5.7-12.9,13.4s5.7,13.2,13.1,13.2,12.9-5.9,12.9-13.4-5.8-13.2-13.1-13.2ZM187.7,48.4c-6.7,0-11.4-9.2-11.4-16.4s2.5-7.8,7.4-7.8,10.9,8.9,10.9,16.1-2.3,8.1-6.9,8.1Z"/>
				<path class="st0" d="M26.5,24.8c-9.9,7.8-5.8,24.1,6.6,26.2,10.2,1.7,18.3-8.1,15.7-17.9-2.4-9.8-14.2-14.6-22.3-8.3ZM45.7,28.5c-.5.4-1.3,1.2-2.5,2.3-.3.2-.6.5-.9.8-1.9,1.7-4,3.4-5.4,4.6.1,0,.3,0,.5,0,1.7-1.1,4.1-2.6,6-3.7.2-.1.4-.3.7-.4,1.5-.9,2.4-1.4,3-1.7.3.6.6,1.2.8,1.9-.6.3-1.7.8-3.1,1.4-.7.3-1.4.6-2.2.9-1.4.6-2.9,1.1-4.5,1.7-.3,0-.5,0-.8,0-.1.3-.3.7-.4,1-.3.9-.4,2.1-.5,3.4-.3,3.5-.7,7.4-4.5,8.9-.4-.1-.9-.3-1.3-.5,3.7-1.9,4.2-6.1,4.6-9.1.1-1.1.3-2.1.5-2.8.2-.4.3-.8.5-1.2,0,0-.1,0-.2,0l1.5-3.8c.6-1.6,1.5-3.6,2.2-5.2,0-.1,0-.2.1-.3.1-.3.2-.5.4-.8.3-.6.5-1.2.7-1.5.6.3,1.2.7,1.7,1-.3.5-.8,1.4-1.5,2.6-.3.5-.6,1-1,1.6-.3.5-.6,1-.9,1.5-.3.5-.6.9-.9,1.4-.8,1.3-1.6,2.5-2.1,3.5,0,0,0,0,0,0,0,0,.2,0,.3,0,0,0,0,0,0,0,1.4-1.7,3.7-4.4,5.3-6.2,0,0,.1-.2.2-.2,0-.1.2-.2.3-.3.9-1,1.5-1.7,1.9-2.1,0,0,.2-.2.2-.3.5.5.9,1,1.3,1.5ZM25.9,26.8s0,0,.1.1c0,0,0,0,0,0,.5.5,1.3,1.4,2.7,2.9,1.4,1.5,3.3,3.8,4.7,5.4.2,0,.4.1.6.2-.8-1.2-1.8-2.9-2.7-4.3-.2-.3-.4-.6-.5-.9-.1-.2-.3-.5-.4-.7-1.2-2-2-3.4-2.5-4.2,0,0,0-.1,0-.2.6-.4,1.2-.7,1.8-1,0,.1.1.3.2.5,0,0,0,.2.1.3.8,1.7,2.2,4.9,3.2,7.3l1.4,3.5c.1,0,.2,0,.3,0l-1-4.2c0-.1,0-.2,0-.3-.3-1.1-.5-2.2-.8-3.3-.2-.8-.3-1.5-.5-2.2-.1-.6-.2-1.1-.3-1.6,0-.4-.1-.7-.2-.9.7-.2,1.3-.3,2-.3,0,.3,0,.7.2,1.3.2,1.8.6,4.9.7,7.9l.3,3.7c0,0,.2,0,.3,0l.2-2c0-.8.1-1.6.2-2.5,0-.5,0-1.1.1-1.7.1-1.8.3-3.5.5-5,0-.6.1-1.2.2-1.7.7,0,1.4.2,2,.4,0,.4-.2,1.2-.4,2.1-.1.6-.3,1.3-.4,2-.3,1.5-.7,3-1.1,4.5l-.9,3.9c-.3,0-.6-.1-.9-.2-.1.3-.3.6-.4,1-.3.8-.4,1.9-.6,3.1-.4,3.3-.9,7.1-4.8,8.5-.3-.2-.6-.4-.9-.6,3.5-1.8,4.1-5.7,4.5-8.5.2-1.1.3-2,.5-2.6.2-.5.4-.9.6-1.2-.4-.1-.9-.2-1.3-.4-.2.3-.4.7-.5,1.1-.3.8-.4,1.7-.6,2.9-.4,3-1,6.5-4.4,7.8-.3-.2-.5-.5-.7-.7,2.9-1.7,3.5-5.1,3.9-7.7.2-1,.3-1.8.5-2.3.2-.6.5-1,.8-1.4-.4-.1-.7-.2-1.1-.4,0,0-.1,0-.2,0-.2.4-.5.8-.7,1.3-.3.7-.4,1.6-.6,2.6-.4,2.5-.9,5.5-3.5,6.9-.3-.3-.5-.6-.7-1,2-1.7,2.6-4.5,3-6.4.2-.9.3-1.6.6-2.1.3-.7.7-1.2,1.1-1.6-.5-.2-.9-.3-1.4-.4-.3.4-.6.9-.9,1.5-.3.6-.5,1.4-.7,2.4-.4,1.9-.9,4.1-2.4,5.6-.2-.5-.5-.9-.7-1.4,1-1.5,1.5-3.3,1.8-4.6.2-.8.4-1.5.6-1.9.5-.9,1-1.4,1.5-1.7-.6-.1-1.1-.3-1.5-.4-.4.4-.8.9-1.1,1.5-.3.5-.5,1.3-.7,2.2-.3,1.1-.6,2.3-1.1,3.4-.2-.9-.4-1.8-.5-2.7.1-.4.2-.8.3-1.1.2-.7.4-1.3.6-1.6.6-1,1.4-1.5,1.9-1.7-.7-.1-1.4-.2-1.9-.3-.2.2-.5.5-.7.8.2-1.1.5-2.1,1-3.1.2.1.5.3.9.5.7.4,1.6.9,2.9,1.7,0,0,0,0,0,0,.8.5,2.4,1.4,3.7,2.1.5.2,1,.3,1.5.5-1.3-1.1-2.7-2.3-4.2-3.5-1.5-1.3-2.6-2.3-3.2-2.9-.1-.1-.2-.2-.3-.3.4-.5.8-1,1.3-1.5ZM44.9,45.8c0-1,.2-1.9.2-2.8,0-1.5.1-2.9.4-3.9.5-2,1.3-3.1,2.1-3.8-.7.2-1.4.5-2.1.6-.5.8-.9,1.7-1.2,2.9-.3,1.2-.4,2.6-.4,4.1,0,1.4-.1,2.9-.4,4.3-.6.5-1.2.9-1.8,1.3.7-2,.9-4.3,1-6.3,0-1.4.2-2.7.4-3.6.3-1,.7-1.8,1.1-2.4-.5,0-1,.1-1.6.2-.3.6-.5,1.2-.7,1.9-.3,1.1-.4,2.4-.5,3.9-.2,2.5-.3,5.1-1.5,7.2-.7.3-1.5.5-2.3.6,2-2.4,2.3-5.7,2.5-8.5.1-1.3.2-2.5.5-3.4.2-.7.4-1.2.7-1.7-.5,0-.9,0-1.4,0-.2.4-.4.8-.5,1.3-.3,1-.4,2.3-.5,3.6-.3,3.2-.5,6.7-3.2,8.7-.6,0-1.3,0-1.9-.1,3.2-2.2,3.6-6.3,3.9-9.2.1-1.2.2-2.3.5-3.1.2-.5.3-.9.5-1.3.1,0,.3,0,.4,0,0,0,0,0,0,0,2.2-.5,4.8-1,6.1-1.2,0,0,0,0,0,0,1.6-.3,2.5-.5,3-.6,0,.4.1.8.1,1.2-.6.9-1.2,2-1.6,3.6-.3,1.2-.3,2.8-.4,4.4,0,0,0,0,0,.1-.4.7-.9,1.3-1.4,1.9ZM48.2,38.9c0,.5-.2,1.1-.4,1.6,0-.3,0-.6.2-.9,0-.3.1-.5.2-.7Z"/>
			</svg>
		</div>
	</a>

		<div class="widthSameButton" >
			
            <button class="buttonContattaci"><a href="https://orlandocaffe.com/contatti/">Contattaci</a></button>

            <?php echo do_shortcode('[whmc_mini_cart]'); ?>

		</div>
		
	</header>






<!-- menu popup -->
	<div class="popup" id="popup">
        <button class="close-btn" id="closeBtn" aria-label="Close Menu">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" fill="white">
                <path d="M18.3 5.7a1 1 0 0 0-1.4 0L12 10.6 7.1 5.7a1 1 0 1 0-1.4 1.4l4.9 4.9-4.9 4.9a1 1 0 1 0 1.4 1.4l4.9-4.9 4.9 4.9a1 1 0 1 0 1.4-1.4l-4.9-4.9 4.9-4.9a1 1 0 0 0 0-1.4z"/>
            </svg>
        </button>
        <nav class="popup-menu primary">
            <ul class="listaMenu">
                <li><a href="https://orlandocaffe.com/home-page/">Home</a></li>
                <li><a href="https://www.orlandocaffe.com/shop/?filter=bestseller">Shop</a></li>
				<li><a href="https://www.orlandocaffe.com/franchising/">Franchising</a></li>
				<li><a href="https://www.orlandocaffe.com/account/">Account</a></li>
				<li><a href="https://www.orlandocaffe.com/carrello/">Carrello</a></li>
				<li><a href="https://www.orlandocaffe.com/contatti/">Contattaci</a></li>
            </ul>
        </nav>
	
    </div>


<!-- cart popup -->
	<div class="popupCart" id="popupCart">
			<button class="close-btnCart" id="closeBtnCart" aria-label="Chiudi Carrello">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" fill="white">
					<path d="M18.3 5.7a1 1 0 0 0-1.4 0L12 10.6 7.1 5.7a1 1 0 1 0-1.4 1.4l4.9 4.9-4.9 4.9a1 1 0 1 0 1.4 1.4l4.9-4.9 4.9 4.9a1 1 0 1 0 1.4-1.4l-4.9-4.9 4.9-4.9a1 1 0 0 0 0-1.4z"/>
				</svg>
			</button>
		
			
			

			<?php 
				woocommerce_mini_cart();
			?>

	</div>


	