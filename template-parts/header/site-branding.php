<?php
/**
 * Displays header site branding
 *
 * @package steduty
 * @version 1.0.0
 */
?>

<img src="https://cdn-06.9rayti.com/rsrc/cache/widen_292/uploads/2018/06/Logo-EST-Sidi-Bennour.jpg" width="140px" height="140px">

<div class="site-branding">

	<?php if( has_custom_logo() ) { ?>
        <div class="custom-logo">
            <?php the_custom_logo(); ?>
        </div>
	<?php } else { ?>
	<div class="site-branding-text">
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<p class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
		<p class="site-description" style="
            font-family: 'Tajawal', sans-serif;
            margin-top: 10px;
        ">المدرسة العليا للتكنولوجيا - سيدي بنور</p>
	</div>
   <?php } ?>
</div>


<img src="https://1.bp.blogspot.com/-_yUMQTdtx4U/XV77i4HIYqI/AAAAAAABCJQ/NlA2XIuEV2QddJDjM9Kgna_SKlEuMzl-ACLcBGAs/s1600/%25D8%25AC%25D8%25A7%25D9%2585%25D8%25B9%25D8%25A9-%25D8%25B4%25D8%25B9%25D9%258A%25D8%25A8-%25D8%25A7%25D9%2584%25D8%25AF%25D9%2583%25D8%25A7%25D9%2584%25D9%258A.jpg" width="140px" height="140px">

<!-- .site-branding -->
