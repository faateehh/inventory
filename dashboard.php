<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/all.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


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
                <div class="col-10 d-sm-flex align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold">Beranda</h4>
                </div>
            </div>

            <div class="card card-body">
                <div class="table-responsive">

                    <h4 class="fw-10">Selamat Datang Kembali, <?= $_SESSION['nama_pengguna']; ?>!</h4>


                    <h6 >INFO AKUN DETAIL</h6>

                    <div class="card card-body" >
                        <p>Nama Lengkap<br> <?= $_SESSION['nama_lengkap']; ?></p>
                    </div>
                    <div class="card card-body" >
                        <p>Nama Pengguna<br> <?= $_SESSION['nama_pengguna']; ?></p>
                    </div>
                    <div class="card card-body" >
                        <p>Hak Akses<br> <?= $_SESSION['role']; ?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>