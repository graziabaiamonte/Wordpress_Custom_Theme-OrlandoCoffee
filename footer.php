<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Orlando
 */

?>

	<footer id="colophon" class="footerMain">
	
    <div class="testoFooter secondary">

       <div class="menuFooterPrimary">
            <!-- <p class="titleMenu">Vieni a trovarci nel nostro punto vendita</p> -->
            <a target="_blank" href="https://www.google.com/maps/dir//orlando+caff%C3%A8+alcamo/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x131987c7c7499d93:0x6afd77d4ef9a89b4?sa=X&ved=1t:3061&ictx=111" class="infoMenu">Corso VI Aprile, 118, 91011 Alcamo TP</a>
            <a href="mailto:orlandogroupsrl@gmail.com" class="infoMenu">orlandogroupsrl@gmail.com</a>
            <div class="footerNumber">
                <a href="tel:0924525970" class="infoMenu">0924 525970</a> | <a href="tel:3509879625" class="infoMenu">350 9879625</a> 
            </div>
            
            <!-- social -->
            <div class="boxSocial">
               <a target="_blank" href="https://www.facebook.com/orlandogroup87/">Facebook</a>
               <p>|</p>
               <a target="_blank" href="https://www.instagram.com/orlando_caffe_2022/">Instagram</a>
            </div>
            
       </div>

       <div class="menuFooter">
          <a href="https://www.orlandocaffe.com/privacy/">Privacy</a>
          <a href="https://www.orlandocaffe.com/cookie-policy/">Cookie Policy</a>
          <a href="https://www.orlandocaffe.com/condizioni-di-vendita/">Condizioni di vendita</a>
          <a href="https://www.orlandocaffe.com/condizioni-duso/">Condizioni d'uso</a> 
       </div>
       
       <div class="credit">
            <p class="srl">© 2025 Orlando s.r.l.</p>
            <p class="adduma">Designed by <a href="https://www.adduma.it/" target="_blank">ADDUMA</a>, with care, coffee and love.</p> 
       </div>

    </div>
    
    
          <img src="https://www.orlandocaffe.com/wp-content/uploads/2025/02/logoFooterrrr.svg" alt="logo Orlando" class="logoFooter">

	</footer>
</div>

<?php wp_footer(); ?>

<script src="https://unpkg.com/@studio-freight/lenis@1.0.34/dist/lenis.min.js"></script>
<script>
   

document.addEventListener("DOMContentLoaded", function () {
  const lenis = new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    direction: "vertical",
    smooth: true,
  });

  function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
  }
  requestAnimationFrame(raf);
});

</script>
</body>


</html>
