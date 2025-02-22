<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
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
<body class="bg-secondary sfondo2">
    <div id="splash-screen">
        <h1 id="splash-title">Stagione Concertistica Firenze 2025/2026</h1>
        <video autoplay muted playsinline id="splash-video">
            <source src="./video/concerto.mp4" type="video/mp4">
            Il tuo browser non supporta il tag video.
        </video>
    </div>


<div class="bg w-100 pt-4 mt-4 pb-4 sfondo1">
    <h3 class="text-center bg-white mb-3 t1 "> La musica che vuoi, nella tua città</h3>
    <!--Carousel-->
    <div id="carouselExample" class="carousel slide w-50 mx-auto mb-5 mt-5 border rounded-pill ">
    <div class="carousel-inner rounded-pill ">

        <div class="carousel-item active">
        <img src="./photos/c1.jpg" class="d-block w-100" alt="...">
        </div>

        <div class="carousel-item">
        <img src="./photos/c2.jpg" class="d-block w-100" alt="...">
        </div>

        <div class="carousel-item">
        <img src="./photos/c3.jpg" class="d-block w-100" alt="...">
        </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
   
</div>


<h1 class="text-center bg-white mb-3 t1 sfondo3"> Prima di iniziare verificare come vuoi loggare </h1>
   
    
   <div class="w-75 mx-auto border border-primary rounded-pill text-center bg-white mt-5 sfondo3">  
       <form action="./admin.php" method= "POST">
       <button class="btn btn-primary mb-5 mt-5 bg-success">Entra in admin version</button>
       </form>
   </div>
   
   
       
   <div class="w-75 mx-auto border border-primary rounded-pill  text-center  bg-white mt-5 sfondo3">  
       <form action="./utente.php" method= "POST">
       <button class="btn btn-primary mb-5 mt-5 bg-success">Entra in User Version</button>
   </form>
   </div>
   
   
   <div class="w-75 mx-auto border border-primary text-center bg-white mt-5">  
       <?php
       // errore
       if (isset($_GET['error']) && $_GET['error'] == 1) {
           echo "<p class='text-center' style='color:red;'>Login fallito. Riprova.</p>";
       }
       ?>
   </div>

<!--SLideshow-->
<script>
    setTimeout(() => {
        document.getElementById('splash-screen').classList.add('fade-out');
    }, 2000); // Scompare dopo 3 secondi
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>