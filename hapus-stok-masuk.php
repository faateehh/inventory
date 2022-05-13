<?php 
require 'functions.php';

$id = $_GET['id'];

if( hapus_stok_masuk($id) > 0 ) {
  echo "
    <script>
      alert('data berhasil dihapus!');
      window.open('stok-masuk.php','_self');
    </script>
  ";
}

?>