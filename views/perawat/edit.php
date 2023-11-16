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
<h2><strong>Perawat</strong> <small>Edit Data</small> </h2>
</div>
<hr style="margin-bottom:-2px;"/>
<form name="formEdit" method="POST" action="<?php echo base_url(); ?>perawat/update">
    <input type="hidden" class="form-control" name="submitted" value="1"/>
    <?php foreach ($rows as $row): ?>
    <div class="form-group">
            <label>id:</label>
            <input type="text" class="form-control" name="id" 
                value="<?php echo $row['id']; ?>" readonly/>
        </div>
    <div class="form-group">
        <label>nip:</label>
        <input type="text" class="form-control" name="nip" 
            value="<?php echo $row['nip']; ?>" />
    </div>
    <div class="form-group">
        <label>nama:</label>
        <input type="text" class="form-control" name="nama" 
            value="<?php echo $row['nama']; ?>" />
    </div>
    <div class="form-group">
        <label>bagian:</label>
        <select id="bagian" name="bagian" style="width:150px" 
        class="form-control show-tick" required>

        <option value="<?php echo $row['bagian']; ?>">
        <?php echo $row['bagian']; ?></option>
            <option value="pendaftaran">pendaftaran</option>
            <option value="farmasi">farmasi</option>
            <option value="poli">poli</option>
            <option value="asisten dokter">asisten dokter</option>
            <option value="gizi">gizi</option>
            <option value="rawat inap">rawat inap</option>
        </select>
    </div>
    
    <?php endforeach; ?>
    <button class="save btn btn-large btn-info" type="submit">Save</button>
    <a href="#index" class="btn btn-large btn-default">Cancel</a>
</form>
                                        
                                       

<?php
getFooter($theme,'<script src="../lib/forms.js"></script>');
?>
