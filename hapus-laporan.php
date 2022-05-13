<?php 
require 'functions.php';

$id = $_GET['id'];

if( hapus_laporan($id) > 0 ) {
  echo "
    <script>
      alert('data berhasil dihapus!');
      window.open('laporan.php','_self');
    </script>
  ";
}

?>