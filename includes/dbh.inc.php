<?php

$serverName="localhost";
$dBUsername="root";
$dBPassword="";
$dBName="phpgameshop";

$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName);

if(!$conn){
    die("Konekcija nije uspjela: ". mysqli_connect_error());


}