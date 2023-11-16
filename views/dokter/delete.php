<?php
include("controllers/Dokter.php");

$obj = new DokterController();

if(isset($_GET["id"])){
    $id=$_GET["id"];
}

$msg=null;
if (isset($_POST['submitted'])==1 && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form was submitted, process the update here
    $id = $_POST['id'];
    
    // delete the database record using your controller's method
    $dat = $obj->deleteDokter($id);
    $msg = getJSON($dat);
    
}
$rows = $obj->getDokter($id);
$theme = 'fobia';
getHeader($theme);
?>

<?php 
if($msg===true){ 
    echo '<div class="alert alert-success" style="display: block" id="message_success">Delete Data Berhasil</div>';
    echo '<meta http-equiv="refresh" content="3;url='.base_url().'dokter/">';
} elseif($msg===false) {
    echo '<div class="alert alert-danger" style="display: block" id="message_error">Delete Gagal</div>'; 
} else {

}

?>
<div class="header icon-and-heading">
<i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
<h2><strong>Dokter</strong> <small>Delete Data</small> </h2>
</div>
<hr/>
<form name="formDelete" method="POST" action="">
    <input type="hidden" class="form-control" name="submitted" value="1"/>
    <dl class="row mt-1">
    <?php foreach ($rows as $row): ?>
    
        <dt class="col-sm-3">ID:</dt><dd class="col-sm-9"><?php echo $row['id']; ?></dd>
        <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>" readonly />
    
    <dt class="col-sm-3">nip:</dt><dd class="col-sm-9"><?php echo $row['nip']; ?></dd>
    <dt class="col-sm-3">nama:</dt><dd class="col-sm-9"><?php echo $row['nama']; ?></dd>
    <dt class="col-sm-3">jk:</dt><dd class="col-sm-9"><?php echo $row['jk']; ?></dd>
    <dt class="col-sm-3">spesialis:</dt><dd class="col-sm-9"><?php echo $row['spesialis']; ?></dd>
        
    </dl>
    <button class="btn btn-large btn-danger" type="submit">Delete</button>
    <a href="#index" class="btn btn-large btn-default">Cancel</a>
    <?php endforeach; ?>
</form>
<?php
getFooter($theme,'');
?>