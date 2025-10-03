<?php
/**
 * Template Name: Contattaci Page
 *
 * @package tema_orlando
 */

get_header();

?>

<div class="mainFranc">

    <!-- Hero -->
    <div>

        <!-- foto -->
        <!-- <div class="boxFotoContatti">
            <img class="imgHeroContatti" src="https://orlandocaffe.com/wp-content/uploads/2025/03/castello_alcamo_migliorata-scaled.jpg" alt="Foto Hero"/>
        </div> -->

        <!-- div normale con sfondo colorato senza foto -->
         <div class="boxMainColor">
            <h1 class="primary">rimaniamo in contatto</h1>
         </div>

        <!-- main box -->
        <div class="mainContatti">

            <!-- contatti laterale -->
            <div class="boxSinistra">

                <div>
                    <h3 class="primary">Dove ci trovi</h3>
                    <a target="_blank" href="https://www.google.com/maps/dir//orlando+caff%C3%A8+alcamo/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x131987c7c7499d93:0x6afd77d4ef9a89b4?sa=X&ved=1t:3061&ictx=111" >Corso VI Aprile, 118, 91011 Alcamo TP</a>
                </div>

                <div>
                    <h3 class="primary">Chiamaci</h3>
                    <a href="tel:+393487181904" class="infoMenu">0924 525661</a>
                </div>

                <div>
                    <h3 class="primary">Seguici sui social</h3>
                   
                    <div class="boxSocial">
                        <a  target="_blank" href="https://www.instagram.com/orlando_caffe_2022">
                            <svg class="iconSocial" id="Livello_1" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 100 100">
                                <path class="st0" d="M33.3,10c-12.9,0-23.3,10.5-23.3,23.3v33.3c0,12.9,10.5,23.3,23.3,23.3h33.3c12.9,0,23.3-10.5,23.3-23.3v-33.3c0-12.9-10.5-23.3-23.3-23.3h-33.3ZM73.3,23.3c1.8,0,3.3,1.5,3.3,3.3s-1.5,3.3-3.3,3.3-3.3-1.5-3.3-3.3,1.5-3.3,3.3-3.3ZM50,30c11,0,20,9,20,20s-9,20-20,20-20-9-20-20,9-20,20-20ZM50,36.7c-7.4,0-13.3,6-13.3,13.3s6,13.3,13.3,13.3,13.3-6,13.3-13.3-6-13.3-13.3-13.3Z"/>
                            </svg>
                        </a>

                        <a target="_blank" href="https://www.facebook.com/orlandogroup87/">
                            <svg class="iconSocial"  xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 50 50">
                                <path class="st0" d="M25,3C12.9,3,3,12.9,3,25s8.1,20.1,18.7,21.7v-15.9h-5.4v-5.8h5.4v-3.8c0-6.4,3.1-9.2,8.4-9.2s3.9.2,4.5.3v5h-3.6c-2.2,0-3,2.1-3,4.5v3.2h6.6l-.9,5.8h-5.7v15.9c10.7-1.5,19-10.6,19-21.8S37.2,3,25,3Z"/>
                            </svg>
                        </a>
                    </div>
                   
                </div>
            </div>

            <!-- form centrale + titolo -->
            <div class="boxDestra">
                <!-- <h1 class="primary">Rimaniamo in contatto</h1> -->
                
                <!-- form -->
                <div>
                <?php echo do_shortcode('[contact-form-7 id="d45cb46" title="Contact form 1"]'); ?>
                </div>
            </div>
            
        </div>

    </div>

</div>

<?php
get_footer();
