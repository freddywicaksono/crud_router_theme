<?php
$theme='fobia';
getHeader($theme);
?>

<div class="header icon-and-heading fs-1">
<i class="zmdi zmdi-view-dashboard zmdi-hc-4x"></i>
    <h2><strong>Perawat</strong> <small>Add New Data</small> </h2>
</div>
<hr/>
<form name="formAdd" method="POST" action="insert">
    <div class="form-group">
            <label>nip:</label>
            <input type="text" class="form-control" name="nip"  />
        </div>
    <div class="form-group">
            <label>nama:</label>
            <input type="text" class="form-control" name="nama"  />
        </div>
    <div class="form-group">
    <label>bagian:</label>
        <select id="bagian" name="bagian" style="width:150px" 
class="form-control">

            <option value="">--pilih--</option>
            <option value="pendaftaran">pendaftaran</option>
            <option value="farmasi">farmasi</option>
            <option value="poli">poli</option>
            <option value="asisten dokter">asisten dokter</option>
            <option value="gizi">gizi</option>
            <option value="rawat inap">rawat inap</option>
        </select>
    </div>
    <button class="save btn btn-large btn-info" type="submit">Save</button>
    <a href="#index" class="btn btn-large btn-default">Cancel</a>
</form>
<?php
getFooter($theme,'<script src="../lib/forms.js"></script>');
?>