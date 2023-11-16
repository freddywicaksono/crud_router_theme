
<?php
/*
Filename : DokterModel.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
include_once('db/database.php');

class DokterModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addDokter($nip,$nama,$jk,$spesialis)
    {
        $sql = "INSERT INTO dokter (nip, nama, jk, spesialis) VALUES (:nip,:nama,:jk,:spesialis)";
        $params = array(
          ":nip" => $nip,
          ":nama" => $nama,
          ":jk" => $jk,
          ":spesialis" => $spesialis);

        $result= $this->db->executeQuery($sql, $params);
        // Check if the insert was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Insert successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Insert failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }

    public function getDokter($id)
    {
        $sql = "SELECT * FROM dokter WHERE id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateDokter($id,$nip,$nama,$jk,$spesialis)
    {
        $sql = "UPDATE dokter SET nip = :nip, nama = :nama, jk = :jk, spesialis = :spesialis WHERE id = :id";
        $params = array(
          ":nip" => $nip,
          ":nama" => $nama,
          ":jk" => $jk,
          ":spesialis" => $spesialis,
          ":id" => $id
        );
    
        // Execute the query
        $result = $this->db->executeQuery($sql, $params);
    
        // Check if the update was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Update successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Update failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }
    

    public function deleteDokter($id)
    {
        $sql = "DELETE FROM dokter WHERE id = :id";
        $params = array(":id" => $id);

        $result = $this->db->executeQuery($sql, $params);
        // Check if the delete was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Delete successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Delete failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }

    public function getDokterList()
    {
        $sql = 'SELECT * FROM dokter';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDataCombo()
    {
        $sql = 'SELECT * FROM dokter';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

