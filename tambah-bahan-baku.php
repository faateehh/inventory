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
    <?php 
    include 'navbar-sidebar.php'; 
    
    if(ISSET($_POST['tambah'])) {
      if(tambah_bahan_baku($_POST) > 0 ) {
          echo "
          <script>
              alert('data berhasil ditambah!');
              window.open('bahan-baku.php','_self')
          </script>";
      }
        
    }
    ?>
      
    <!-- Content -->
    <div class="bg-light rounded col-8">
        
    <div class="card shadow mb-4">
      <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between">
              <h4 class="m-0 font-weight-bold">Stok Masuk / Tambah</h4>
          </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
        <form action="" method="post" class="py-3 px-3">

          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="text" class="form-control" id="satuan" name="satuan" required>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
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