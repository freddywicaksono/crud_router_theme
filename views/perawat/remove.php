<?php
include("controllers/Perawat.php");

//include("lib/functions.php");
$obj = new PerawatController();
$id = $_POST['id'];
    
// delete the database record using your controller's method
$dat = $obj->deletePerawat($id);
$msg = getJSON($dat);

$theme='fobia';
getHeader($theme);
if($msg==1){
    html_message_success("Delete Successful.");
    echo '<meta http-equiv="refresh" content="2;url='.base_url().'perawat/list">';
} else {
    html_message_error("Delete failed.");
    echo '<meta http-equiv="refresh" content="2;url='.base_url().'perawat/list">';
}

getFooter($theme,'');
?>