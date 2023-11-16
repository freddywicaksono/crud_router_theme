<?php
include("controllers/Dokter.php");

$obj = new DokterController();
if(isset($_GET["id"])){
    $id=$_GET["id"];
}

$rows = $obj->getDokter($id);
$theme='fobia';
getHeader($theme);
?>

<div class="header icon-and-heading">
<i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
<h2><strong>Dokter</strong> <small>Edit Data</small> </h2>
</div>
<hr style="margin-bottom:-2px;"/>
<form name="formEdit" method="POST" action="<?php echo base_url(); ?>dokter/update">
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
        <label>jk:</label>
        <select id="jk" name="jk" style="width:150px" 
        class="form-control show-tick" required>

        <option value="<?php echo $row['jk']; ?>">
        <?php echo $row['jk']; ?></option>
            <option value="L">L</option>
            <option value="P">P</option>
        </select>
    </div>
    <div class="form-group">
        <label>spesialis:</label>
        <select id="spesialis" name="spesialis" style="width:150px" 
        class="form-control show-tick" required>

        <option value="<?php echo $row['spesialis']; ?>">
        <?php echo $row['spesialis']; ?></option>
            <option value="umum">umum</option>
            <option value="anak">anak</option>
            <option value="jantung">jantung</option>
            <option value="mata">mata</option>
            <option value="kulit">kulit</option>
            <option value="bedah">bedah</option>
        </select>
    </div>
    
    <?php endforeach; ?>
    <button class="save btn btn-large btn-info" type="submit">Save</button>
    <a href="#index" class="btn btn-large btn-default">Cancel</a>
</form>
                                        
<?php
$script='<script src="../../lib/forms.js"></script>';
getFooter($theme, $script);
?>