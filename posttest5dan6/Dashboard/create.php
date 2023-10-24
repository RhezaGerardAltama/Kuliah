<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pastikan form terisi dengan benar sebelum memproses data
    if (isset($_POST['nama']) && isset($_POST['harga']) && isset($_FILES['gambar'])) {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];

        // Mengambil informasi file gambar
        $file = $_FILES['gambar'];
        $fileName = date('Y-m-d') . ' ' . $file['name']; // Nama file baru dengan format yang diinginkan
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        // Memeriksa apakah file upload berhasil
        if ($fileError === 0) {
            // Memindahkan file upload ke direktori tujuan
            $uploadDir = '../Gambar/'; // Ganti dengan direktori tempat menyimpan file upload
            $filePath = $uploadDir . $fileName;
            $fileTmpPath = realpath($fileTmpName); // Mengambil jalur absolut dari file sementara

            if (move_uploaded_file($fileTmpPath, $filePath)) {
                // Melakukan koneksi ke database
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Periksa koneksi database
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Menyimpan data ke tabel bungas
                $sql = "INSERT INTO bungas (nama_bunga, harga_bunga, gambar_bunga) VALUES ('$nama', '$harga', '$fileName')";
                if ($conn->query($sql) === TRUE) {
                    // Beri pesan sukses jika diperlukan
                    header('Location: ../admins.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                // Tutup koneksi database
                $conn->close();
            } else {
                echo "Error uploading the file. Please try again.";
            }
        } else {
            echo "Error uploading the file. Please try again.";
        }
    } else {
        echo "Please fill in all the required fields.";
    }
}
?>