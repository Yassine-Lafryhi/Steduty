<?php

$estsb_logo = get_template_directory_uri() . '/assets/images/logo_estsb.jpg';

?>

<footer class="site-footer" role="contentinfo" >

    <div class="container">

        <div class="row">
            <div class="col-sm-3"  id="text_footer">
                <h2>EST SIDI BENNOUR</h2>
                <p>Adresse : Avenue des Facultés, El Jadida 24000.<br>
                    Téléphone : 0600000000<br>
                    Fax : 0500000000</p>

            </div>
            <div class="col-sm-3"  id="text_footer">
                <h2>NAVIGATION</h2>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Mot du directeur</a></li>
                    <li><a href="#">Présentation</a></li>
                    <li><a href="#">Actualités</a></li>
                </ul>
            </div>
            <div class="col-sm-3"  id="text_footer" >
                <h2>FILIÈRES DUT</h2>
                <ul>
                    <li><a href="#">Génie Informatique</a></li>
                    <li><a href="#">Techniques de Management</a></li>
                    <li><a href="#">Génie Agro-Environnement</a></li>

                </ul>

            </div>
            <div class="col-sm-3" id="text_footer">
                <h2>MAP</h2>
                <p>
<iframe src="<?php bloginfo('template_url'); ?>/assets/images/adress_est.png" width="100%" frameborder="0" style="border:0" allowfullscreen=""></iframe>                </p>
            </div>
        </div>

    </div>
    <div class="wrapper wrapper-copy">
        <p class="copy">Copyright © <?php echo date("Y"); ?> EST Sidi Bennour. All Rights Reserved. </p>
        <p class="copy-ilovewp"><span class="theme-credit">Powered by <a href="https://github.com/Yassine-Lafryhi/Steduty"  class="footer-logo-ilovewp"  style="text-decoration:  none; font-size: 16px;">Steduty</a></span></p>
    </div>
</footer><!-- .site-footer -->

</div><!-- end #container -->

<?php wp_footer(); ?>

</body>
</html>