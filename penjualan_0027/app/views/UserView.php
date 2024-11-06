<?php
require_once 'config/database.php';
require_once 'app/controllers/UserController.php';
require_once 'app/views/userView.php';
$nomor = 1;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pertemuan 4</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="app/views/Barang.php">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Transaksi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <h2 style="text-indent: 20px;">Home</h2>
        <hr>
        <div class="container mt-5">
            <button type="button" class="btn btn-primary" id="toggleFormBtn">Tambah Data</button>

            <div id="inputForm" class="mt-3" style="display: none;">
                <h3>Input Data</h3>
                <form method="POST" action="index.php?controllers=UserController&action=store" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="id" class="form-label">Id</label>
                        <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>

                    <button type="submit" class="btn btn-success">Simpan Data</button>
                    <button type="button" class="btn btn-secondary" id="closeFormBtn">Tutup</button>
                </form>
            </div>
        </div>

        <hr>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pelanggan as $user): ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['nama']; ?></td>
                        <td><?php echo $user['alamat']; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning editBtn"
                                data-id="<?php echo $user['id']; ?>"
                                data-nama="<?php echo $user['nama']; ?>"
                                data-alamat="<?php echo $user['alamat']; ?>"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal">
                                Edit
                            </button>
                            <button type="button" class="btn btn-warning hapusBtn"
                                data-id="<?php echo $user['id']; ?>"
                                data-nama="<?php echo $user['nama']; ?>"
                                data-alamat="<?php echo $user['alamat']; ?>"
                                data-bs-toggle="modal"
                                data-bs-target="#hapusModal">
                                Hapus
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal untuk Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit User Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" action="index.php?controllers=UserController&action=update">

                        <input type="hidden" class="form-control" id="editId" name="id" required>

                        <div class="mb-3">
                            <label for="editNama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="editNama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="editAlamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="editAlamat" name="alamat" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal untuk Hapus -->
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Hapus Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="hapusForm" method="POST" action="index.php?controllers=UserController&action=delete">
                        <td>Yakin Hapus Data Ini?</td>
                        <input type="hidden" class="form-control" id="hapusId" name="id" readonly>
                        <td><br></td>
                        <td>Nama</td>
                        <input type="text" class="form-control" id="hapusNama" name="nama" readonly>
                        <td>Alamat</td>
                        <input type="text" class="form-control" id="hapusAlamat" name="alamat" readonly>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Hapus Data</button>
                        </div>
                    </form>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#toggleFormBtn').click(function() {
                        $('#inputForm').toggle(); // Tampilkan atau sembunyikan form
                    });

                    $('#closeFormBtn').click(function() {
                        $('#inputForm').hide(); // Sembunyikan form
                    });

                    // Event ketika modal edit dibuka
                    $('#editModal').on('show.bs.modal', function(event) {
                        const button = $(event.relatedTarget); // Tombol yang memicu modal
                        const id = button.data('id');
                        const nama = button.data('nama');
                        const alamat = button.data('alamat');

                        const modal = $(this);
                        modal.find('#editId').val(id);
                        modal.find('#editNama').val(nama);
                        modal.find('#editAlamat').val(alamat);
                    });
                    // Hapus
                    $('#hapusModal').on('show.bs.modal', function(event) {
                        const button = $(event.relatedTarget); // Tombol yang memicu modal
                        const id = button.data('id');
                        const nama = button.data('nama');
                        const alamat = button.data('alamat');

                        const modal = $(this);
                        modal.find('#hapusId').val(id);
                        modal.find('#hapusNama').val(nama);
                        modal.find('#hapusAlamat').val(alamat);
                    });
                });
            </script>



</body>

</html>