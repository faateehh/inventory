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
    
    $id = $_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM stok_keluar WHERE id = $id");
    $row = mysqli_fetch_array($query);
    $query2 = mysqli_query($conn, "SELECT laporan.id_stok_keluar, laporan.jumlah, laporan.keterangan, stok_keluar.id FROM laporan JOIN stok_keluar ON laporan.id_stok_keluar = stok_keluar.id WHERE laporan.id_stok_keluar = $id");
    ?>
      
    <!-- Content -->
    <div class="bg-light rounded col-8">
        
    <div class="card shadow mb-4">
      <div class="card-header">
        <div class="mb-3 col-3">
          <a href="stok-keluar.php" type="button" class="btn btn-outline-primary rounded-pill"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="row g-2">
          <div class="mb-3 col-md-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputGrid" value="A<?= $id; ?>" disabled>
                <label for="floatingInputGrid" class="form-label">ID Stok Keluar</label>
              </div>
          </div>

          <div class="mb-3 col-md-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputGrid" value="<?= $row['tanggal']; ?>" disabled>
                <label for="floatingInputGrid" class="form-label">Tanggal</label>
              </div>
          </div>
          
          <div class="mb-3 col-md-3 form-floating">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputGridGrid" value="<?= $row['nama']; ?>" disabled>
                <label for="floatingInputGridGrid">Nama Bahan Baku</label>
              </div>
          </div>
          
          <div class="mb-3 col-md-3 form-floating">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputGridGrid" value="<?= $row['jumlah']; ?> Kilogram" disabled>
                <label for="floatingInputGridGrid">Jumlah</label>
              </div>
          </div>
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered display" id="example" width="100%" cellspacing="0">
          <thead>
              <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Keterangan</th>
              </tr>
          </thead>
          <tbody>
            <?php 
            $i = 1;
            foreach($query2 as $row2) : 
            ?>
              <tr>
                  <td scope="row"><?= $i++; ?></td>
                  <td scope="row"><?= $row2['jumlah']; ?></td>
                  <td scope="row"><?= $row2['keterangan']; ?></td>
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