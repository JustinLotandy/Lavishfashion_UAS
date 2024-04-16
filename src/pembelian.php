<?php
include 'koneksi.php';
session_start();

$query = mysqli_query($koneksi, "SELECT * FROM barang");
$kategori_query = mysqli_query($koneksi, "SELECT DISTINCT kategori_barang FROM barang");
$kategoris = [];
while ($row = mysqli_fetch_assoc($kategori_query)) {
    $kategoris[] = $row['kategori_barang'];
}

if (isset($_GET['btnSearch'])) {
    $keyword = $_GET['keyword'];
    $kategori = $_GET['kategori'];

    $sql = "SELECT * FROM barang WHERE 1=1";
    if (!empty($keyword)) {
        $sql .= " AND nama_barang LIKE '%$keyword%'";
    }
    if (!empty($kategori)) {
        $sql .= " AND kategori_barang = '$kategori'";
    }

    $query = mysqli_query($koneksi, $sql);
} else {
    $query = mysqli_query($koneksi, "SELECT * FROM barang");
}

if (isset($_POST['btnBeli'])) {
    $id_barang = $_POST['id_barang'];
    $jumlah_pembelian = $_POST['jumlah_pembelian'];

    $barang_query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$id_barang'");
    $barang_data = mysqli_fetch_assoc($barang_query);
    $nama_barang = $barang_data['nama_barang'];
    $kode_barang = $barang_data['kode_barang'];
    $harga_barang = $barang_data['harga_barang'];

    $insert_query = mysqli_query($koneksi, "INSERT INTO pembelian (id_barang, nama_barang, kode_barang, harga_barang, jumlah_pembelian) VALUES ('$id_barang', '$nama_barang', '$kode_barang', '$harga_barang', '$jumlah_pembelian')");
    if ($insert_query) {
        echo "<script>alert('Pembelian berhasil dicatat.')</script>";
    
        // Mengurangi stok barang yang dibeli
        $stok_terbaru = $barang_data['jumlah_barang'] - $jumlah_pembelian;
        $update_stok_query = mysqli_query($koneksi, "UPDATE barang SET jumlah_barang = '$stok_terbaru' WHERE id_barang = '$id_barang'");
        if ($update_stok_query) {
            echo "<script>alert('Stok barang berhasil diperbarui.')</script>";
        } else {
            echo "<script>alert('Gagal memperbarui stok barang.')</script>";
        }
    } else {
        echo "<script>alert('Gagal mencatat pembelian.')</script>";
    }
    
}
?>
<?php include 'Header.php'?>
<?php include 'sidebar.php'?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .LEtak {
            margin-top: 50px;
            margin-left: 50px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
        }
        .barang {
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
            height: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        .barang:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 10px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .detail-item {
            margin-bottom: 10px;
        }
        .detail-label {
            font-weight: bold;
        }
        .letak_cari {
            margin-left:450px;
            margin-top: -540px;
        }
        .S {
            border-radius: 5px;
            height: 50px;
        }
        .O {
            border-radius: 5px;
            height: 50px;
            margin-top: 10px;
        }
        .Y {
            border-radius: 5px;
            height: 50px;
            width:100px;
        }
    </style>
</head>
<body>
    <div class="LEtak">
        <form class="search-form" action="#" method="GET">
            <i class="icon-search"></i>
            <input type="search" class="form-control" placeholder="Search Here" title="Search here" name="keyword">
            <select class="O" name="kategori">
                <option value="">Semua Kategori</option>
                <?php foreach($kategoris as $kategori) { ?>
                    <option value="<?php echo $kategori; ?>"><?php echo $kategori; ?></option>
    
                <?php } ?>
            </select>
            <button class="btn btn-primary" type="submit" name="btnSearch">Cari</button>
        </form>
    </div>

    <div class="container">
        <?php
        if(mysqli_num_rows($query) > 0) {
            while($data = mysqli_fetch_assoc($query)) {
        ?>
                <div class="barang">
                    <h3><?php echo $data['nama_barang']; ?></h3>
                    <p class="detail-item"><span class="detail-label">Kode Barang:</span> <?php echo $data['kode_barang']; ?></p>
                    <p class="detail-item"><span class="detail-label">Harga Barang:</span> <?php echo number_format($data['harga_barang']); ?></p>
                    <p class="detail-item"><span class="detail-label">Jumlah Barang:</span> <?php echo $data['jumlah_barang']; ?></p>
                    <button class="btn btn-primary" onclick="showDetail(<?php echo $data['id_barang']; ?>)">Jual</button>
                    <div id="myModal_<?php echo $data['id_barang']; ?>" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="hideDetail(<?php echo $data['id_barang']; ?>)">&times;</span>
                            <h2>Detail Barang</h2>
                            <div id="detailContent_<?php echo $data['id_barang']; ?>"></div>
                            <form method="POST" action="">
                                <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
                                <label for="jumlah_pembelian">Jumlah Barang:</label>
                                <input class="Y" type="number" id="jumlah_pembelian_<?php echo $data['id_barang']; ?>" name="jumlah_pembelian">
                                <button class="btn btn-primary" type="submit" name="btnBeli">Konfirmasi</button>
                            </form>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "Barang tidak ditemukan.";
        }
        ?>
    </div>
-_-
    <script>
        function showDetail(id_barang) {
            var modal = document.getElementById('myModal_' + id_barang);
            modal.style.display = 'block';

            fetch('detail_barang.php?id=' + id_barang)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('detailContent_' + id_barang).innerHTML = data;
                })
                .catch(error => console.error('Error fetching detail:', error));
        }

        function hideDetail(id_barang) {
            var modal = document.getElementById('myModal_' + id_barang);
            modal.style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target.className === 'modal') {
                var modals = document.querySelectorAll('.modal');
                modals.forEach(function(modal) {
                    modal.style.display = 'none';
                });
            }
        };
    </script>
</body>
</html>
