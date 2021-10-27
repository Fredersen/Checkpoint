<?php

require_once '../connec.php';
$pdo = new PDO(DSN, USER, PASS);

$query = "SELECT * FROM bribe ORDER BY name ASC";
$statement = $pdo->query($query);
$bribes = $statement->fetchAll();

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
};

$nameErr = $paymentErr = "";
$name = $payment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Il faut inscrire un nom";
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["payment"])) {
    $paymentErr = "Il faut inscrire un montant";
  } else if($_POST["payment"]<0){
    $paymentErr = "Le montant doit être supérieur à 0";
  } else{
     $payment = test_input($_POST["payment"]);
  }
  
}



$query = "INSERT INTO bribe ('name', 'payment') VALUES (':name', ':payment')";
$statement = $pdo->prepare($query);
$statement->bindValue(':name', $name , \PDO::PARAM_STR);
$statement->bindValue(':payment', $payment, \PDO::PARAM_INT);
$statement->execute();


?>

