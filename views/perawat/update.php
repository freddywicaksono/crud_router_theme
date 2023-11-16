<?php
include("controllers/Perawat.php");
$obj = new PerawatController();

$id = $_POST["id"];
$nip = $_POST["nip"];
$nama = $_POST["nama"];
$bagian = $_POST["bagian"];

// Update the database record using your controller's method
$dat = $obj->updatePerawat($id,$nip,$nama,$bagian);
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