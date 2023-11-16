
<?php
/*
Filename : Perawat.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
include_once('models/PerawatModel.php');

class PerawatController
{
    private $model;

    public function __construct()
    {
        $this->model = new PerawatModel();
    }

    public function addPerawat($nip,$nama,$bagian)
    {
        return $this->model->addPerawat($nip,$nama,$bagian);
    }

    public function getPerawat($id)
    {
        return $this->model->getPerawat($id);
    }

    public function Show($id)
    {
        $rows = $this->model->getPerawat($id);
        foreach($rows as $row){
            $val = $row['nama'];
        }
        return $val;
    }

    public function updatePerawat($id,$nip,$nama,$bagian)
    {
        return $this->model->updatePerawat($id,$nip,$nama,$bagian);
    }

    public function deletePerawat($id)
    {
        return $this->model->deletePerawat($id);
    }

    public function getPerawatList()
    {
        return $this->model->getPerawatList();
    }
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
}

