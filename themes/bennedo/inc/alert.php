<script>
    function trash_full(id_bin, hash_consumer){
        var type = 'full';
        var action = 'report';

        Swal.fire({
            title: 'Poubelle pleine!',
            text: 'Votre signalement a bien été pris en compte',
            icon: 'success',
            confirmButtonText: 'Ok'
        });
    }

    function broken_full(id_bin, hash_consumer){

        var json =
        [
            {
                "id_bin": id_bin,
                "hash_consumer": hash_consumer,
                "action" : "report",
                "type" : "broken"
            }
        ];

        var data = JSON.stringify(json);
        console.log(json);
        console.log(data);

        var req = new XMLHttpRequest();
        req.open('POST', 'http://localhost:8001/reports/create', true);
        req.setRequestHeader('Content-Type', 'application/json');
        req.setRequestHeader('Access-Control-Allow-Origin', '*');
        req.setRequestHeader('Access-Control-Allow-Methods', 'POST');
        req.setRequestHeader('Access-Control-Allow-Headers', 'Content-Type');
        req.send(data);

        Swal.fire({
            title: 'Poubelle Défectueuse !',
            text: 'Votre signalement a bien été pris en compte',
            icon: 'success',
            confirmButtonText: 'Ok'
        });
    }

    function yes(){
        var json =
                [
                    {
                        "id_bin": id_bin,
                        "hash_consumer": hash_consumer,
                        "action" : "confirm",
                        "type" : "null"
                    }
                ];

                var data = JSON.stringify(json);
                console.log(json);
                console.log(data);

                var req = new XMLHttpRequest();
                req.open('POST', 'http://localhost:8001/reports/create', true);
                req.setRequestHeader('Content-Type', 'application/json');
                req.setRequestHeader('Access-Control-Allow-Origin', '*');
                req.setRequestHeader('Access-Control-Allow-Methods', 'POST');
                req.setRequestHeader('Access-Control-Allow-Headers', 'Content-Type');
                req.send(data);

        Swal.fire({
            title: 'Oui !',
            text: 'Votre réponse a bien été pris en compte',
            icon: 'success',
            confirmButtonText: 'Ok'
        })
    }

    function actionImpossible(){
        Swal.fire({
                    title: 'Action impossible !',
                    text: 'Vous avez déjà envoyé ce signalement',
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                })
    }

    function no(){
    var json =
                    [
                        {
                            "id_bin": id_bin,
                            "hash_consumer": hash_consumer,
                            "action" : "refute",
                            "type" : "null"
                        }
                    ];

                    var data = JSON.stringify(json);
                    console.log(json);
                    console.log(data);

                    var req = new XMLHttpRequest();
                    req.open('POST', 'http://localhost:8001/reports/create', true);
                    req.setRequestHeader('Content-Type', 'application/json');
                    req.setRequestHeader('Access-Control-Allow-Origin', '*');
                    req.setRequestHeader('Access-Control-Allow-Methods', 'POST');
                    req.setRequestHeader('Access-Control-Allow-Headers', 'Content-Type');
                    req.send(data);

        Swal.fire({
            title: 'Non !',
            text: 'Votre réponse a bien été pris en compte',
            icon: 'success',
            confirmButtonText: 'Ok'
        })
    }
</script>