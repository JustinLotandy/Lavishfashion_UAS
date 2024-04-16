<?php
include 'koneksi.php';
session_start();

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Ambil tanggal dari input form jika ada
$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : '';

// Modifikasi query untuk pencarian berdasarkan keyword dan tanggal jika ada
$query = "SELECT * FROM barang WHERE kode_barang LIKE '%$keyword%' OR nama_barang LIKE '%$keyword%'";
if (!empty($tanggal)) {
    $query .= " AND DATE(tanggal_masuk) = '$tanggal'";
}
$result = mysqli_query($koneksi, $query);
?>

<html>
<?php include 'Header.php'?>
<?php include 'sidebar.php'?>
<head>
    <title>Barang</title>
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
    /* CSS untuk tombol Detail */
    #showDetailBtn {
        margin-top: 20px; /* Jarak dari atas */
        padding: 10px 20px; /* Padding tombol */
        background-color: #007bff; /* Warna latar tombol */
        color: white; /* Warna teks tombol */
        border: none; /* Hapus border */
        border-radius: 5px; /* Sudut border */
        cursor: pointer; /* Kursor jadi tanda tangan */
    }

    /* Hover effect untuk tombol Detail */
    #showDetailBtn:hover {
        background-color: #0056b3; /* Warna latar saat hover */
    }

    /* CSS untuk popup (modal) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.5); /* Warna latar belakang semi-transparan */
    }

    .modal-content {
        background-color: #fefefe; /* Warna latar popup */
        margin: 15% auto; /* Letakkan di tengah vertikal dan horizontal */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px; /* Lebar maksimum */
        border-radius: 10px; /* Sudut border */
    }

    /* Tombol untuk menutup popup */
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
    
    .search{
      margin-left: 450px;
      padding: 2px;
    }

    .border{
        color: gray;
        border-radius: 5px;
    }
    </style>
</head>

<body>
<div class="letak2">
   
    <div class="col-lg-14 grid-margin stretch-card l" style="margin-top: 50px">
        <div class="card">
            <div class="card-body">
                <div class="Letak" >
                    <a href="Home.php"><button type="button" class="btn btn-Primary"><i class="ti-home"></i></button></a> &nbsp;
                    <a href="input-barang.php"><button type="button" class="btn btn-info">Tambah Item</button></a>
                    <h1 style="text-align:center; margin-left :220px; font-weight: bold;" class="text-black fw-bold" >Data Barang</h1>
                </div>
                <form method="GET" action="lihat-barang.php" class="search" > <i data-feather= "search"></i>
                        <input  type="text" class="border" name="keyword" placeholder=  "Cari"> 
                        <!--<input type="date" name="tanggal" placeholder="Cari berdasarkan tanggal">-->
                        <input type="submit" class=" btn btn-primary" value="Cari">
                    </form>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Gambar Item</th>
                                <th>KODE BARANG</th>
                                <th>NAMA BARANG</th>
                                <th>HARGA BARANG</th>
                                <th>MODAL BARANG</th>
                                <th>JUMLAH BARANG</th>
                                <th>KATEGORI BARANG</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($data = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td class="py-1"><img src="<?php echo $data['gambar_barang']; ?>" alt="Gambar Barang"></td>
                                    <td><?php echo $data['kode_barang']; ?></td>
                                    <td><?php echo $data['nama_barang']; ?></td>
                                    <td><?php echo number_format($data['harga_barang']); ?></td>
                                    <td><?php echo $data['modal_barang']; ?></td>
                                    <td><?php echo $data['jumlah_barang']; ?></td>
                                    <td><?php echo $data['kategori_barang']; ?></td>
                                    <td>
                                        <a href="edit-barang.php?id=<?php echo $data['id_barang']; ?>"><button type="button" class="btn btn-warning"><i data-feather="edit"></i>&nbsp;</button></a>
                                        ||
                                        <a href="proses-hapus-barang.php?id=<?php echo $data['id_barang']; ?>" onclick="return confirm('Apakah Anda yakin akan menghapus data?')"><button type="button" class="btn btn-danger"><i data-feather="trash-2"></i>&nbsp;</button></a>
                                    </td>
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
<!-- Modal (popup) untuk menampilkan detail -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <!-- Detail content will be shown here -->
    </div>
</div>
<script>
    // Saat tombol Detail di baris tertentu diklik, tampilkan modal dengan data dari detail_barang.php
    function showDetail(id_barang) {
        var modal = document.getElementById('myModal');
        var closeBtn = document.getElementsByClassName('close')[0];

        modal.style.display = 'block';
        fetch('detail_page.php?id=' + id_barang)
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