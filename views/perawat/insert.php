<?php
include("controllers/Perawat.php");

$obj = new PerawatController();
$msg=null;

// Form was submitted, process the update here
$nip = $_POST["nip"];
$nama = $_POST["nama"];
$bagian = $_POST["bagian"];
// Insert the database record using your controller's method
$dat = $obj->addPerawat($nip,$nama,$bagian);
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