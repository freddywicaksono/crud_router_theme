<?php
/*
Filename : lib/DokterCombo.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
$id = null; // Set a default value for $id

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

include("../controllers/Dokter.php");
$obj = new DokterController();
$obj->getDataCombo($id);
?>