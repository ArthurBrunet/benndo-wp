<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bennedo
 */
           $args = array(
                        "page"       => 'politique-de-confidentialite',
                    );
                    // The Query
                    $the_query = new WP_Query( $args );

                    // The Loop
                    if ( $the_query->have_posts() ) {
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            $mentions = get_the_permalink() . '/mentions';
                            $home = get_the_permalink();
                         }
                    }
                    ?>

<div class="footer-dark">
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 item text-center">
                    <h3 class="second-title">A propos</h3>
                    <ul class="second-p">
                        <li><a href="<?php echo $home ?>">Home</a></li>
                        <li><a href="<?php echo $mentions ?>">Mentions Légales</a></li>
                        <li><a href="mailto:contact@bennedo.com">Nous contacter</a></li>
                    </ul>
                </div>
                <div class="col-md-6 item text">
                    <h3 class="second-title">Bennedo</h3>
                    <p class="second-p">
                        Bennedo est une start up rouennaise qui permet au collectivité de mettre en place une application web
                        qui localise les bennes de verre autour de vous. <br><br>
                        Si vous êtes une collectivité, vous pouvez nous contacter pour mettre en place votre Bennedo.
                    </p>
                </div>
                <div class="col item social">
                    <a href="#"><i class="icon ion-social-facebook"></i></a>
                    <a href="#"><i class="icon ion-social-twitter"></i></a>
                    <a href="#"><i class="icon ion-social-linkedin"></i></a>
                </div>
            </div>
            <p class="copyright">Bennedo © 2020 <br>
            Ceci est un exercice dans le cadre de la NFactory
            </p>
        </div>
    </footer>
</div>






<?php wp_footer() ?>
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.6.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.6.0/mapbox-gl.css' rel='stylesheet' />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.min.js"></script>
<link
    rel="stylesheet"
    href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.css"
    type="text/css"
/>
<?php
include "inc/alert.php";
include "inc/api.php";
include "inc/marker2.php";
include "inc/f.php";
include "inc/data.php";

?>
</body>
</html>
