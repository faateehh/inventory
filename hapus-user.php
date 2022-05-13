<?php 
require 'functions.php';

$id = $_GET['id'];

if( hapus_user($id) > 0 ) {
  echo "
    <script>
      alert('data berhasil dihapus!');
      window.open('kelola-users.php','_self');
    </script>
  ";
}

?>