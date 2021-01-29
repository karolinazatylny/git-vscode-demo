<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/style.css">
</head>
<body>

  <h1>K a r o l i n a   ★   Z a t y l n y</h1>
</div>

<div class="row">
  <div class="col-3 col-s-3 menu">
    <ul>
    <h6>
    <li><a class="link" href="https://github.com/SK-2019/php-sql-wprowadzenie-karolinazatylny"><b>GITHUB</b></a></li>
      <li><a class="link" href="/index.php"><b>STRONA GŁÓWNA</b></a></li>
      <li><a class="link" href="/pracownicy-organizacja/zadania.php"><b>ZADANIA</b></a></li>
      <li><a class="link" href="/pracownicy-organizacja/agregat.php"><b>FUNKCJE AGREGUJĄCE</b></a></li>
      <li><a class="link" href="/pracownicy-organizacja/orgpracownicy.php"><b>ORGANIZACJA I PRACOWNICY</b></a></li>
      <li><a class="link" href="/pracownicy-organizacja/pracownicy.php"><b>PRACOWNICY</b></a></li>
      <li><a class="link" href="/pracownicy-organizacja/dataiczas.php"><b>DATA I CZAS</b></a></li>
      <li><a class="link" href="/dane-do-bazy/formularz.html"><b>FORMULARZ</b></a></li>
      <li><a class="link" href="/dane-do-bazy/danedobazy.php"><b>DANE DO BAZY</b></a></li>
      <li><a class="link" href="/biblioteka/ksiazki.php"><b>KSIĄŻKI</b></a></li>
    </h6>
    </ul>
  </div>

  <div class="col-6 col-s-9">
    <h5>Insert</h5>
 <?php

echo("jestes w insert.php <br>");
echo ("<li>". $_POST['name']);
echo ("<li>". $_POST['dzial']);
echo ("<li>". $_POST['zarobki']);
echo ("<li>". $_POST['data_urodzenia']);

$servername = "mysql-karolinazatylny.alwaysdata.net";
$username = "217224";
$password = "karolcia9";
$dbname = "karolinazatylny_123";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO pracownicy (id_pracownicy,imie, dzial, zarobki, data_urodzenia) 
       VALUES (null,'".$_POST['name']."', ".$_POST['dzial'].", ".$_POST['zarobki'].",'".$_POST['data_urodzenia']."')";


echo "<li>". $sql;

if ($conn->query($sql) === TRUE) {
  echo ("New record created successfully");
} else {
//informacja o ewentualnych błędach
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("location: https://kmz-test.herokuapp.com/dane-do-bazy/danedobazy.php");

?>