<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * Template Name: Home Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tema_orlando
 */

get_header();
?>

	<main class="containerMain">
	    
		<!-- HERO -->
		 <div  id="slice" class="section3d desktopHero">
		 	<!-- <img fetchpriority="high" alt="video coffee bar"  src="https://www.illy.com/livestory/media/v1/illy/posts/r3000/675811d4ce7978c0f5e16cee.jpg.webp"/> -->
          
             <div class="textBoxLight"><h1 class="testoMain primary testoHeroLight" >Il vero gusto del caffè, a casa tua!</h1></div>

             <video  class="heroVideo" autoplay muted loop playsinline preload="metadata" >
                <source src="https://orlandocaffe.com/wp-content/uploads/2025/05/video-home-2.webm" type="video/webm">

                <!-- aggiunto perchè in safari non funziona il webm -->
                <source src="https://orlandocaffe.com/wp-content/uploads/2025/05/video_home_reduced-.mp4" type="video/mp4">
             </video> 

    	</div>

		<div class="mobileHero">
		 	<!-- <img  alt="video coffee bar"  src="https://www.illy.com/livestory/media/v1/illy/posts/r3000/675811d4ce7978c0f5e16cee.jpg.webp"/> -->

             <div class="textBoxLight"><h2 class="testoMain primary testoHeroMobileLight" >Il vero gusto del caffè, a casa tua!</h2></div>
             
             <video  class="heroVideo" autoplay muted loop playsinline preload="metadata">
                <source src="https://orlandocaffe.com/wp-content/uploads/2025/05/video-home-2.webm" type="video/webm">
                <source src="https://orlandocaffe.com/wp-content/uploads/2025/05/video_home_reduced-.mp4" type="video/mp4">
             </video> 
    	</div>


   
		
		
		<!-- COFFE -->
		<div id="intro" class="section section3d section-coffee ">
	
		<div class="textBoxDark"><h2 class="testoMain primary testoHeroDark" >Il vero gusto del caffè, a casa tua!</h2></div>
        
		
			<div class="second-section">
				
	
				
				<div id="testoMainSinistra" class="primoTesto primary">
					<h3>L’aroma che ami, la freschezza che meriti.</h3>
				</div>
				
				<!-- pack e coffee -->	
				<div class="pack">
					<img loading="lazy" src="https://orlandocaffe.com/wp-content/uploads/2025/03/chicco-coffee.webp" alt="chicco" class="chicco one">
					<img loading="lazy"  src="https://orlandocaffe.com/wp-content/uploads/2025/03/chicco-coffee.webp" alt="chicco" class="chicco two">
					<img loading="lazy"  src="https://orlandocaffe.com/wp-content/uploads/2025/03/chicco-coffee.webp" alt="chicco" class="chicco three">
					<img loading="lazy"  src="https://orlandocaffe.com/wp-content/uploads/2025/03/chicco-coffee.webp" alt="chicco" class="chicco four">
					<img loading="lazy"  src="https://orlandocaffe.com/wp-content/uploads/2025/03/chicco-coffee.webp" alt="chicco" class="chicco five"> 
					<img loading="lazy"  src="https://orlandocaffe.com/wp-content/uploads/2025/03/chicco-coffee.webp" alt="chicco" class="chicco six">
					<img loading="lazy"  src="https://orlandocaffe.com/wp-content/uploads/2025/03/chicco-coffee.webp" alt="chicco" class="chicco seven">
					<img loading="lazy"  src="https://orlandocaffe.com/wp-content/uploads/2025/03/chicco-coffee.webp" alt="chicco" class="chicco eight">
					<img loading="lazy"  src="https://orlandocaffe.com/wp-content/uploads/2025/03/chicco-coffee.webp" alt="chicco" class="chicco nine">
					<img loading="lazy"  src="https://orlandocaffe.com/wp-content/uploads/2025/03/chicco-coffee.webp" alt="chicco" class="chicco ten">
					<img loading="lazy"  src="https://orlandocaffe.com/wp-content/uploads/2025/03/chicco-coffee.webp" alt="chicco" class="chicco eleven">
					
				</div>

				<div class="secondoTesto">
					<h2 id="testoMainD primary" class="primary">Ogni sorso del nostro caffè racconta una storia di passione e qualita'.</h2>
					<p id="testoSecondD" class="secondary">Trasforma ogni pausa in un momento di puro piacere con il nostro caffè, nato dall’equilibrio perfetto tra aroma intenso e freschezza garantita.</p>
					
					<!-- linea decoro -->
					<div id="lineaSecond" class="lineaCoffee"></div>

					<a href="<?php echo site_url('/shop/?filter=coffee'); ?>">
                        <button id="buttonCoffee" class="buttonShop secondary">Vai allo shop</button>
                    </a>


					
				</div>
			</div>
			<div id="three-container"></div>
		</div>

		

		<!-- GRAPPA -->
		<div class="section section-grappa">
			
				<img loading="lazy"  id="grappaNera" src="https://orlandocaffe.com/wp-content/uploads/2025/04/grappa_nera.webp" alt="grappa nera" class="grappaNera">
		       <img loading="lazy"  id="grappaBianca" src="https://orlandocaffe.com/wp-content/uploads/2025/04/grappa_bianca-copia.webp" alt="grappa bianca" class="grappaBianca">
				
			
			<!-- testo -->
			<div class="testoGrappa secondary">
					<h2 id="mainTestoGrappa" class="primary">Il carattere autentico della grappa italiana</h2>
					<p id="secondTestoGrappa"> Scopri la nostra selezione di grappe pregiate, distillate con maestria per offrirti un gusto intenso e avvolgente. Dai sapori morbidi e aromatici alle note più decise, ogni sorso è un viaggio nella tradizione. </p>
					
					<!-- linea decoro -->
					<div id="lineaGrappa" class="lineaGrappa"></div>

					<a data-filter="grappe" href="<?php echo site_url('/shop/?filter=grappa'); ?>">
						<button  class="buttonShopGrappa secondary">Vai allo shop</button>
					</a>
					

					<!-- bollini -->
					<!-- <div class="bollinoBox">
						<img id="bollino1Grappa" src="wp-content/themes/tema_orlando/assets/bollino.png" alt="bollino" class="bollino">
						<img id="bollino2Grappa" src="wp-content/themes/tema_orlando/assets/bollino.png" alt="bollino" class="bollino">
						<img id="bollino3Grappa" src="wp-content/themes/tema_orlando/assets/bollino.png" alt="bollino" class="bollino">
					</div> -->
			</div>
		
			
				<!-- pack -->
			<div class="packGrappa">
				
			</div>

		</div>

		<!-- GIN -->
		<div class="section section-gin">
			
			<!-- pack gin -->
			<div class="packGin">
				<img loading="lazy"  id="ginPompelmo" src="https://www.orlandocaffe.com/wp-content/uploads/2025/02/ginPompelmo-scaled.webp" alt="gin al pompelmo rosa" class="ginPompelmo">
				<img loading="lazy"  id="ginOriginal" src="https://www.orlandocaffe.com/wp-content/uploads/2025/02/ginOriginal-1-scaled.webp" alt="gin original" class="ginOriginal">
				<img loading="lazy"  id="ginLimone" src="https://www.orlandocaffe.com/wp-content/uploads/2025/02/ginLimone-scaled.webp" alt="gin ai limoni di Sicilia" class="ginLimone">
			</div>

			<!-- testo gin -->
			<div class="testoGin secondary">
					<h2 id="mainTestoGin" class="primary"> L’essenza dell'Oriente in ogni sorso.</h2>
					<p id="secondTestoGin">Ispirato dal vento di scirocco orientale, unisce botaniche selezionate e lavorazione artigianale per creare gin dal gusto fresco e avvolgente. Ogni bottiglia racconta storie attraverso immagini e aromi, celebrando la tradizione del condividere un drink. Scopri Sharq e lasciati trasportare in un’esperienza unica.</p>
					
					<!-- linea decoro -->
					<div id="lineaGin" class="lineaGin"></div>

					<!-- gusti -->
					<div class="gustiBox primary">
						<a href="https://www.orlandocaffe.com/index.php/product/gin-original/" id="gustoOriginal">ORIGINAL</a>
						<a href="https://www.orlandocaffe.com/index.php/product/gin-ai-limoni-di-sicilia/" id="gustoLimone">LIMONI DI SICILIA</a>
						<a href="https://www.orlandocaffe.com/index.php/product/gin-al-pompelmo/" id="gustoPompelmo">POMPELMO ROSA</a>
					</div>

					<a  href="<?php echo site_url('/shop/?filter=gin'); ?>">
						<button id="buttonShopGin"  class="buttonShopGin secondary">Vai allo shop</button>
					</a>
					
			</div>
		</div>


		<!-- AMARO -->
		<div class="section section-amaro">
			
			<!-- testo -->
			<div class="testoAmaro secondary">
					<h2 id="mainTestoAmaro" class="primary">L’intensita' unica dell’amaro italiano</h2>
					<p id="secondTestoAmaro">Un distillato dal carattere deciso, ricco di erbe aromatiche e note agrumate, ideale per concludere ogni pasto con una nota di classe. Scopri il nostro amaro, un vero e proprio viaggio nei sapori autentici della nostra terra.</p>
					
					<!-- linea decoro -->
					<div id="lineaAmaro" class="lineaAmaro"></div>
					
					<a href="<?php echo site_url('/shop/?filter=amaro'); ?>">
						<button id="buttonShopAmaroo"class="buttonShopAmaro secondary">Vai allo shop</button>
					</a>
                  
					
			</div>

			<!-- pack -->
			<div class="packAmaro">
				<img loading="lazy"  id="amaro" src="https://orlandocaffe.com/wp-content/uploads/2025/04/amaro_arcamu_home-scaled.webp" alt="amaro Arcamu" class="amaro">
				<img loading="lazy"  id="amaroMobile" src="https://orlandocaffe.com/wp-content/uploads/2025/03/amaro_arcamu-scaled.webp" alt="amaro Arcamu" class="amaroMobile">
			</div>
		</div>


		<!-- LIQUORI -->
		<div class="section section-liquori">
		
			<!-- testo -->
			<div class="testoLiquori secondary">
				<h2 id="mainTestoLiquori" class="primary">Liquori artigianali, un piacere in ogni goccia</h2>
				<p id="secondTestoLiquori">Scopri la nostra gamma di liquori raffinati, preparati con ingredienti di qualità per offrirti un'esperienza dolce e avvolgente. Perfetti per ogni occasione, dai momenti di relax a quelli da condividere con amici. Un brindisi alla tradizione e al gusto!</p>

				<a href="<?php echo site_url('/shop/?filter=liquori'); ?>">
					<button id="buttonShopLiquori"class="buttonShopGeneralLiquori secondary">Scoprili tutti</button>
				</a>
			</div>

			<!-- 'slider' -->
			<div class="slider">

				<!-- classico -->
				<div class="boxSingleAmaro">
					<img id="classico" src="https://www.orlandocaffe.com/wp-content/uploads/2025/02/liquore_amaro-scaled.webp" alt="crema di liquore al pistacchio" class="bottleLiquore">

					<!-- box color -->
					<div class="boxSingol classico">
						<h3 class="fontLiquori gusto">CLASSICO</h3>
						
						<div class="buttonBox">
							<a href="https://www.orlandocaffe.com/product/amaro-quattrotorri/"><button class="secondary buttonShopLiquori">SCOPRI</button></a>
						</div>
						
					</div>
				</div>

				<!-- pistacchio -->
				<div class="boxSingleAmaro">
					<img loading="lazy"  id="pistacchio" src="https://www.orlandocaffe.com/wp-content/uploads/2025/02/liquore_pistacchio-scaled.webp" alt="crema di liquore al pistacchio" class="bottleLiquore">

					<!-- box color -->
					<div class="boxSingol pistacchio">
						<h3 class="fontLiquori">Crema di<span>Liquore al</span> <span class="gusto">PISTACCHIO</span></h3>
						
						<div class="buttonBox">
							<a href="https://www.orlandocaffe.com/product/crema-di-liquore-al-pistacchio/"><button class="secondary buttonShopLiquori">SCOPRI</button></a>
						</div>
						
					</div>
				</div>

				<!-- cioccolato -->
				<div class="boxSingleAmaro">
					<img loading="lazy"  id="cioccolato" src="https://www.orlandocaffe.com/wp-content/uploads/2025/02/liquore_cioccolato-scaled.webp" alt="crema di liquore al cioccolato" class="bottleLiquore">

					<!-- box color -->
					<div class="boxSingol cioccolato" cioccolato>
					
						<h3 class="fontLiquori">Crema di<span>Liquore al</span> <span class="gusto">CIOCCOLATO</span></h3>
						
						<div class="buttonBox">
							<a href="https://www.orlandocaffe.com/product/crema-di-liquore-al-cioccolato/"><button class="secondary buttonShopLiquori">SCOPRI</button></a>
						</div>
						
					</div>
				</div>

				<!-- caffè -->
				<div class="boxSingleAmaro">
					<img  loading="lazy" id="caffe" src="https://www.orlandocaffe.com/wp-content/uploads/2025/02/liquore_caffe-scaled.webp" alt="crema di liquore al caffè" class="bottleLiquore">
					
					<!-- box color -->
					<div class="boxSingol caffe">
						<h3 class="fontLiquori">Crema di<span>Liquore al</span> <span class="gusto">CAFFE'</span></h3>
						
						<div class="buttonBox">
							<a href="https://www.orlandocaffe.com/product/crema-di-liquore-al-caffe/"><button class="secondary buttonShopLiquori">SCOPRI</button></a>
						</div>
						
					</div>
				</div>

				<!-- crema limoncello -->
				<div class="boxSingleAmaro">
					<img loading="lazy"  id="limoncelloCrema" src="https://www.orlandocaffe.com/wp-content/uploads/2025/02/liquore_cremaLimoncello-scaled.webp" alt="crema di limoncello" class="bottleLiquore">

					<!-- box color -->
					<div class="boxSingol limoncelloCrema">
						<h3 class="fontLiquori">Crema di<span><span class="gusto">LIMONCELLO</span></span></h3>
						
						<div class="buttonBox">
							<a href="https://www.orlandocaffe.com/product/crema-di-limoncello/"><button class="secondary buttonShopLiquori">SCOPRI</button></a>
						</div>
						
					</div>
				</div>

				<!-- limoncello -->
				<div class="boxSingleAmaro">
				<img loading="lazy"  id="limoncello" src="https://www.orlandocaffe.com/wp-content/uploads/2025/02/liquore_limoncello-scaled.webp" alt="limoncello" class="bottleLiquore">
					<!-- box color -->
					<div class="boxSingol limoncello">
					
						<h3 class="fontLiquori gusto">LIMONCELLO</h3>

						<div class="buttonBox">
							<a href="https://www.orlandocaffe.com/product/limoncello/"><button class="secondary buttonShopLiquori ">SCOPRI</button></a>
						</div>
						
					</div>
				</div>
				
				
			</div>

			<div class="slider-dots"></div> <!-- Container per i dots -->
		</div>


		<!-- Franchising -->
		<div class="section-franc">
			
			<!-- foto pack -->
			<div class="fotoPack">
                <img src="https://orlandocaffe.com/wp-content/uploads/2025/05/mix_prodotti-scaled.webp" alt="pack Orlando"/>
			</div>

			<!-- testo -->
			<div class="testoBox">
				<h2 class="primary">Dai nuova vita al tuo bar: entra nel nostro <span>franchising!</span></h2>
				<p class="secondary">Ti aiutiamo a trasformare il tuo bar in un punto franchising di successo, con il nostro brand come garanzia di qualità e visibilità. Offriamo un modello collaudato che include restyling degli ambienti, formazione dedicata e supporto continuo. Con noi, potrai migliorare l'efficienza del tuo locale e attrarre una clientela sempre più vasta.
				</p>
				<p class="secondary" style="text-transform: uppercase;">
					Scegli di crescere con un marchio forte e una rete solida: il futuro del tuo bar inizia qui!
				</p>

				<!-- linea decoro -->
				<div id="lineaFranc" class="lineaFranc"></div>

				<a href="https://www.orlandocaffe.com/index.php/franchising/">
					<button id="buttonFranc"class="buttonFranc secondary">Scopri</button>
				</a>
			</div>
			
		</div>

	</main>

<?php
get_footer();
