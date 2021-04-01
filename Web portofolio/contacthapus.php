<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    header('Location: admin.php#contact');
}

$idg = $_GET['id'];

$sql = "DELETE FROM contact WHERE id='$idg'";
$query = mysqli_query($connect,$sql);

if ($query) {
    header('Location: admin.php#contact');
}else{
    header('Location: hapus.php?status=gagal');
}
?>