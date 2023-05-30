<?php
require_once 'DAO.php';
if(!isset($_SESSION)) session_start();

if($_SESSION["korisnik"]!=""){
    $dao = new DAO();
    $student=$dao->getStudent($_SESSION['korisnik']);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        id:<?=$student["id"]?><br>
        ime:<?=$student["ime"]?><br>
        prezime:<?=$student["prezime"]?><br>
        Broj indeksa: <?=$student["brIndexa"]?><br>
        <a href="Kontroler.php?action=logout">LOGOUT</a>
    </body>
    </html>
    <?php
}else{
    header("Location:index.php");
}
?>