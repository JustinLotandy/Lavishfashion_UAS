<!DOCTYPE html>
<html lang="en">
<?php session_start();?>
<?php include 'header.php'?>
<?php include 'sidebar.php'?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://unpkg.com/feather-icons"></script>
<style>
    .shadow-box {
        width: 385px;
        height: 80px;
        border-radius: 10px;
        border: 0;
        background-color: white;
    box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.1);
        
        
    }

    .letak{
        margin-left:30px;
        margin-top : 30px;
        
    }

    .white-box {
    width: 1250px;
    height: 150px;
    background-color: white;
    box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.1);
    margin: auto;
    border-radius: 10px;
    margin-left: 10px;
    margin-top: 30px;
  }

 
  .bgcolor{
    background: linear-gradient(to right,#387ADF, #5755FE );
    height: 100px;
    width: 1000000px;
    margin-left: 10px;
    
  }

  .back{
    background-color: #F1EFEF;
  }

  .icon_home{
    color: white;
    margin-left: 20px;
    margin-top: 30px;

  }
  .p1{
    margin-left : 50px; 
    margin-top:-20px; 
    font-weight: bold;
    font-size: large;
    color: white;
  }

  .ukuranicongambar{
    width: 80px;
    margin-right:100px ;
  }
  .ps{
    margin-left: 80px;
    margin-top:-30px;
    font-size: large;
    font-weight: bold;
  }
  .personicon{
    margin-right: 150px;

  }

  .ps1{
    font-size: large;
    font-weight: bold;
    margin-left: 30px;
    margin-top:-20px;
  }

  .jumlahbarangicon{
    width: 100px;
    margin-top: 30px;
    margin-left: 20px;
  }

  .profiticon{
    width: 150px;
    margin-top: 20px;
  }

  .Jbarang{
    font-weight: bold;
    font-size: large;
    color: black;
    text-decoration: none;
    margin-top: -15px;
  }

  .Pbarang{
    font-weight: bolder;
    font-size: 45px;
    color: black;
    text-decoration: none;
    margin-top: -15px;
    margin: -5px;
  }
  .barangout_icon{
    margin-top: -140px;
    width: 110px;
    margin-left: 420px;
  }

  .barangout-a{
    font-weight: bold;
    font-size: large;
    color: black;
    text-decoration: none;
    margin-top: -100px;
    margin-left: 540px;
    
  }

  .H{
    margin-left: 620px;
    margin-top: 20px;
    font-size:x-large;
    font-weight: bold;
  }
.pengguna{
    margin-top: -120px;
    width: 170px;
    margin-left: 850px;
}

.Tpengguna{
    font-weight: bold;
    font-size: large;
    color: black;
    text-decoration: none;
    margin-top: -100px;
    margin-left: 1000px;
}

.Jumlahangka{
    margin-left: 150px;
    margin-top: -40px;
    font-size:x-large;
    font-weight: bold;
}
.Jumlahkaryawan{
    margin-left: 1070px;
    margin-top: 25px;
    font-size:x-large;
    font-weight: bold;
}

.blue-bg{
  background: linear-gradient(to right,#387ADF, #5755FE );
  height: 200px;
    width: 1000px;
    border-radius: 10px;
    margin: auto;
    margin-top: 50px;
}
.profit{
  margin: left 300px; ;
}

.angka{
  font-size: 50px;
  margin-top: -80px;
  color: white;
}
.Quote{
  margin-left: 300px;
  margin-top: -90px;
}

.Quote p{
  font-size: 50px;
  color: white;
}
</style>
</head>
<body class="back">
  <div class="bgcolor">
    <a href=""><i data-feather="home" class="icon_home"></i></a>
    <p class="p1">Dasborad</p>
    <div>
       <div class="white-box">
        <div >
          <div>
      <img src="./barangjumlah.png" class="jumlahbarangicon" alt="Jumlah Barang Icon">
      <a class="Jbarang">Jumlah barang</a>
      <p class="Jumlahangka"><?php include 'JumlahBarang.php'?></p>
    </div>
    <div>
      <img src="./barangout.png" class="barangout_icon" alt="Barang Masuk Icon">
      <div class="barangout-a">
        <span >Jumlah Barang Keluar</span>
      </div>
      <p class ="H"><?php include 'Jumlahbarangout.php'?></p>
    </div>

    <div>
      <img src="./pengguna.png" class="pengguna" alt="Barang Masuk Icon">
      <div class="Tpengguna">
        <span>Jumlah Pengguna</span>
      </div>
      <p class ="Jumlahkaryawan"><?php include 'JumlahKaryawan.php'?></p>
    </div>
        </div>
        
            
        
    </div> 
    </div>
    
     <div class="letak" >
        <a href="lihat-Karyawan.php"><button type="button" class="shadow-box btn-block">
        <i data-feather="user" class="personicon"></i>
                      <p class="ps1">Data karyawan</p>
                    </button></li></a>
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
                    <a href="lihat-barang.php"><button type="button" class=" shadow-box btn-lg btn-block">
                      <img src="./barangicon.png" class="ukuranicongambar">
                      <p class="ps">Data Barang</p>
                    </button></li></a>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <a href="data-pembelian.php"><button type="button" class="shadow-box btn-block">
                      <i data-feather="credit-card" style="margin-top:-5px; margin-left:-150px" ></i>
                    <p class="ps" style="margin-top: -20px; margin: left:-100px; ">Data Pembelian</p>
                    </button></li></a>
        
    </div>
    
   
    <div>
       <div class="blue-bg">
        <div class="profit" >
          <div>
      <img class="profiticon" src="./dolar.png" class="jumlahbarangicon" alt="Jumlah Barang Icon">
      <a class="Pbarang">Profit</a>
      <div class="Jumlahangka">
        <p class = "angka"><?php include 'jumlah_profit.php'?></p>
        <div class= "Quote">
        <p style="margin-left:100px">Hello,</p> <br>
        <p style="margin-left:200px" ><?php echo isset($_SESSION['nama_karyawan']) ? $_SESSION['nama_karyawan'] : ''; ?></span></p>
        </div>
       
      </div>
      
    </div>
   

    <script>
        feather.replace();
    </script>
</body>

</html>