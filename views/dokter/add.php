<?php
$theme='fobia';
getHeader($theme);
?>
<div class="header icon-and-heading fs-1">
<i class="zmdi zmdi-view-dashboard zmdi-hc-4x"></i>
    <h2><strong>Dokter</strong> <small>Add New Data</small> </h2>
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
    <label>jk:</label>
        <select id="jk" name="jk" style="width:150px" 
class="form-control">

            <option value="">--pilih--</option>
            <option value="L">L</option>
            <option value="P">P</option>
        </select>
    </div>
    <div class="form-group">
    <label>spesialis:</label>
        <select id="spesialis" name="spesialis" style="width:150px" 
class="form-control">

            <option value="">--pilih--</option>
            <option value="umum">umum</option>
            <option value="anak">anak</option>
            <option value="jantung">jantung</option>
            <option value="mata">mata</option>
            <option value="kulit">kulit</option>
            <option value="bedah">bedah</option>
        </select>
    </div>
    <button class="save btn btn-large btn-info" type="submit">Save</button>
    <a href="#index" class="btn btn-large btn-default">Cancel</a>
</form>

                                

<?php
$script='<script src="../lib/forms.js"></script>';
getFooter($theme,$script);
?>
