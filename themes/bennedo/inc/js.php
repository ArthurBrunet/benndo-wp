<script>

    var mymap = L.map('mapid').setView([43.600000, 1.433333], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        accessToken: 'pk.eyJ1Ijoia2FuYXJwcDIiLCJhIjoiY2szazZ6bnJjMDgwYzNtbm1zNHFocGZzNiJ9._V5QyjDorkoGktSpNHc1nA'
    }).addTo(mymap);

        var marker = L.marker([43.59307350990299, 1.451568603515625]).addTo(mymap);


    </script>
