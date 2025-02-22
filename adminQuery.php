<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Concerti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .box-container {
            width: 60%;
            min-width: 450px;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }


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
<body class="sfondo3">

<div class="bg-white w-50 mx-auto text-center border-danger border-3 rounded mt-5 p-3">
    <h1>Benvenuto Admin: <span class='text-danger'><?php echo htmlspecialchars($_SESSION["nomeUtente"] ?? "Ospite"); ?></span></h1>
</div>

<div class="container text-center">
    <div class="row">
        
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

                // Inserimento nuovo concerto
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "insert") {
                    $titolo = $_POST["Titolo"] ?? '';
                    $data = $_POST["Data"] ?? '';
                    $descrizione = $_POST["Descrizione"] ?? '';

                    if (!empty($titolo) && !empty($data) && !empty($descrizione)) {
                        $query = "INSERT INTO concerto (Titolo, Data, Descrizione) VALUES (?, ?, ?)";
                        $stmt = mysqli_prepare($connessione, $query);
                        mysqli_stmt_bind_param($stmt, "sss", $titolo, $data, $descrizione);
                        
                        if (mysqli_stmt_execute($stmt)) {
                            echo "<div class='alert alert-success text-center'>Concerto aggiunto con successo!</div>";
                        } else {
                            echo "<div class='alert alert-danger text-center'>Errore durante l'inserimento.</div>";
                        }
                        mysqli_stmt_close($stmt);
                    } else {
                        echo "<div class='alert alert-warning text-center'>Tutti i campi sono obbligatori!</div>";
                    }
                }
                ?>
                
                <form action="" method="POST">
                    <button class="btn btn-primary bg-success mt-4" name="giulio" value="show">Guarda i concerti disponibili</button>
                </form> 
            </div>
        </div>

        <!-- Sezione per inserire un nuovo concerto -->
        <div class="col d-flex justify-content-center align-items-center vh-100">          
            <div class="box-container">
                <h3 class="text-center mb-4">Inserisci un nuovo concerto</h3>

                <form method="POST">
                    <input type="hidden" name="action" value="insert">

                    <div class="mb-3">
                        <label for="Titolo" class="form-label">Titolo</label>
                        <input type="text" class="form-control" name="Titolo" placeholder="Inserisci il titolo" required>
                    </div>

                    <div class="mb-3">
                        <label for="Data" class="form-label">Data</label>
                        <input type="date" class="form-control" name="Data" required>
                    </div>

                    <div class="mb-3">
                        <label for="Descrizione" class="form-label">Descrizione</label>
                        <textarea class="form-control" name="Descrizione" rows="3" placeholder="Descrizione del concerto" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Salva Concerto</button>
                </form>
            </div>
        </div>

    </div>
</div>

<form action="/login/index.php" method="POST" class="w-50 mx-auto text-center">
    <button class="btn btn-primary mt-4 w-50 mx-auto bg-success" >Torna alla home</button>
</form> 


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>