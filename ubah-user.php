<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="vendor/twbs/bootstrap/dist/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

    <title>Document</title>
</head>
<body>

    <!-- Navbar -->
    <!-- Sidebar -->
    <?php include 'navbar-sidebar.php'; 
    
    $id = $_GET['id'];

    $dataUsers = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
    $row = mysqli_fetch_array($dataUsers);

    if(ISSET($_POST['ubah'])) {
      if(ubah_bahan_baku($_POST) > 0 ) {
          echo "
          <script>
              alert('data berhasil diubah!');
              window.open('kelola-users.php','_self')
          </script>";
      }
        
    }
    ?>
      
    <!-- Content -->
    <div class="bg-light rounded col-8">
        
    <div class="card shadow mb-4">
      <div class="card-header">
        <div class="col-3">
          <a href="users.php" type="button" class="btn btn-outline-primary rounded-pill"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
        
        <form action="" method="post" class="py-3 px-3">
          <div class="mb-3">
            <label for="nama-lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama-lengkap" name="nama_lengkap" value="<?= $row['nama_lengkap']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="nama-pengguna" class="form-label">Nama Pengguna</label>
            <input type="text" class="form-control" id="nama-pengguna" name="nama_pengguna" value="<?= $row['nama_pengguna']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $row['email']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password" value="" required>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input type="text" class="form-control" id="role" name="role" value="<?= $row['role']; ?>">
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-success" name="tambah">Tambah</button>
          </div>

        </form>

        </div>
      </div>

    </div>

    </div>
    </div>

    <!-- <script src="vendor/twbs/bootstrap/dist/js/jquery/jquery.min.js"></script> -->
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/js/datatables.js"></script>

</body>
</html>