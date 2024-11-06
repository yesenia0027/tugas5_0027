<?php
class User
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }



    

    public function findAllPelanggan()
    {
        $stmt = $this->db->prepare("SELECT * FROM pelanggan");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengembalikan array dari semua pengguna
    }

   

    public function findAllTransaksi()
    {
        $stmt = $this->db->prepare("SELECT * FROM transkasi");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengembalikan array dari semua pengguna
    }

    public function insertPelanggan($id, $nama, $alamat)
    {
        $stmt = $this->db->prepare("INSERT INTO pelanggan (id, nama, alamat) VALUES (:id, :nama, :alamat)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':alamat', $alamat);
        // $stmt->bindParam(':foto', $foto);
        return $stmt->execute();
    }
    public function updatePelanggan($id, $nama, $alamat) {
        // Menyiapkan query SQL untuk update
        $stmt = $this->db->prepare("UPDATE pelanggan SET nama = :nama, alamat = :alamat WHERE id = :id");
    
        // Mengikat parameter
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':alamat', $alamat);
        
        // Eksekusi dan kembalikan hasil
        return $stmt->execute();
    }

    public function deletePelanggan($id, $nama, $alamat) {
        // Menyiapkan query SQL untuk update
        $stmt = $this->db->prepare("DELETE FROM pelanggan WHERE id = :id");
        
        // Mengikat parameter
        $stmt->bindParam(':id', $id);
        
        
        // Eksekusi dan kembalikan hasil
        return $stmt->execute();
    }
    

        // UPDATE `users` SET `name` = 'Wahyuidi5' WHERE `users`.`id` = '1234'
    }
    

