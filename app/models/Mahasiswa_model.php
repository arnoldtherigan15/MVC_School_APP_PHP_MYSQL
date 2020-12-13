<?php 

class Mahasiswa_model {
    private $table = 'mahasiswa',
            $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa() {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getOneMahasiswa($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id =:id");
        $this->db->bind('id',$id);
        // var_dump($this->db->single());
        return $this->db->single();
    }

    public function addMahasiswa($data) {
        $query = "INSERT INTO $this->table (name,nrp,email,jurusan)
                    VALUES (:name,:nrp,:email,:jurusan)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteMahasiswa($id) {
        $query = "DELETE FROM $this->table WHERE id =:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function edit($data) {
        $query = "UPDATE mahasiswa SET 
                    name = :name,
                    nrp = :nrp,
                    email = :email,
                    jurusan = :jurusan
                    WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchMahasiswa() {
        $keywoard = $_POST["keywoard"];
        $query = "SELECT * FROM mahasiswa WHERE name LIKE :keywoard";
        // echo $query;
        $this->db->query($query);
        $this->db->bind('keywoard', "%$keywoard%");
        return $this->db->resultSet(); 
    }
}