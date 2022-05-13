<?php 
require 'functions.php';

$id = $_GET['id'];

if( hapus_bahan_baku($id) > 0 ) {
  echo "
    <script>
      alert('data berhasil dihapus!');
      window.open('bahan-baku.php','_self');
    </script>
  ";
}

?>