<?php
session_start();
include 'koneksi.php';


$query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM barang");
$data = mysqli_fetch_assoc($query);
$sequence_number = $data['total'] + 1;
$kode_staff = "BR-" . sprintf("%04d", $sequence_number);


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tambah"])) {
    $nama_barang = $_POST["nama_barang"];
    $modal_barang = $_POST["modal_barang"];
    $harga_barang = $_POST["harga_barang"];
    $jumlah_barang = $_POST["jumlah_barang"];
    $kategori_barang = $_POST["kategori_barang"];
    $gambar_barang = $_POST["gambar_barang"];


  
  
?>

<?php include 'Header.php';?>
<?php include 'sidebar.php';?>
<html>

<head>
    <title>Input Barang</title>
    <style>
        .drop-zone {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
            cursor: pointer;
        }

        .drop-zone.hover {
            border-color: #008000;
        }

        img {
            max-width: 100%;
            max-height: 200px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p><a href="lihat-barang.php"><button class="btn btn-info">Lihat Barang</button></a></p>
                            <h4 class="card-title">Penambahan Barang</h4>
                            <form class="forms-sample" name="input_data" method="POST" action="proses-input-barang.php"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Kode Barang</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1"
                                        placeholder="Kode Barang" name="kode_barang" value="<?php echo $kode_staff; ?>"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Barang</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nama Barang" name="nama_barang" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Modal Barang</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="Modal Barang" name="modal_barang" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Harga Barang</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="Harga Barang" name="harga_barang" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Jumlah Barang</label>
                                    <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                        placeholder="Jumlah Barang" name="jumlah_barang" required>
                                </div>
                                <div class="form-group">
                                    <label for="kategori_barang">Kategori Barang</label>
                                    <select class="form-control" name="kategori_barang" id="kategori_barang"
                                        aria-labelledby="dropdownMenuButton2">
                                        <option>Baju Pria</option>
                                        <option>Baju Wanita</option>
                                        <option>Baju anak-anak</option>
                                    </select>
                                    <button type="button" class="btn btn-primary mt-2" id="tambahKategori">Tambah
                                        Kategori</button>
                                    
                                </div>
                                <div class="form-group">
                                    <input type="file" id="gambar_barang" name="gambar_barang">
                                </div>

                                <button type="submit" class="btn btn-primary me-2" name="tambah" value="SIMPAN">Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('tambahKategori').addEventListener('click', function () {
                var kategoriBaru = prompt('Masukkan nama kategori baru:');

                if (kategoriBaru !== null && kategoriBaru.trim() !== '') {
                    var selectKategori = document.getElementById('kategori_barang');

                 
                    var optionExists = Array.from(selectKategori.options).some(option => option.value ===
                        kategoriBaru);

                    if (!optionExists) {
                        var option = new Option(kategoriBaru, kategoriBaru);
                        selectKategori.add(option);
                    } else {
                        alert('Kategori sudah ada dalam dropdown.');
                    }
                } else {
                    alert('Nama kategori tidak boleh kosong.');
                }
            });
        });
    </script>

</body>

</html>
