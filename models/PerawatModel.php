
<?php
/*
Filename : PerawatModel.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
include_once('db/database.php');

class PerawatModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addPerawat($nip,$nama,$bagian)
    {
        $sql = "INSERT INTO perawat (nip, nama, bagian) VALUES (:nip,:nama,:bagian)";
        $params = array(
          ":nip" => $nip,
          ":nama" => $nama,
          ":bagian" => $bagian);

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

    public function getPerawat($id)
    {
        $sql = "SELECT * FROM perawat WHERE id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updatePerawat($id,$nip,$nama,$bagian)
    {
        $sql = "UPDATE perawat SET nip = :nip, nama = :nama, bagian = :bagian WHERE id = :id";
        $params = array(
          ":nip" => $nip,
          ":nama" => $nama,
          ":bagian" => $bagian,
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
    

    public function deletePerawat($id)
    {
        $sql = "DELETE FROM perawat WHERE id = :id";
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

    public function getPerawatList()
    {
        $sql = 'SELECT * FROM perawat';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDataCombo()
    {
        $sql = 'SELECT * FROM perawat';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

