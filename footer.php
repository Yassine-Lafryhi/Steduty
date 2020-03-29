<?php
/**
 * The template for displaying the footer
 * @package steduty
 * @version 1.0.0
 */

?>

<!--================================
        START FOOTER AREA
    =================================-->
    <footer class="footer-area">

      <?php get_template_part( 'template-parts/footer/site', 'info' ); ?>

    </footer>

<!--================================
    END FOOTER AREA
    =================================-->

</div><!-- #page -->
<a href="#page" class="back-to-top" id="back-to-top" style="display: block;"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
<?php $back_to_top_type = steduty_get_option( 'back_to_top_type' );

if($back_to_top_type == 'enable'): ?>

<a href="#page" class="back-to-top" id="back-to-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

<?php endif; ?>

<?php wp_footer(); ?>

</body>

</html>
