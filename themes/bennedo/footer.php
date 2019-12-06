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
                    <h3>A propos</h3>
                    <ul>
                        <li><a href="<?php echo $home ?>">Home</a></li>
                        <li><a href="<?php echo $mentions ?>">Mentions Légales</a></li>
                        <li><a href="mailto:contact@bennedo.com">Nous contacter</a></li>
                    </ul>
                </div>
                <div class="col-md-6 item text">
                    <h3>Bennedo</h3>
                    <p>
                        Bennedo est une start up rouennaise qui permet au collectivité de mettre en place une application web
                        qui localise les bennes de verre autour de vous. <br><br>
                        Si vous êtes une collectivité, vous pouvez nous contacter pour mettre en place votre Bennedo.
                    </p>
                </div>
                <div class="col item social">
                    <a href="#"><i class="icon ion-social-facebook"></i></a>
                    <a href="#"><i class="icon ion-social-twitter"></i></a>
                    <a href="#"><i class="icon ion-social-linkedin"></i></a>
                    <a href="#"><i class="icon ion-social-instagram"></i></a>
                </div>
            </div>
            <p class="copyright">Bennedo © 2020 <br>
            Ceci est un exercice dans le cadre de la NFactory
            </p>
        </div>
    </footer>
</div>



<button onclick="myFunction()">Click me</button>

<script>
    function myFunction(){
        Swal.fire({
        title: 'Error!',
        text: 'Do you want to continue',
        icon: 'error',
        confirmButtonText: 'Cool'
    })
    }
</script>

<?php wp_footer() ?>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php include "inc/js.php";
?>
</body>
</html>
