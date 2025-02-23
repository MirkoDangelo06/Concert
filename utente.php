<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <Style>
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
    </style>
</head>
<body class="text-center sfondo2">
    <h1 class ="sfondo3"> Versione User </h1>

  <!-- Sezione per visualizzare i concerti -->
  <div class="col d-flex justify-content-center align-items-center vh-100">
            <div class="box-container">
                <?php
                // Connessione a MySQL
                $host = "localhost";
                $user = "root";
                $pass = "";
                $db = "stagioneconcertistica";

                $connessione = mysqli_connect($host, $user, $pass, $db) 
                    or die("Connessione non riuscita: " . mysqli_connect_error());

                // Funzione per ottenere i concerti
                function showConcerti($connessione) {
                    $query = "SELECT * FROM concerto";
                    $result = mysqli_query($connessione, $query);
                    return mysqli_fetch_all($result, MYSQLI_ASSOC);
                }

                // Mostra i concerti se richiesto
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["giulio"]) && $_POST["giulio"] == "show") {
                    $arConcerti = showConcerti($connessione);
                    
                    // Verifica se ci sono concerti
                    if (!empty($arConcerti)) {
                        echo "<h4>Concerti disponibili:</h4>";
                        $i = 1;
                        foreach ($arConcerti as $c) {
                            echo "<p>$i - <strong>" . htmlspecialchars($c['Titolo']) . "</strong> - " . 
                                htmlspecialchars($c['Descrizione']) . " - " . 
                                htmlspecialchars($c['Data']) . "</p>"; 
                            $i++;
                        }
                    } else {
                        echo "<p class='text-danger'>Nessun concerto trovato</p>";
                    }
                }
                ?>


                <form action="" method="POST">
                    <button class="btn btn-primary bg-success mt-4" name="giulio" value="show">Guarda i concerti disponibili</button>
                </form> 

                
                <form action="/login/index.php" method="POST" class="w-50 mx-auto text-center">
                    <button class="btn btn-primary mt-4 bg-success" >home</button>
                </form> 
            </div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>