<?php
require 'Dashboard/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admins.css">
</head>
<body>
    <div class="dashboard-header">
        <h1>Admin Dashboard</h1>
    </div>

    <div class="dashboard-content">
        <div class="sidebar">
            <h2>Menu</h2>
            <!-- Add navigation links for CRUD operations on products -->
            <ul>
                <li><a href="#view-products">Data Produk</a></li>
                <li><a href="index.php">Kembali ke Beranda</a></li>
            </ul>
        </div>

        <div class="main-content">
            <!-- <h2>Welcome to the Admin Dashboard!</h2> -->
            <div class="card">
                <h3>Data Produk</h3>
                <p>Klik tombol dibawah untuk melihat data produk:</p>
                <button class="view-products-button button" onclick="toggleTable()">Lihat</button>
                <button class="view-products-button button" onclick="toggleTambah()">Tambah Data</button>
                <table id="product-table" style="display: none;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Bunga</th>
            <th>Harga Bunga</th>
            <th>Gambar Bunga</th>
            <th>Aksi</th>
        </tr>
    </thead>
<tbody class="table-body">
    <?php
    $sql = "SELECT * FROM bungas ORDER BY id_bunga";
    $result = $conn->query($sql);
    $no = 1;
    // Memeriksa apakah ada data yang ditemukan
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['nama_bunga']; ?></td>
                <td><?php echo $row['harga_bunga']; ?></td>
                <td><img src="Gambar/<?php echo $row['gambar_bunga']; ?>" alt="<?php echo $row['nama_bunga']; ?>" style="width: 50px; height: 50px;"></td>
                <td><a href="#" onclick="showEditForm('<?php echo $row['id_bunga']; ?>', '<?php echo $row['nama_bunga']; ?>', '<?php echo $row['harga_bunga']; ?>')">Update</a> | <a href="Dashboard/delete.php?id=<?php echo $row['id_bunga']; ?>">Delete</a></td>
            </tr>
            <?php
            $no++;
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data ditemukan.</td></tr>";
    }
    ?>
</tbody>
</table>
            </div>

            <div class="card" id="edit-product-card" style="display: none;">
            <h3>Edit Product</h3>
            <form method="post" enctype="multipart/form-data" class="edit-product-form" action="Dashboard/update.php">
            <input type="hidden" name="id" value="<?php echo $row['id_bunga']; ?>">
            <input type="text" name="nama_bunga" value="<?php echo $row['nama_bunga']; ?>" placeholder="Flower Name" required>
            <input type="text" name="harga_bunga" value="<?php echo $row['harga_bunga']; ?>" placeholder="Flower Price" required>
            <input type="file" name="gambar_bunga">
            <input type="submit" name="edit_product" value="Update Product" class="button">
        </form>
             </div>

            <div id="tambah-produk" class="card"  style="display: none;">
                <h3>Add Product</h3>
                <form method="post" enctype="multipart/form-data" class="add-product-form" action="Dashboard/create.php">
                    <input type="text" name="nama"  placeholder="Flower Name" required>
                    <input type="text" name="harga"  placeholder="Flower Price" required>
                    <input type="file" name="gambar"  required>
                    <input type="submit" value="Add Product" class="button">
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    var editCard = document.getElementById("edit-product-card");
    var table = document.getElementById("product-table");
    var tambahProduk = document.getElementById("tambah-produk");
    function toggleTable() {
        
        if (table.style.display === "none") {
            table.style.display = "table";
            editCard.style.display = "none";
            tambahProduk.style.display = "none";
        } else {
            table.style.display = "none";
            editCard.style.display = "none";
            tambahProduk.style.display = "none";
        }
    }

    function showEditForm(id, nama, harga) {
    var editCard = document.getElementById("edit-product-card");
    var table = document.getElementById("product-table");
    var tambahProduk = document.getElementById("tambah-produk");

    if (editCard.style.display === "none") {
        // Isi nilai pada form edit dengan data bunga yang dipilih
        document.querySelector(".edit-product-form [name='id']").value = id;
        document.querySelector(".edit-product-form [name='nama_bunga']").value = nama;
        document.querySelector(".edit-product-form [name='harga_bunga']").value = harga;

        editCard.style.display = "block";
        table.style.display = "table";
        tambahProduk.style.display = "none";
    } else {
        editCard.style.display = "none";
        tambahProduk.style.display = "none";
    }
}

    function toggleTambah() {
        

        if (tambahProduk.style.display === "none") {
            tambahProduk.style.display = "block";
            editCard.style.display = "none";
        } else {
            tambahProduk.style.display = "none";
            editCard.style.display = "none";
        }
    }
</script>
</html>
