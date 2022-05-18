<?php 

$conn = mysqli_connect("localhost", "root", "", "inventory");

session_start();

// menambah data bahan baku
function tambah_bahan_baku($data) {
  global $conn;

  $nama = htmlspecialchars($data['nama']);
  $satuan = htmlspecialchars($data['satuan']);
  $harga = htmlspecialchars($data['harga']);

  $query = "INSERT INTO bahan_baku ( nama, satuan, harga ) VALUES ( '$nama', '$satuan', '$harga' )";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// mengubah data bahan baku
function ubah_bahan_baku($data) {
  global $conn;

  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $satuan = htmlspecialchars($data['satuan']);
  $harga = htmlspecialchars($data['harga']);

  $query = "UPDATE bahan_baku SET nama = '$nama', satuan = '$satuan', harga = $harga WHERE id = $id";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// menghapus data bahan baku
function hapus_bahan_baku($id) {
  global $conn;
  $query = "DELETE FROM bahan_baku WHERE id=$id";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


// menambah data user
function tambah_user($data) {
  global $conn;

  $namaLengkap = htmlspecialchars($data['nama_lengkap']);
  $namaPengguna = htmlspecialchars($data['nama_pengguna']);
  $email = htmlspecialchars($data['email']);
  $password = htmlspecialchars($data['password']);
  $role = htmlspecialchars($data['role']);

  $query = "INSERT INTO users ( nama_lengkap, nama_pengguna, email, password, role ) VALUES ( '$namaLengkap', '$namaPengguna', '$email', '$password', '$role' )";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// mengubah data user
function ubah_user($data) {
  global $conn;

  $id = $data['id'];
  $namaLengkap = htmlspecialchars($data['nama_lengkap']);
  $namaPengguna = htmlspecialchars($data['nama_pengguna']);
  $email = htmlspecialchars($data['email']);
  $password = htmlspecialchars($data['password']);
  $role = htmlspecialchars($data['role']);

  $query = "UPDATE users SET nama_lengkap = '$namaLengkap', nama_pengguna = '$namaPengguna', email = $email, password = '$password', role = '$role' WHERE id = $id";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// menghapus data user
function hapus_user($id) {
  global $conn;
  $query = "DELETE FROM users WHERE id=$id";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// menambah data stok masuk
function tambah_stok_masuk($data) {
  global $conn;

  $nama = htmlspecialchars($data['nama']);
  $satuan = htmlspecialchars($data['satuan']);
  $tanggal = htmlspecialchars($data['tanggal']);
  $jumlah = htmlspecialchars($data['jumlah']);

  $query = mysqli_query($conn, "SELECT * FROM bahan_baku WHERE nama='$nama' ");
  $row = mysqli_fetch_array($query);
  $stok = $row['stok'];
  $tambahStok = $stok+$jumlah;
  
  $query2 = "INSERT INTO stok_masuk ( nama, satuan, tanggal, jumlah, sisa_stok ) VALUES ( '$nama', '$satuan', '$tanggal', '$jumlah', $tambahStok)";
  mysqli_query($conn, $query2);

  $query3 = "UPDATE bahan_baku SET stok = $tambahStok WHERE nama = '$nama' ";
  mysqli_query($conn, $query3);

  return mysqli_affected_rows($conn);
}

// mengubah data stok masuk
function ubah_stok_masuk($data) {
  global $conn;

  $id = $data['id'];
  $jumlah = htmlspecialchars($data['jumlah']);

  $query2 = mysqli_query($conn, "SELECT bahan_baku.stok, bahan_baku.nama, stok_masuk.nama, stok_masuk.id = $id, stok_masuk.jumlah FROM bahan_baku INNER JOIN stok_masuk ON bahan_baku.nama = stok_masuk.nama WHERE stok_masuk.id = $id ");
  $row2 = mysqli_fetch_array($query2);
  
  $jumlah2 = $row2['jumlah'];
  $nama = $row2['nama'];
  $stok = $row2['stok'];
  
  if ( $jumlah > $jumlah2 ) {
    $selisih = $jumlah - $jumlah2;
    $tambahStok = $stok + $selisih;
    
    $query4 = mysqli_query($conn, "UPDATE bahan_baku SET stok = $tambahStok WHERE nama = '$nama' ");
  } elseif ( $jumlah < $jumlah2 ) {
    $selisih = $jumlah2 - $jumlah;
    $kurangStok = $stok - $selisih;
    
    $query5 = mysqli_query($conn, "UPDATE bahan_baku SET stok = $kurangStok WHERE nama = '$nama' ");
  }

  $query = mysqli_query($conn, "UPDATE stok_masuk SET jumlah = '$jumlah' WHERE id = $id");
  
  return mysqli_affected_rows($conn);

  return mysqli_affected_rows($conn);
}

// menghapus data stok masuk
function hapus_stok_masuk($id) {
  global $conn;
  
  $query = mysqli_query($conn, "SELECT jumlah from stok_masuk WHERE id = $id");
  $row = mysqli_fetch_array($query);
  $jumlah = $row['jumlah'];
  
  $query2 = mysqli_query($conn, "SELECT bahan_baku.stok, bahan_baku.nama, stok_masuk.nama, stok_masuk.id = $id FROM bahan_baku INNER JOIN stok_masuk ON bahan_baku.nama = stok_masuk.nama WHERE stok_masuk.id = $id ");
  $row2 = mysqli_fetch_array($query2);
  
  $nama = $row2['nama'];
  $stok = $row2['stok'];
  $kurangStok = $stok-$jumlah;
  
  $query3 = mysqli_query($conn, "DELETE FROM stok_masuk WHERE id=$id");
  $query4 = mysqli_query($conn, "UPDATE bahan_baku SET stok = $kurangStok WHERE nama = '$nama' ");

  return mysqli_affected_rows($conn);
}

// menambah data stok keluar
function tambah_stok_keluar($data) {
  global $conn;

  $nama = htmlspecialchars($data['nama']);
  $satuan = htmlspecialchars($data['satuan']);
  $tanggal = htmlspecialchars($data['tanggal']);
  $jumlah = htmlspecialchars($data['jumlah']);
  
  $query = mysqli_query($conn, "SELECT * FROM bahan_baku WHERE nama='$nama' ");
  $row = mysqli_fetch_array($query);
  $stok = $row['stok'];
  $kurangStok = $stok-$jumlah;

  if($stok<$kurangStok){
    echo "
    <script>
      alert('pengeluaran melebihi stok! sisa stok $stok');
      window.open('stok-keluar.php','_self');
    </script>
    ";
  }else{
    $query2 = "INSERT INTO stok_keluar ( nama, satuan, tanggal, jumlah, sisa_stok ) VALUES ( '$nama', '$satuan', '$tanggal', '$jumlah', $kurangStok)";
    mysqli_query($conn, $query2);
  
    $query3 = "UPDATE bahan_baku SET stok = $kurangStok WHERE nama = '$nama' ";
    mysqli_query($conn, $query3);
    
  }

  return mysqli_affected_rows($conn);
}

// mengubah data stok keluar
function ubah_stok_keluar($data) {
  global $conn;

  $id = $data['id'];
  $jumlah = htmlspecialchars($data['jumlah']);

  $query2 = mysqli_query($conn, "SELECT bahan_baku.stok, bahan_baku.nama, stok_keluar.nama, stok_keluar.id = $id, stok_keluar.jumlah FROM bahan_baku INNER JOIN stok_keluar ON bahan_baku.nama = stok_keluar.nama WHERE stok_keluar.id = $id ");
  $row2 = mysqli_fetch_array($query2);
  
  $jumlah2 = $row2['jumlah'];
  $nama = $row2['nama'];
  $stok = $row2['stok'];
  
  if ( $jumlah > $jumlah2 ) {
    $selisih = $jumlah2 - $jumlah;
    $tambahStok = $stok + $selisih;
    
    $query4 = mysqli_query($conn, "UPDATE bahan_baku SET stok = $tambahStok WHERE nama = '$nama' ");
  } elseif ( $jumlah < $jumlah2 ) {
    $selisih = $jumlah2 - $jumlah;
    $kurangStok = $stok - $selisih;
    
    $query5 = mysqli_query($conn, "UPDATE bahan_baku SET stok = $kurangStok WHERE nama = '$nama' ");
  }

  $query = mysqli_query($conn, "UPDATE stok_keluar SET jumlah = '$jumlah' WHERE id = $id");
  
  return mysqli_affected_rows($conn);

  return mysqli_affected_rows($conn);
}

// menghapus data stok keluar
function hapus_stok_keluar($id) {
  global $conn;
  
  $query = mysqli_query($conn, "SELECT jumlah from stok_keluar WHERE id = $id");
  $row = mysqli_fetch_array($query);
  $jumlah = $row['jumlah'];
  
  $query2 = mysqli_query($conn, "SELECT bahan_baku.stok, bahan_baku.nama, stok_keluar.nama, stok_keluar.id = $id FROM bahan_baku INNER JOIN stok_keluar ON bahan_baku.nama = stok_keluar.nama WHERE stok_keluar.id = $id ");
  $row2 = mysqli_fetch_array($query2);
  
  $nama = $row2['nama'];
  $stok = $row2['stok'];
  $kurangStok = $stok+$jumlah;
  
  $query3 = mysqli_query($conn, "DELETE FROM stok_keluar WHERE id=$id");
  $query4 = mysqli_query($conn, "UPDATE bahan_baku SET stok = $kurangStok WHERE nama = '$nama' ");

  return mysqli_affected_rows($conn);
}

// tambah data laporan
function tambah_laporan($data) {
  global $conn;

  $id_stok_keluar = htmlspecialchars($data['id_stok_keluar']);
  $jumlah = htmlspecialchars($data['jumlah']);
  $keterangan = htmlspecialchars($data['keterangan']);

  $query = mysqli_query($conn, "INSERT INTO laporan ( id_stok_keluar, jumlah, keterangan ) VALUES ( '$id_stok_keluar', '$jumlah', '$keterangan' )");

  return mysqli_affected_rows($conn);
}

// ubah data laporan
function ubah_laporan($data) {
  global $conn;

  $id = $data['id'];
  $satuan = htmlspecialchars($data['jumlah']);
  $harga = htmlspecialchars($data['keterangan']);

  $query = mysqli_query($conn, "UPDATE laporan SET jumlah = '$jumlah', keterangan = '$keterangan' WHERE id = $id");

  return mysqli_affected_rows($conn);
}

// hapus data laporan
function hapus_laporan($id) {
  global $conn;
  $query = mysqli_query($conn, "DELETE FROM laporan WHERE id=$id");

  return mysqli_affected_rows($conn);
}

// pengaturan
function pengaturan($data) {
  global $conn;

  $id = $data['id'];
  $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
  $email = htmlspecialchars($data['email']);
  $gambar = upload_gambar();
  if( !$gambar ) {
    return false;
  }
  
  $query = mysqli_query($conn, "UPDATE users SET gambar = '$gambar', nama_lengkap = '$nama_lengkap', email = '$email' WHERE id = $id");

  return mysqli_affected_rows($conn);
}

// upload gambar
function upload_gambar() {
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $tmpName = $_FILES['gambar']['tmp_name'];
  $error = $_FILES['gambar']['error'];

  if( $error == 4 ) {
    echo 'pilih gambar terlebih dahulu!';

    return false;
  }
  
  $ekstensiValid = ['jpg', 'jpeg', 'png'];
  $ekstensi = explode('.', $namaFile);
  $ekstensi = strtolower(end($ekstensi));
  // die;
  if( !in_array($ekstensi, $ekstensiValid) ) {
    echo 'tolong upload gambar!';

    return false;
  }

  if( $ukuranFile > 1000000 ) {
    echo 'ukuran terlalu besar!';

    return false;
  }

  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensi;

  move_uploaded_file($tmpName, 'src/images/' . $namaFileBaru);

  return $namaFileBaru;
}

?>