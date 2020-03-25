<?php

if (!class_exists('Steduty_Recent_Post_Widget')) :
   
    class Steduty_Recent_Post_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults = array(
                'title'      => esc_html__('Recent Posts','steduty'),
                'no_of_post' => 3,
                'show_date'  => 1,

            );
            return $defaults;
        }
        /**
         * Constructor.
         */
        function __construct()
        {
            $opts = array(

                'classname'   => 'steduty-recent-widget',
                'description' => esc_html__('TM: Recent Post Widget', 'steduty'),
            );

            parent::__construct('steduty-recent-post', esc_html__('TM: Recent Post Widget', 'steduty'), $opts);
        }

     
      /**
         * Echo the widget content.
         */
        public function widget( $args, $instance ){
         
         if(!empty($instance)){ 
         
         $instance = wp_parse_args( (array ) $instance, $this->defaults() );
         $title       = apply_filters( 'widget_title', !empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
         $show_date   = absint( $instance['show_date'] ? 1 : 0);
         $no_of_post  = absint( $instance['no_of_post']);
             
       
          if(!empty($title) || !empty($no_of_post) )
          {
          	$query = array('showposts' => $no_of_post, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1);
		
		$loop = new WP_Query($query);
             echo $args['before_widget'];
          ?>
            <?php echo $args['before_title'] . $title . $args['after_title']; ?>
             <ul class="side-newsfeed">
			
			<?php  while ($loop->have_posts()) : $loop->the_post(); ?>
			
				<li>
				
					<div class="side-item">
											
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
						<div class="side-image">
							<a href="<?php echo esc_url(get_permalink()) ?>" rel="bookmark"><?php the_post_thumbnail('steduty-thumbnail-5', array('class' => 'side-item-thumb')); ?></a>
						</div>
						<?php endif; ?>
						<div class="side-item-text">
							<h4><a href="<?php echo esc_url(get_permalink()) ?>" rel="bookmark"><?php the_title(); ?></a></h4>
							<?php if( $show_date == 1) { ?>
							   <span class="side-item-meta"><?php the_time( get_option('date_format') ); ?></span>
						    <?php } ?>
						</div>
					</div>
				
				</li>
			
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			
			</ul>
            
          <?php
             echo $args['after_widget'];
        }
     }
   } 
        

     public function update( $new_instance, $old_instance ){
        $instance                = $old_instance;
        $instance['title']       = sanitize_text_field( $new_instance['title'] );
        $instance['show_date']   = isset($new_instance['show_date']) ? '1':'0';
        $instance['no_of_post']  = absint( $new_instance['no_of_post'] );
       
        return $instance;
     }

        /**
         * Output the settings update form.
         */
        public function form($instance ){

           $instance = wp_parse_args( (array ) $instance, $this->defaults() );

           $show_date = absint( $instance['show_date'] );
          ?>
          <p>
                <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><strong><?php _e( 'Title', 'steduty' ); ?></strong></label><br />
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" id="<?php echo esc_attr( $this->get_field_id('title')); ?>" value="<?php
                 if (isset($instance['title']) && $instance['title'] != '' ) :
                   echo esc_attr($instance['title']);
                  endif;

                  ?>" class="widefat" />
            </p>

             <p>
                 <label for="<?php echo $this->get_field_id('no_of_post'); ?>"><strong><?php _e( 'Number of posts to show:', 'steduty' ); ?></strong></label><br />
                 <input type="number" name="<?php echo $this->get_field_name('no_of_post'); ?>" id="<?php echo $this->get_field_id('no_of_post'); ?>" value="<?php 
                   if (isset($instance['no_of_post']) && $instance['no_of_post'] != '' ) :
                    echo esc_html( $instance['no_of_post'] ); 
                    else :
                      echo "2";
                 endif;
                 ?>" class="widefat" />
                 <span class="small"></span>
              </p>
              <p>
                <input class="widefat" id="<?php echo  esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo  esc_attr( $this->get_field_name( 'show_date' ) ); ?>" type="checkbox" value="<?php echo esc_attr( $show_date ); ?>" <?php checked( 1, esc_attr( $show_date ), 1 ); ?>/>
                <label for="<?php echo  esc_attr( $this->get_field_id( 'active_slider' ) ); ?>"><strong><?php echo esc_html__( 'Show Post Date' ,'steduty'); ?></strong></label>

            </p>
            
          <?php
     }
}
endif;

add_action( 'widgets_init', 'steduty_recenet_post_widget' );
function steduty_recenet_post_widget(){
    register_widget( 'Steduty_Recent_Post_Widget' );
}