<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "wisata"; // ganti sesuai nama databasenya

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama_wisata = $_POST['nama_wisata'];
    $deskripsi = $_POST['deskripsi'];

    // proses upload foto
    $foto_name = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $target_dir = "uploads/";

    // Pastikan folder uploads ada
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    $target_file = $target_dir . basename($foto_name);
    move_uploaded_file($foto_tmp, $target_file);

    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO produk_wisata (id, nama_wisata, deskripsi, foto) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $id, $nama_wisata, $deskripsi, $target_file);

    if ($stmt->execute()) {
        echo "Data berhasil diupload!";
    } else {
        echo "Gagal upload data: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
