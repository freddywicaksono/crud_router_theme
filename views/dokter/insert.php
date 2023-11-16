<?php
include("../controllers/Dokter.php");
include("../lib/functions.php");
$obj = new DokterController();
$nip = $_POST["nip"];
$nama = $_POST["nama"];
$jk = $_POST["jk"];
$spesialis = $_POST["spesialis"];
// Insert the database record using your controller's method
$dat = $obj->addDokter($nip,$nama,$jk,$spesialis);
$msg = getJSON($dat);

$theme='fobia';
getHeader($theme);
if($msg==1){
    html_message_success("Insert Successful.");
    echo '<meta http-equiv="refresh" content="2;url='.base_url().'perawat/list">';
} else {
    html_message_error("Insert failed.");
    echo '<meta http-equiv="refresh" content="2;url='.base_url().'perawat/list">';
}

getFooter($theme,'');
?>