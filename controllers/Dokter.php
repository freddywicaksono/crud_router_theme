
<?php
/*
Filename : Dokter.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
include_once('models/DokterModel.php');

class DokterController
{
    private $model;

    public function __construct()
    {
        $this->model = new DokterModel();
    }

    public function addDokter($nip,$nama,$jk,$spesialis)
    {
        return $this->model->addDokter($nip,$nama,$jk,$spesialis);
    }

    public function getDokter($id)
    {
        return $this->model->getDokter($id);
    }

    public function Show($id)
    {
        $rows = $this->model->getDokter($id);
        foreach($rows as $row){
            $val = $row['nama'];
        }
        return $val;
    }

    public function updateDokter($id,$nip,$nama,$jk,$spesialis)
    {
        return $this->model->updateDokter($id,$nip,$nama,$jk,$spesialis);
    }

    public function deleteDokter($id)
    {
        return $this->model->deleteDokter($id);
    }

    public function getDokterList()
    {
        return $this->model->getDokterList();
    }
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
}

