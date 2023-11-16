<?php
include("controllers/Perawat.php");

$obj = new PerawatController();

$rows = $obj->getPerawatList();
$theme='fobia';
getHeader($theme);
?>

<div class="header icon-and-heading">
<i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
<h2><strong>Perawat</strong> <small>List All Data</small> </h2>
</div>
<hr style="margin-bottom:-2px;"/>
<a style="margin:10px 0px;" class="btn btn-large btn-info" href="add"><i class="fa fa-plus"></i> Create New Data</a>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>nip</th>
            <th>nama</th>
            <th>bagian</th>
            <th width="140">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($rows as $row){ ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nip']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['bagian']; ?></td>
            <td class="text-center" width="200">
            <a class="btn btn-info btn-sm" href="edit/<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a>
            <a class="btn btn-danger btn-sm" href="delete/<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php
getFooter($theme,'');
?>                        