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
              <h4 class="m-0 font-weight-bold">Grafika Stok</h4>
          </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Stok Masuk</h6>
            </div>
            <div class="card-body">
              <canvas id="grafik-stok-masuk"></canvas>
            </div>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Stok Keluar</h6>
            </div>
            <div class="card-body">
              <canvas id="grafik-stok-keluar"></canvas>
            </div>
          </div>
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <?php
    $dataStokMasuk = mysqli_query($conn, "SELECT * FROM stok_masuk GROUP BY nama");
    foreach( $dataStokMasuk as $row ) :
      $nama[] = $row['nama'];
      
      $query = mysqli_query($conn,"SELECT SUM(jumlah) AS jumlah FROM stok_masuk WHERE nama='".$row['nama']."'");
      $row = mysqli_fetch_array($query);
      $jumlah[] = $row['jumlah'];
    endforeach;

    $dataStokKeluar = mysqli_query($conn, "SELECT * FROM stok_keluar GROUP BY nama");
    foreach ( $dataStokKeluar as $row2 ) :
      $nama2[] = $row2['nama'];
      
      $query2 = mysqli_query($conn,"SELECT SUM(jumlah) AS jumlah FROM stok_keluar WHERE nama='".$row2['nama']."'");
      $row2 = mysqli_fetch_array($query2);
      $jumlah2[] = $row2['jumlah'];
    endforeach;
    ?>

  <script>
		var ctx = document.getElementById("grafik-stok-masuk").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?= json_encode($nama); ?>,
				datasets: [{
					label: 'Stok Masuk',
					data: <?= json_encode($jumlah); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});

    var ctx2 = document.getElementById("grafik-stok-keluar").getContext('2d');
		var myChart2 = new Chart(ctx2, {
			type: 'bar',
			data: {
				labels: <?= json_encode($nama2); ?>,
				datasets: [{
					label: 'Stok Keluar',
					data: <?= json_encode($jumlah2); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

  

</body>
</html>