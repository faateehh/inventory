<?php 
require 'functions.php';

$id = $_GET['id'];

if( hapus_stok_keluar($id) > 0 ) {
  echo "
    <script>
      alert('data berhasil dihapus!');
      window.open('stok-keluar.php','_self');
    </script>
  ";
}

?>