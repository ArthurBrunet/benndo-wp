<script>
    function trash_full(id_bin, id_consumer){
        var json =
                [
                    {
                        "id_bin": id_bin,
                        "hash_consumer": id_consumer,
                        "action" : "report",
                        "type" : "full"
                    }
                ];

                var data = JSON.stringify(json);

                var req = new XMLHttpRequest();
                req.open('POST', 'http://localhost:8000/reports/create', true);
                req.setRequestHeader('Content-Type', 'application/json');
                req.setRequestHeader('Access-Control-Allow-Origin', '*');
                req.setRequestHeader('Access-Control-Allow-Methods', 'POST');
                req.setRequestHeader('Access-Control-Allow-Headers', 'Content-Type');
                req.send(data);

        Swal.fire({
            title: 'Poubelle pleine!',
            text: 'Votre signalement a bien été pris en compte',
            icon: 'success',
            confirmButtonText: 'Ok'
        });
    }

    function broken_full(id_bin, id_consumer){

        var json =
        [
            {
                "id_bin": id_bin,
                "hash_consumer": id_consumer,
                "action" : "report",
                "type" : "broken"
            }
        ];

        var data = JSON.stringify(json);

        var req = new XMLHttpRequest();
        req.open('POST', 'http://localhost:8000/reports/create', true);
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

    function yes(id_bin, id_consumer){
        var json =
                [
                    {
                        "id_bin": id_bin,
                        "hash_consumer": id_consumer,
                        "action" : "confirm",
                        "type" : "null"
                    }
                ];

                var data = JSON.stringify(json);

                var req = new XMLHttpRequest();
                req.open('POST', 'http://localhost:8000/reports/create', true);
                req.setRequestHeader('Content-Type', 'application/json');
                req.setRequestHeader('Access-Control-Allow-Origin', '*');
                req.setRequestHeader('Access-Control-Allow-Methods', 'POST');
                req.setRequestHeader('Access-Control-Allow-Headers', 'Content-Type');
                req.send(data);

        Swal.fire({
            title: 'Problème pas encore résolu !',
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

    function no(id_bin, id_consumer){
    var json =
                    [
                        {
                            "id_bin": id_bin,
                            "hash_consumer": id_consumer,
                            "action" : "refute",
                            "type" : "null"
                        }
                    ];

                    var data = JSON.stringify(json);

                    var req = new XMLHttpRequest();
                    req.open('POST', 'http://localhost:8000/reports/create', true);
                    req.setRequestHeader('Content-Type', 'application/json');
                    req.setRequestHeader('Access-Control-Allow-Origin', '*');
                    req.setRequestHeader('Access-Control-Allow-Methods', 'POST');
                    req.setRequestHeader('Access-Control-Allow-Headers', 'Content-Type');
                    req.send(data);

        Swal.fire({
            title: 'Problème résolu !',
            text: 'Votre réponse a bien été pris en compte',
            icon: 'success',
            confirmButtonText: 'Ok'
        })
    }
</script>