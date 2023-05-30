<?php
require_once 'DAO.php';

$action = isset($_REQUEST["action"])? $_REQUEST["action"] : ""; //provera da li je setovana akcija

if(!isset($_SESSION)) session_start();

switch($_SERVER["REQUEST_METHOD"]){
    case "GET":
    switch($action){
        case "logout":
            if($_SESSION["korisnik"]!=""){
                session_unset();
                session_destroy();
                include 'index.php';
            }
            break;
    }
    break;

    case "POST":
        switch($action){
            case "Update":
                $id=isset($_POST["id"]) ? $_POST['id']:"";
                $ime=isset($_POST["ime"]) ? $_POST['ime']:"";
                $prezime=isset($_POST["prezime"]) ? $_POST['prezime']:"";
                $brIndexa=isset($_POST["brIndexa"]) ? $_POST['brIndexa']:"";

                if(!empty($id)&&!empty($ime)&&!empty($prezime)&&!empty($brIndexa)){
                   $dao=new DAO();
                   $postoji=$dao->getStudentById($id);
                   if($postoji==true){
                    $dao->update($ime, $prezime, $brIndexa, $id);
                    $_SESSION["korisnik"]=$id;
                    include 'prikaz.php';
                   } else{
                    $msg="Student sa datim brojem indeksa ne postoji";
                    include 'index.php';
                   }
                }else{
                    $msg="Morate popuniti sva polja";
                    include 'index.php';
                }
                break;
        }
        break;
}

?>