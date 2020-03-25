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
<h2>test</h2>
					</section>
				</aside>
           </div>






				<div class="col-md-6">

						<aside class="page-header jumbotron">


                            <h1 class="page-title">Témoignage</h1>



        </aside>
				<br>
				<aside id="secondary" class="widget-area" role="complementary" aria-label="Blog Sidebar">
		<section id="recent-posts-3" class="widget widget_recent_entries">
<h2>test</h2>
					</section>
				</aside>
           </div>



	</div>
</div>
</div>

































 <section class="page-header jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                            <h1 class="page-title">ESTSB en chiffres</h1>


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
"></i> </span><br><span class="counter" style="
    font-size: 26px;
">420</span><br><span class="counter-text" style="
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
"></i> </span><br><span class="counter" style="
    font-size: 26px;
">120</span><br><span class="counter-text" style="
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
"></i> </span><br><span class="counter" style="
    font-size: 26px;
">3</span><br><span class="counter-text" style="
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
"></i> </span><br><span class="counter" style="
    font-size: 26px;
">36</span><br><span class="counter-text" style="
    font-size: 26px;
">Enseignants</span>							</div>
					</section>
				</aside>
           </div>
	</div>
</div>
</div>





























<?php get_footer();
