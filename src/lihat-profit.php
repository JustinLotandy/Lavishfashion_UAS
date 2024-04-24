

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Profit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .Letak_tabel{
            margin-top: 100px;
            margin-left: -600px;
        }
        .halo{
            margin-left: 350px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
<?php include 'Header.php'; ?>
<?php include 'sidebar.php'; ?>
<div class="halo" >
    <h1 >Data Profit Per Bulan</h1> 
</div>
   <div class="Letak_tabel" >
    <?php include 'data_profit.php'; ?>
   </div>
</body>
</html>



