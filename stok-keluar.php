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
    <?php include 'navbar-sidebar.php'; ?>
      
    <!-- Content -->
    <div class="bg-light rounded col-8">
        
    <div class="card shadow mb-4">
      <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between">
              <h4 class="m-0 font-weight-bold">Data Stok Keluar</h4>
              <a href="tambah-stok-keluar.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                  Tambah
              </a>
          </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered display" id="example" width="100%" cellspacing="0">
          <thead>
              <tr>
                  <th scope="col">No.</th>
                  <th scope="col">ID Stok Keluar</th>
                  <th scope="col">Nama Bahan Baku</th>
                  <th scope="col">Satuan</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Aksi</th>
              </tr>
          </thead>
          <tbody>
              <?php 
              $dataStokKeluar = mysqli_query($conn, "SELECT * FROM stok_keluar");
              $i = 1;
              foreach( $dataStokKeluar as $row ) :
              ?>
              <tr>
                  <td scope="row"><?= $i++; ?></td>
                  <td scope="row"><?= $row["id"]; ?></td>
                  <td scope="row"><?= $row["nama"]; ?></td>
                  <td scope="row"><?= $row["satuan"]; ?></td>
                  <td scope="row"><?= $row["tanggal"]; ?></td>
                  <td scope="row"><?= $row["jumlah"]; ?></td>
                  <td scope="row">
                      <a type="button" href="detail-stok-keluar.php?id=<?= $row["id"]; ?>" class="btn btn-warning">Detail</a>
                      <a type="button" href="#ubah-stok-keluar.php?id=<?= $row["id"]; ?>" class="btn btn-primary" >Ubah</a>
                      <a type="button" href="hapus-stok-keluar.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');" class="btn btn-danger">Hapus</a>
                  </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
          </table>
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