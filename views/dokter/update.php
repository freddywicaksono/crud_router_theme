<?php
include("../controllers/Dokter.php");
include("../lib/functions.php");
$obj = new DokterController();

$id = $_POST["id"];
$nip = $_POST["nip"];
$nama = $_POST["nama"];
$jk = $_POST["jk"];
$spesialis = $_POST["spesialis"];
// Update the database record using your controller's method
$dat = $obj->updateDokter($id,$nip,$nama,$jk,$spesialis);
$msg = getJSON($dat);

$theme='fobia';
getHeader($theme);
if($msg==1){
    html_message_success("Update Successful.");
    echo '<meta http-equiv="refresh" content="2;url='.base_url().'perawat/list">';
} else {
    html_message_error("Update failed.");
    echo '<meta http-equiv="refresh" content="2;url='.base_url().'perawat/list">';
}

getFooter($theme,'');
?>