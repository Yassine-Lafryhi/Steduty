<?php
/**
 * The template for displaying all single posts
 * @package steduty
 * @version 1.0.0
 */

get_header(); ?>
<div id="content" class="site-content">
	<div class="container">
        <div class="row">
     		
			<div <?php if(get_theme_mod('post_sidebar')==true) : ?> class="col-md-12" <?php else: ?>class="col-md-8" <?php endif; ?> >
			
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
            
                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();
            
                            get_template_part( 'template-parts/post/single');
							
                            if(!get_theme_mod('article_next_post')) :
                            the_post_navigation( array(
                                    'prev_text' => '<span class="previous-label">' . __( 'Previous', 'steduty' ) . '</span>
                                        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                        <span class="nav-title">%title</span>',
                                    'next_text' => '<span class="next-label">' . __( 'Next', 'steduty' ) . '</span>
                                        <span class="nav-title">%title</span>
                                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>',
							) );
							
							endif;
							
							if(!get_theme_mod('article_related_post')) :
							 get_template_part('include/related_post');
						    endif;
            
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
            
            
                        endwhile; // End of the loop.
                        ?>
            
                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
			
			<?php if(get_theme_mod('post_sidebar')==false) : ?> 
			
			   <div class="col-md-4">    
                
                <?php get_sidebar(); ?>
            
                </div>
	
            <?php endif; ?> 
        </div>
	</div>
</div>
<?php get_footer();
