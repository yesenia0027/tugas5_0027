<?php
require_once 'app/models/BarangModel.php';

class BarangController
{
    private $barangModel;

    public function __construct($dbConnection)
    {
        $this->barangModel = new BarangModel($dbConnection);
    }

    public function showbarang()
    {
        // Fetch user by ID (optional, you might want to implement this)
        // $user = $this->userModel->getUserById($id);
        // $barang = $this->userModel->findAllBarang();
        $barang = $this->barangModel->findAllBarang();
        require_once 'app/views/Barang.php';
    }


    
    
    // public function store()
    // {
    //     // Check if the request is a POST request
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $id = $_POST['id'];
    //         $nama = $_POST['nama'];
    //         $alamat = $_POST['alamat'];
            

            

    //         // Insert user into the database
    //         $stmt = $this->userModel->insertPelanggan($id, $nama, $alamat);
    //         if ($stmt) {
    //             header("Location: index.php?controllers=UserController&action=show");
    //         } else {
    //             // Handle error
    //             echo "Error saving data.";
    //         }
    //     }
    // }
    // public function update()
    // {
    //     // Check if the request is a POST request
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $id = $_POST['id'];
    //         $nama = $_POST['nama'];
    //         $alamat = $_POST['alamat'];
    //         // Insert user into the database
    //         $stmt = $this->userModel->updatePelanggan($id, $nama, $alamat);
    //         if ($stmt) {
    //             header("Location: index.php?controllers=UserController&action=show");
    //         } else {
    //             // Handle error
    //             echo "Error saving data.";
    //         }
    //         // dd($id,$name,$email);
    //     }
    // }

    // public function delete()
    // {
    //     // Check if the request is a POST request
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $id = $_POST['id'];
    //         $nama = $_POST['nama'];
    //         $alamat = $_POST['alamat'];
    //         // Insert user into the database
    //         $stmt = $this->userModel->deletePelanggan($id, $nama, $alamat);
    //         if ($stmt) {
    //             header("Location: index.php?controllers=UserController&action=show");
    //         } else {
    //             // Handle error
    //             echo "Error saving data.";
    //         }
    //         // dd($id,$name,$email);
    //     }
    // }

}

    

