<?php
include 'koneksi.php';
session_start();

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Ambil tanggal dari input form jika ada
$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : '';

// Modifikasi query untuk pencarian berdasarkan keyword dan tanggal jika ada
$query = "SELECT * FROM karyawan WHERE kode_karyawan LIKE '%$keyword%' OR nama_karyawan LIKE '%$keyword%'";
if (!empty($tanggal)) {
    $query .= " AND DATE(tanggal_masuk) = '$tanggal'";
}
$result = mysqli_query($koneksi, $query);
?>

<html>
<?php include 'Header.php'?>
<?php include 'sidebar.php'?>
<head>
    <title>Karyawan</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .Letak {
            display: flex;
            flex-direction: row;
            margin-bottom: 20px;
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
            background-color: #fff;
            margin: 5% auto; 
            padding: 20px;
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            width: 80%;
            max-width: 600px; 
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
        .search{
      margin-left: 450px;
      padding: 2px;
    }

    .tulisan{
      font-weight: bold;
    }
    .border{
        color: gray;
        border-radius: 5px;
    }
    </style>
    </style>
</head>

<body>
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="Letak">
                <a href="Home.php"><button type="button" class="btn btn-Primary"><i class="ti-home"></i></button></a> &nbsp;
                <a href="input-karyawan.php"><button type="button" class="btn btn-info"><i class="mdi mdi-account-plus"></i>Tambah Karyawan</button></a>
                <h1 style="text-align:center; margin-left:150px; font-weight: bold;" class="text-black fw-bold">Data Karyawan</h1>
            </div>
            <form method="GET" action="lihat-karyawan.php" class="search" > <i data-feather= "search"></i>
                        <input  type="text"  class = "border"name="keyword" placeholder="Cari berdasarkan kode/nama karyawan"> 
                        <!--<input type="date" name="tanggal" placeholder="Cari berdasarkan tanggal">-->
                        <input type="submit" class=" btn btn-primary" value="Cari">
                    </form>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th >PITCURE PROFILE</th>
                            <th >NO.</th>
                            <th >KODE KARYAWAN</th>
                            <th >USERNAME KARYAWAN</th>
                            <th >NAMA KARYAWAN</th>
                            <th >EMAIL</th>
                            <th >AKSI</th>
                        </tr>
                    </thead>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM karyawan");
                    $no = 1;

                    while ($data = mysqli_fetch_array($result)) {
                    ?>
                    <tbody>
                        <tr>
                            <td class="py-1">
                                <img src="../../assets/images/faces/face1.jpg" alt="image" />
                            </td>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['kode_karyawan']; ?></td>
                            <td><?php echo $data['username_karyawan']; ?></td>
                            <td><?php echo $data['nama_karyawan']; ?></td>
                            <td><?php echo $data['email_karyawan']; ?></td>
                            <td>
                            <td>
                                <a style ="margin-left:-80px;" href="edit-karyawan.php?id=<?php echo $data['id_karyawan']; ?>">
                                    <button type="button" class="btn btn-warning"><i data-feather="edit"></i>&nbsp;</button>
                                </a>
                                ||
                                <a href="delete-karyawan.php?id=<?php echo $data['id_karyawan']; ?>" onclick="return confirm('Apakah Anda yakin akan menghapus data?')">
                                    <button type="button" class="btn btn-danger"><i data-feather="trash-2"></i>&nbsp;</button>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" onclick="showDetail(<?php echo $data['id_karyawan']; ?>)">Detail</button>
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
<!-- Modal (popup) untuk menampilkan detail -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <!-- Detail content will be shown here -->
    </div>
</div>
<script>
    feather.replace();

    function showDetail(id_karyawan) {
        var modal = document.getElementById('myModal');
        var closeBtn = document.getElementsByClassName('close')[0];

        modal.style.display = 'block';
        fetch('detail_karyawan.php?id=' + id_karyawan)
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


</body>
</html>
