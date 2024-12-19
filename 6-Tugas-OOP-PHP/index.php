<?php
require_once("Animal.php");
require_once("Ape.php");
require_once("Frog.php");

$sheep = new Animal("shaun");

echo "Name : " . $sheep->name . "<br>"; 
echo "legs : " . $sheep->legs . "<br>"; 
echo "cool blooded : " . $sheep->cold_blooded . "<br><br>";

$kodok = new Frog("buduk");
echo "Name : " . $kodok->name . "<br>"; 
echo "legs : " . $kodok->legs . "<br>"; 
echo "cool blooded : " . $kodok->cold_blooded . "<br>";
$kodok->jump();
echo "<br>";

$sungokong = new Ape("kera sakti");
echo "Name : " . $sungokong->name . "<br>"; 
echo "legs : " . $sungokong->legs . "<br>"; 
echo "cool blooded : " . $sungokong->cold_blooded . "<br>";
$sungokong->yell();
echo "<br>";

?>