<?php

class Mahasiswa_model
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db   = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bindValue('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query  = "INSERT INTO mahasiswa VALUES(
            '', :nama, :nrp, :email, :jurusan
        )";
        $this->db->query($query);
        $this->db->bindValue('nama', $data['nama']);
        $this->db->bindValue('nrp', $data['nrp']);
        $this->db->bindValue('email', $data['email']);
        $this->db->bindValue('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query  = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bindValue('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        $query  = "UPDATE mahasiswa SET
                    nama = :nama,
                    nrp = :nrp,
                    email = :email,
                    jurusan = :jurusan WHERE id = :id";

        $this->db->query($query);
        $this->db->bindValue('nama', $data['nama']);
        $this->db->bindValue('nrp', $data['nrp']);
        $this->db->bindValue('email', $data['email']);
        $this->db->bindValue('jurusan', $data['jurusan']);
        $this->db->bindValue('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataMahasiswa()
    {
        $keyword    = $_POST["keyword"];
        $query      = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bindValue('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
