<!DOCTYPE html>
<html>
<head>
    <title>Upload Produk Wisata</title>
</head>
<body>
    <h2>Form Upload Produk Wisata</h2>
    <form action="proses_upload.php" method="POST" enctype="multipart/form-data">
        <label>ID:</label><br>
        <input type="number" name="id" required><br><br>

        <label>Nama Wisata:</label><br>
        <input type="text" name="nama_wisata" required><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" rows="5" required></textarea><br><br>

        <label>Foto:</label><br>
        <input type="file" name="foto" accept="image/*" required><br><br>

        <button type="submit" name="submit">Upload</button>
    </form>
</body>
</html>
