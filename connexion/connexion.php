<?php
try
 {
    $connexion=new PDO ('mysql:dbname=africa_cinema;host=localhost','root','');
} catch (Exception $e) 

{
   echo $e->getMessage(); 
}