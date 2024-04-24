
<?php
include 'koneksi.php';
session_start();

function highlightKeyword($text, $keyword) {
    if (empty($keyword)) {
        return $text;
    }

    $keyword = preg_quote($keyword);
    $text = preg_replace("/($keyword)/i", '<span class="highlight">$1</span>', $text);
    return $text;
}

$query = mysqli_query($koneksi, "SELECT * FROM pembelian");

$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : '';
if (!empty($tanggal)) {
    $query = mysqli_query($koneksi, "SELECT * FROM pembelian WHERE DATE(waktu_pembelian) = '$tanggal' ORDER BY waktu_pembelian DESC");
}

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
if (!empty($keyword)) {
    $query = mysqli_query($koneksi, "SELECT * FROM pembelian WHERE id_pembelian LIKE '%$keyword%' OR id_barang LIKE '%$keyword%' OR nama_barang LIKE '%$keyword%' OR kode_barang LIKE '%$keyword%' OR harga_barang LIKE '%$keyword%' OR jumlah_pembelian LIKE '%$keyword%' OR waktu_pembelian LIKE '%$keyword%' ORDER BY CASE WHEN id_pembelian LIKE '%$keyword%' THEN 1 WHEN id_barang LIKE '%$keyword%' THEN 2 WHEN nama_barang LIKE '%$keyword%' THEN 3 WHEN kode_barang LIKE '%$keyword%' THEN 4 WHEN harga_barang LIKE '%$keyword%' THEN 5 WHEN jumlah_pembelian LIKE '%$keyword%' THEN 6 WHEN waktu_pembelian LIKE '%$keyword%' THEN 7 ELSE 8 END");
}
?>
<html>
<?php include 'Header.php'; ?>
<?php include 'sidebar.php'; ?>
<head>
    <title>Data Penjualan</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .Letak{
          display: flex;
          flex-direction: row;
          margin-bottom: 20px;
        }
     
        .Letak2{
          margin: auto;
        }

        .l{
          margin-top: -100px;
        }
        .red{
          background-color: red;
          color: white;
          font-weight: bold;
        }
        
        .bgcolor{
    background: linear-gradient(to right,#387ADF, #5755FE );
    height: 100px;
    width: 1000000px;
    margin-left: 10px;
    border: 1px solid black;
    margin-top: 100px;   
  }
    
    #showDetailBtn {
        margin-top: 20px; 
        padding: 10px 20px; 
        background-color: #007bff; 
        color: white; 
        border: none; 
        border-radius: 5px; 
        cursor: pointer; 
    }

    
    #showDetailBtn:hover {
        background-color: #0056b3; 
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
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .highlight {
        background-color: yellow;
        font-weight: bold;
    }
    .a{
      height: 150px;
      width:200px;
      margin-right: 0;
    }
    .C{
      margin-left:220px; 
      margin-top:-45px;
      
    }
    .D{
      margin-top: 100px; 
      margin-left:-200;
    }
    .K{
      margin-left: 100px;
      margin-top: -15px;
    }
    .k a button {
      width: 5px;
      margin-left: 200px;
      margin-top: -40px;
    }
    
    .Bate{
      margin-left: -1px;
      width: 200px;
      margin-top: 10px;
    }
    </style>
    <style>
        .highlight {
            background-color: yellow;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="letak2 ">
        <div class="col-lg-14 grid-margin stretch-card l " style="margin-top : 10px">
            <div class="card">
                <div class="card-body">
                    <div class="Letak">
                        <form action="" method="GET" class="a"> 
                            <input  type="search" class="form-control" placeholder="Cari Data Pembelian" name="keyword" value="<?php echo $keyword; ?>">
                            <input class= 'Bate' type="date" class="form-control" placeholder="Cari Data Pembelian" name="tanggal" value="<?php echo $tanggal; ?>">
                            <button type="submit" class="btn btn-primary C" >Cari</button>
                        </form> 
                        <div class="D">
                            <a href="Home.php"><button type="button" class="btn btn-Primary"><i class="ti-home"></i></button></a> &nbsp;
                            <a href="pembelian.php"> <button type="button" class="btn btn-info">Tambah Data</button></a>
                            <h1 style="text-align:center; margin-left :400px; font-weight: bold; margin-top:-100px;" class="text-black fw-bold">Data Pembelian</h1>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID Pembelian</th>
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kode Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Jumlah Pembelian</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $data['id_pembelian']; ?></td>
                                        <td><?php echo $data['id_barang']; ?></td>
                                        <td><?php echo highlightKeyword($data['nama_barang'], $keyword); ?></td>
                                        <td><?php echo highlightKeyword($data['kode_barang'], $keyword); ?></td>
                                        <td><?php echo number_format($data['harga_barang']); ?></td>
                                        <td><?php echo $data['jumlah_pembelian']; ?></td>
                                        <td><?php echo $data['waktu_pembelian']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-success" onclick="showDetail(<?php echo $data['id_barang']; ?>)">Detail</button>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <!-- Detail content will be shown here -->
        </div>
    </div>
    <script>
        // Saat tombol Detail di baris tertentu diklik, tampilkan modal dengan data dari detail_barang.php
        function showDetail(id_pembelian) {
            var modal = document.getElementById('myModal');
            var closeBtn = document.getElementsByClassName('close')[0];

            modal.style.display = 'block';
            fetch('detail_page_penjualan.php?id=' + id_pembelian)
                .then(response => response.text())
                .then(data => {
                    // Place the fetched content inside the modal content
                    document.querySelector('.modal-content').innerHTML = data;
                })
                .catch(error => console.error('Error fetching detail:', error));

            // Saat tombol close di modal diklik, sembunyikan modal
            closeBtn.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            // Saat user klik di luar modal, sembunyikan modal
            window.addEventListener('click', function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            });
        }
    </script>
    <script>
        feather.replace();
    </script>
</body>
</html>
