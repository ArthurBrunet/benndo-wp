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