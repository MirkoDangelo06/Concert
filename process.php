<?php
session_start();
?>

<?php
// connessione a MySQL con mysqli_connect()
// definizione delle variabili
$host = "localhost";
$user = "root";
$pass = "";
$db = "stagioneconcertistica";
// connessione al DBMS
$connessione = mysqli_connect ($host, $user, $pass, $db)

or die("Connessione non riuscita" . mysqli_connect_error() );

//prelievo password e nome
$password = $_GET["passwd"];
$nomeUtente = $_GET["name"];

$_SESSION["nomeUtente"] = $nomeUtente;

$query = "SELECT * from utente where password = '$password' and Nome = '$nomeUtente'";

//risoluzione query
$result = mysqli_query ($connessione, $query) or
die ("Query fallita" . mysqli_error($connessione) . " " . mysqli_errno($connessione));

$jojo = mysqli_fetch_assoc ( $result );

if (mysqli_num_rows($result) > 0) {
    // Se ci sono righe nel risultato, significa che il login è andato a buon fine
    header("Location: ./adminQuery.php");
    exit();  // è importante usare exit() dopo header per fermare l'esecuzione del codice
} else {
    // Se non ci sono righe, il login è fallito
    header("Location: ./index.php?error=1");

}

?>




