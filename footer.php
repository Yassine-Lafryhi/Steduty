<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EduPress
 */

$estsb_logo = get_template_directory_uri() . '/assets/images/logo_estsb.jpg';

?>

<footer class="site-footer" role="contentinfo" >

    <?php get_sidebar( 'footer' ); ?>

    <div class="wrapper wrapper-copy">
        <p class="copy"><?php _e('Copyright &copy;','edupress');?> <?php echo date_i18n(__("Y","edupress")); ?> <?php bloginfo('name'); ?>. <?php _e('All Rights Reserved', 'edupress');?>. </p>
        <p class="copy-ilovewp"><span class="theme-credit"><?php _e( 'Theme by', 'edupress' ); ?><a href="http://www.estsb.ucd.ac.ma/" rel="nofollow external designer noopener" class="footer-logo-ilovewp"><img src="<?php echo esc_url($estsb_logo); ?>" width="150" height="11" alt="<?php esc_attr_e('Education WordPress Theme', 'edupress');?>" /></a></span></p>
    </div><!-- .wrapper .wrapper-copy -->

</footer><!-- .site-footer -->

</div><!-- end #container -->

<?php wp_footer(); ?>

</body>
</html>