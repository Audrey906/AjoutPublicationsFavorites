<?php
    // Nous allons conserver en session les articles favoris de l'utilisateur
    session_start();
    //print_r($_SESSION);

    if(!isset($_SESSION['favorite'])){
        $_SESSION['favorite']= [];
    }

    //print_r($_SESSION['favorite']);
    //nous créons la fonction pour vérifier si les articles sont en favoris ou non
    function checkFavorite($id)
    {
        return in_array($id, $_SESSION['favorite']);
        
    }


    // CECI EST UN NOUVEAU COMMENTAIRE
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

<title>Ajax | Utilisation de la session</title>

<style>
.marker{
    display: none;
}

.favorite .marker{
    display : block;
    float: right;
   
}

.marker:hover{
    background-color : tomato;
}
</style>


</head>
<body class="p-5">

    <main class="container">
        <a  class="btn btn-warning" id="btn-deconnect"> <i class="fas fa-power-off"></i> </a>
        <div class="row" id="blog">
            <div class="col-sm-6">
                <div class="card <?php if(checkFavorite(1)){print 'favorite';} ?>"  id="post-1">
                    <div class="card-body">
                        <span class="btn btn-info marker"><i class="fas fa-heart"></i></span>
                        <h5 class="card-title">Post #1</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <a class="btn btn-outline-success btn-favorite">Ajout aux favoris</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card <?php if(checkFavorite(2)){print 'favorite';} ?> " id="post-2">
                    <div class="card-body">
                        <span class="btn btn-info marker"><i class="fas fa-heart"></i></span>
                        <h5 class="card-title">Post #2</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <a class="btn btn-outline-success btn-favorite">Ajout aux favoris</a>
                </div>
            </div>
        </div>
    </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="assets/js/ajax.js"></script>
</body>
</html>