<style>
    #marker {
        background-image: url('https://www.aidedd.org/dnd/images/red-dragon.jpg');
        background-size: cover;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
    }

    .mapboxgl-popup {
        max-width: 200px;
    }
</style>

<script>
    var fcoord = [-5.686558, -15.946579];

    // create the popup
    var popup = new mapboxgl.Popup({ offset: 25 })
        .setHTML(
            '<button type="button" class="btn btn-danger" onclick="f()">Prêt ?</button>'
        )

    // create DOM element for the marker
    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    var marker = new mapboxgl.Marker(el)
        .setLngLat(fcoord)
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    function animateMarker(timestamp) {
        var radius = 20;

// Update the data to a new position based on the animation timestamp. The
// divisor in the expression `timestamp / 1000` controls the animation speed.
        marker.setLngLat([
            Math.cos(timestamp / 1000) * radius,
            Math.sin(timestamp / 1000) * radius
        ]);

// Ensure it's added to the map. This is safe to call if it's already added.
        marker.addTo(map);

// Request the next frame of the animation.
        requestAnimationFrame(animateMarker);
    }

    // Start the animation.
    requestAnimationFrame(animateMarker);

    function f() {
        Swal.fire({
            title: '<span style="color:red">Lors du rendu de projet<span>',
            background: ' rgba(0,0,0,0)',
            confirmButtonColor: '#ff5733',
            backdrop: `
                url("<?= get_template_directory_uri() ?>/assets/img/st helene.jpg")
                top center
                no-repeat
              `
        })
    }



</script>