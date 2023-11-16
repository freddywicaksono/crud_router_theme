<?php
include("controllers/Perawat.php");

$obj = new PerawatController();

if(isset($_GET["id"])){
    $id=$_GET["id"];
}

$rows = $obj->getPerawat($id);
$theme='fobia';
getHeader($theme);
?>

<div class="header icon-and-heading">
<i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
<h2><strong>Perawat</strong> <small>Delete Data</small> </h2>
</div>
<hr/>
<form name="formDelete" method="POST" action="<?php echo base_url(); ?>perawat/remove">
    <input type="hidden" class="form-control" name="submitted" value="1"/>
    <dl class="row mt-1">
    <?php foreach ($rows as $row): ?>
    
        <dt class="col-sm-3">ID:</dt><dd class="col-sm-9"><?php echo $row['id']; ?></dd>
        <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>" readonly />
    
    <dt class="col-sm-3">nip:</dt><dd class="col-sm-9"><?php echo $row['nip']; ?></dd>
    <dt class="col-sm-3">nama:</dt><dd class="col-sm-9"><?php echo $row['nama']; ?></dd>
    <dt class="col-sm-3">bagian:</dt><dd class="col-sm-9"><?php echo $row['bagian']; ?></dd>
        
    </dl>
    <button class="btn btn-large btn-danger" type="submit">Delete</button>
    <a href="#index" class="btn btn-large btn-default">Cancel</a>
    <?php endforeach; ?>
</form>
                                       
<?php
getFooter($theme,'');
?>                     