<?php
require 'koneksi.php';

if(isset($_POST['edit_product'])) {
    $id = $_POST['id'];
    $nama_bunga = $_POST['nama_bunga'];
    $harga_bunga = $_POST['harga_bunga'];

    // Proses upload gambar baru (jika ada)
    if($_FILES['gambar_bunga']['name']) {
        $gambar_bunga = $_FILES['gambar_bunga']['name'];
        $temp = $_FILES['gambar_bunga']['tmp_name'];

        // Tentukan direktori penyimpanan untuk gambar
        $target_dir = "../Gambar/";
        $target_file = $target_dir . basename($gambar_bunga);

        // Pindahkan gambar ke direktori penyimpanan
        move_uploaded_file($temp, $target_file);

        // Update query dengan field gambar_bunga
        $sql = "UPDATE bungas SET nama_bunga='$nama_bunga', harga_bunga='$harga_bunga', gambar_bunga='$gambar_bunga' WHERE id_bunga=$id";
    } else {
        // Update query tanpa field gambar_bunga
        $sql = "UPDATE bungas SET nama_bunga='$nama_bunga', harga_bunga='$harga_bunga' WHERE id_bunga=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header('Location: ../admins.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>