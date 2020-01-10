<script>
    function trash_full(){
        Swal.fire({
            title: 'Poubelle pleine!',
            text: 'Votre signalement a bien été pris en compte',
            icon: 'success',
            confirmButtonText: 'Ok'
        })
    }

    function broken_full(){
        Swal.fire({
            title: 'Poubelle Défectueuse !',
            text: 'Votre signalement a bien été pris en compte',
            icon: 'success',
            confirmButtonText: 'Ok'
        })
    }

    function yes(){
        Swal.fire({
            title: 'Oui !',
            text: 'Votre réponse a bien été pris en compte',
            icon: 'success',
            confirmButtonText: 'Ok'
        })
    }

    function no(){
        Swal.fire({
            title: 'Non !',
            text: 'Votre réponse a bien été pris en compte',
            icon: 'success',
            confirmButtonText: 'Ok'
        })
    }
</script>