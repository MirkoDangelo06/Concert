<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    #splash-screen {
        position: fixed;
        width: 100%;
        height: 100vh;
        background: black;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }

    #splash-video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #splash-title {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 3rem;
        color: white;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
        text-align: center;
        font-family: 'Playfair Display', serif; /* Usa Playfair Display */

    }
    .t1{
        font-family: 'Playfair Display', serif; /* Usa Playfair Display */
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
    }
    .sfondo1{
        width: 100%; /* Larghezza del div */
        height: 700px; /* Altezza del div */
        background-image: url('./photos/glass2.jpg'); /* Percorso dell'immagine */
        background-size: cover; /* Rende l'immagine di sfondo coprente */
        background-position: center; /* Centra l'immagine di sfondo */
    }

    .sfondo4{
        width: 100%; /* Larghezza del div */
        background-image: url('./photos/g2.jpg'); /* Percorso dell'immagine */
        background-size: cover; /* Rende l'immagine di sfondo coprente */
        background-position: center; /* Centra l'immagine di sfondo */
    }

    .sfondo2{
        width: 100%; /* Larghezza del div */
        background-image: url('./photos/glass1.jpg'); /* Percorso dell'immagine */
        background-size: cover; /* Rende l'immagine di sfondo coprente */
        background-position: center; /* Centra l'immagine di sfondo */
    }

    .sfondo3{
        width: 100%; /* Larghezza del div */
        background-image: url('./photos/g2.jpg'); /* Percorso dell'immagine */
        background-size: cover; /* Rende l'immagine di sfondo coprente */
        background-position: center; /* Centra l'immagine di sfondo */
    }

    /* Animazione di dissolvenza */
    .fade-out {
        animation: fadeOut 1s forwards;
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
            visibility: hidden;
        }
    }
</style>
</head>
<body class="sfondo2">
    <h1 class="text-center border rounded-pill sfondo3 "> Sei nella version admin </h1>

<form action="process.php" method="GET" class="w-50 mx-auto mt-5 text-center">

  <div class="mb-3">
    <label for="name" class="form-label">Nome utente</label>
    <input type="text" class="form-control sfondo4" id="name" name="name" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="passwd" class="form-label">Password</label>
    <input type="password" class="form-control sfondo4" id="passwd" name="passwd">
  </div>
  

  <button type="submit" class="btn btn-primary bg-success">Submit</button>
</form>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>