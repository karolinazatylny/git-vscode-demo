<?php
  require_once("../connect.php");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//definiujemy zapytanie $sql
$sql = "DELETE  FROM pracownicy WHERE id_pracownicy= '".$_POST['id']."';";

//wyświetlamy zapytanie $sql
echo $sql;


if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

header("location: https://kmz-test.herokuapp.com/dane-do-bazy/danedobazy.php");
?>