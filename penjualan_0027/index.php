<?php
require_once './config/database.php';
require_once 'app/controllers/UserController.php';
require_once 'app/controllers/BarangController.php';



// Koneksi ke database
$dbConnection = getDBConnection();

// Get the action and parameters from the URL
$action = isset($_GET['action']) ? $_GET['action'] : 'show';


$id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Create an instance of UserController
$userController = new UserController($dbConnection);
// $barangController = new BarangController($dbConnection);

// Handle the action
switch ($action) {
    // case 'showbarang':
    //     $barangController->showbarang();
    //     break;
    case 'store':
        $userController->store();
        break;
    case 'update':
        $userController->update();
        break;
    case 'delete':
        $userController->delete();
        break;
    case 'show':
    default:
        $userController->show($id);
        break;
}

?>