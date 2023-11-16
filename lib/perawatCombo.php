<?php
/*
Filename : lib/PerawatCombo.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
$id = null; // Set a default value for $id

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

include("../controllers/Perawat.php");
$obj = new PerawatController();
$obj->getDataCombo($id);
?>