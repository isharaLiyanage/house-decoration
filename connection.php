<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$dbname='pt-1';

$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);


if(!$connection){
    die("could not connect to the database ".mysqli_connect_error());
}

?>