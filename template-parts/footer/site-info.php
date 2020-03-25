<?php
/**
 * Displays footer site info
 *
 * @package steduty
 * @version 1.0.0
 */

?>
<div class="mini-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            	<div class="copyright-text">
            		    <p>
							<?php $copyright_text = steduty_get_option( 'copyright_text' );
						    
						        if ( ! empty( $copyright_text ) ) : ?>
						    
						           <?php echo wp_kses_data( $copyright_text ); ?>
						    
						        <?php endif; ?>
		                        <!--
		                        <a href="<?php echo esc_url( __( 'https://www.wordpress.org/', 'steduty' ) ); ?>">  <?php printf( esc_html__( ' Proudly powered by %s ', 'steduty' ), 'WordPress ' ); ?>
							    </a>
							    -->
								<span class="sep"> <?php esc_html_e('|','steduty') ?>  </span>
								<?php printf( esc_html__( ' Theme: %1$s by %2$s', 'steduty' ), 'Steduty', '<a href="https://github.com/Yassine-Lafryhi/Steduty" target="_blank">Zakaria Mahmoud & Yassine Lafryhi</a>' ); ?>
						</p> 
		        </div>
             
            </div>
        </div>
    </div>
</div>
