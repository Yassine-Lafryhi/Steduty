<?php
/**
 * The main template file
 * @package steduty
 * @version 1.0.0
 */

get_header();
$sidebar_class = steduty_get_option( 'steduty_sidebar' );

 ?>
   <section class="page-header jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                            <h1 class="page-title">LES DERNIÈRES ACTUALITÉS</h1>


                    </div>
                </div>
            </div>
        </section>
<div id="content" class="site-content">



	<div class="container">

		<div class="row">














      <div <?php if(get_theme_mod('home_sidebar')==true) : ?> class="col-md-6" <?php else: ?>class="col-md-6 <?php echo $sidebar_class; ?>" <?php endif; ?> >

       <div id="primary" class="content-area">
         <main id="main" class="site-main" role="main">

                     <div class="steduty-post-grid row" >

                <?php
                                   if ( have_posts() ) :

                                      $i=0;
                                       while ( have_posts() ) : the_post();
if($i%2==0){
                   get_template_part( 'template-parts/post/content');}
$i++;
                                   endwhile;

                                   else :

                                       get_template_part( 'template-parts/post/content', 'none' );

                                   endif;
                               ?>
                     </div>
                           <div class="pagination-wrap">

                             <?php the_posts_pagination(); ?>

                           </div>
                       </main><!-- #main -->
                   </div><!-- #primary -->
               </div><!-- .col-md-8 -->





















               <div <?php if(get_theme_mod('home_sidebar')==true) : ?> class="col-md-6" <?php else: ?>class="col-md-6 <?php echo $sidebar_class; ?>" <?php endif; ?> >

        				<div id="primary" class="content-area">
        					<main id="main" class="site-main" role="main">

                        	    <div class="steduty-post-grid row" >

        								 <?php
                                            if ( have_posts() ) :

                                              $i=0;
                                               while ( have_posts() ) : the_post();
        if($i%2==1){
                           get_template_part( 'template-parts/post/content');}
        $i++;

                                            endwhile;

                                            else :

                                                get_template_part( 'template-parts/post/content', 'none' );

                                            endif;
                                        ?>
                        			</div>
                                    <div class="pagination-wrap">

                                      <?php the_posts_pagination(); ?>

                                    </div>
                                </main><!-- #main -->
                            </div><!-- #primary -->
                        </div><!-- .col-md-8 -->













































			<?php if(get_theme_mod('home_sidebar')==false) : ?>

			   <div class="col-md-4">

                <?php get_sidebar(); ?>

            </div>

<?php endif; ?>











		</div>
	</div>
</div>





























<div id="content" class="site-content">
<div class="container">

		<div class="row">



			<div class="col-md-6">


				<aside class="page-header jumbotron">


                            <h1 class="page-title">Mot Du Directeur</h1>



        </aside>
				<br>


				<aside id="secondary" class="widget-area" role="complementary" aria-label="Blog Sidebar">
		<section id="recent-posts-3" class="widget widget_recent_entries">
            <img src="<?php bloginfo('template_url'); ?>/assets/images/directeur.jpg" class="rounded-circle" alt="Cinque Terre" width="140px" height="236">
            <div style="text-align: center"><h2 >Najib Saber</h2></div>

            <h3 style="text-align:justify;">

                Notre objectif à <b>l’EST- Sidi Bennour</b> est d’offrir aux étudiants une formation supérieure de qualité, une ouverture sur la vie citoyenne ainsi que les moyens d’acquérir des savoir, des savoir-faire, des savoir-être et des compétences pour une insertion sociale et professionnelle.


            </h3>
					</section>
				</aside>
           </div>






				<div class="col-md-6">

						<aside class="page-header jumbotron">


                            <h1 class="page-title">Témoignage</h1>



        </aside>
				<br>
				<aside id="secondary" class="widget-area" role="complementary" aria-label="Blog Sidebar">
		<section id="recent-posts-3" class="widget widget_recent_entries" style="text-align:justify;">
<h3>" Dans l'ère de la technologie numérique et de la digitalisation de la formation. EST SIDI BENNOUR  lance son nouveau site web. Ce portail est conçu pour vous rapprocher de votre institution, ses composantes, l'organisation des études, les formations dispensées, et les diplômes délivrés. Le site présente de nombreuses nouveautés et offre aux visiteurs notamment les étudiants une expérience améliorée grâce à une navigation simplifiée et une utilisation intuitive. "</h3>
		<div align="right">
            Pr <b>Y.Baddi</b> Chef de département Génie Informatique.

        </div>

        </section>
				</aside>
           </div>



	</div>
</div>
</div>

































 <section id="school" class="page-header jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                            <h1 class="page-title"><?php bloginfo( 'name' ); ?> en chiffres</h1>


                    </div>
                </div>
            </div>
        </section>

<div id="content" class="site-content">
<div class="container">

		<div class="row">
			<div class="col-md-3">
				<aside id="secondary" class="widget-area" role="complementary" aria-label="Blog Sidebar">
		<section id="recent-posts-3" class="widget widget_recent_entries">
<div class="counter-block-wrapper clearfix" style="
    text-align: center;
    /* font-family: 'Quicksand', sans-serif; */
">
								<span class="counter-icon"> <i class="fa fa-users" style="
    color: #009688;
    /* width: 80px; */
    font-size: 48px;
    /* font-family: 'Quicksand', sans-serif; */
"></i> </span><br><span id="etudiants" class="counter" style="
    font-size: 26px;
"><?php
          echo steduty_get_option( 'students_number_text' );
          ?>
          </span><br><span class="counter-text" style="
    font-size: 26px;
">Étudiants</span>							</div>
					</section>
				</aside>
           </div>






			<div class="col-md-3">
				<aside id="secondary" class="widget-area" role="complementary" aria-label="Blog Sidebar">
		<section id="recent-posts-3" class="widget widget_recent_entries">
<div class="counter-block-wrapper clearfix" style="
    text-align: center;
    /* font-family: 'Quicksand', sans-serif; */
">
								<span class="counter-icon"> <i class="fa fa-graduation-cap" style="
    color: #009688;
    /* width: 80px; */
    font-size: 48px;
    /* font-family: 'Quicksand', sans-serif; */
"></i> </span><br><span id="laureats" class="counter" style="
    font-size: 26px;
"><<?php
             echo steduty_get_option( 'laureats_number_text' );
             ?></span><br><span class="counter-text" style="
    font-size: 26px;
">Lauréats</span>							</div>
					</section>
				</aside>
           </div>





			<div class="col-md-3">
				<aside id="secondary" class="widget-area" role="complementary" aria-label="Blog Sidebar">
		<section id="recent-posts-3" class="widget widget_recent_entries">
<div class="counter-block-wrapper clearfix" style="
    text-align: center;
    /* font-family: 'Quicksand', sans-serif; */
">
								<span class="counter-icon"> <i class="fa fa-university" style="
    color: #009688;
    /* width: 80px; */
    font-size: 48px;
    /* font-family: 'Quicksand', sans-serif; */
"></i> </span><br><span id="departements" class="counter" style="
    font-size: 26px;
"><?php
          echo steduty_get_option( 'departments_number_text' );
          ?></span><br><span class="counter-text" style="
    font-size: 26px;
">Départements</span>							</div>
					</section>
				</aside>
           </div>



			<div class="col-md-3">
				<aside id="secondary" class="widget-area" role="complementary" aria-label="Blog Sidebar">
		<section id="recent-posts-3" class="widget widget_recent_entries">
<div class="counter-block-wrapper clearfix" style="
    text-align: center;
    /* font-family: 'Quicksand', sans-serif; */
">
								<span class="counter-icon"> <i class="fa fa-user" style="
    color: #009688;
    /* width: 80px; */
    font-size: 48px;
    /* font-family: 'Quicksand', sans-serif; */
"></i> </span><br><span id="enseignants" class="counter" style="
    font-size: 26px;
"><?php
          echo steduty_get_option( 'teachers_number_text' );
          ?>

          </span><br><span class="counter-text" style="
    font-size: 26px;
">Enseignants</span>							</div>
					</section>
				</aside>
           </div>
	</div>
</div>
</div>




<script>
$(document).ready(function() {
    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

       return (elemTop <= docViewBottom);
    }
var enseignants=1;
var etudiants=1;
var laureats=1;
var departements=1;
    var myelement = $('#school'); // the element to act on if viewable
    $(window).scroll(function() {
        if(isScrolledIntoView(myelement)) {
			
			
			
			
	if(enseignants===1)	{
var val1 = window.setInterval(counter1, 10);
function counter1() {
	enseignants++;
	document.getElementById("enseignants").textContent = enseignants;;
if(enseignants===
<?php
                           echo steduty_get_option( 'teachers_number_text' );
                           ?>

                           ){window.clearInterval(val1);}
}}	
			
			
				if(etudiants===1)	{
var val2 = window.setInterval(counter2, 10);
function counter2() {
	etudiants++;
	document.getElementById("etudiants").textContent = etudiants;;
if(etudiants===<?php
                         echo steduty_get_option( 'students_number_text' );
                         ?>){window.clearInterval(val2);}
}}




	if(laureats===1)	{
var val3 = window.setInterval(counter3, 10);
function counter3() {
	laureats++;
	document.getElementById("laureats").textContent = laureats;;
if(laureats=== <?php echo steduty_get_option( 'laureates_number_text' );?> ){window.clearInterval(val3);}
}}	



	if(departements===1)	{
var val4 = window.setInterval(counter4, 10);
function counter4() {
	departements++;
	document.getElementById("departements").textContent = departements;
if(departements=== <?php echo steduty_get_option( 'departments_number_text' );?> ){window.clearInterval(val4);}
}}	
	
        } 
    });
});
</script>
























<?php get_footer();
