<?php
include 'koneksi.php';
session_start();

if(isset($_SESSION['notification'])) {
    $message = $_SESSION['notification']['message'];
    $type = $_SESSION['notification']['type'];
    unset($_SESSION['notification']);
} else {
    $message = '';
    $type = '';
}

if(isset($_POST['login'])) {
    $email_karyawan = $_POST['email_karyawan'];
    $password_karyawan = md5($_POST['password_karyawan']);

    $query = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE email_karyawan = '$email_karyawan'");
    $data = mysqli_fetch_assoc($query);

    if($data) {
        if($data['password_karyawan'] == $password_karyawan) {
            $_SESSION['id_karyawan'] = $data['id_karyawan'];
            $_SESSION['nama_karyawan'] = $data['nama_karyawan'];
            header("location: Home.php");
        } else {
            $_SESSION['notification'] = array(
                'message' => 'Password salah!',
                'type' => 'error'
            );
            header("location: login.php");
        }
    } else {
        $_SESSION['notification'] = array(
            'message' => 'Email tidak ditemukan!',
            'type' => 'error'
        );
        header("location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login </title>
 
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- End Bootstrap CSS -->
  

  <link rel="stylesheet" href="assets/css/vertical-layout-light/style.css">

  <style>
    .error-message {
      color: red;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="./f__4_-removebg-preview.png" alt="logo" />
              </div>
              <h4>Hello!</h4>
              <h6 class="fw-light">Sign in to continue.</h6>

              <!-- Notification Section -->
              <?php if($message && $type): ?>
              <div class="alert alert-<?php echo $type; ?> alert-dismissible fade show" role="alert">
                <span class="error-message"><?php echo $message; ?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php endif; ?>
              <!-- End Notification Section -->

              <form class="pt-3" method="POST" action="proses-login.php">
                <div class="form-group">
                  <label>Email:</label>
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                    placeholder="Email" name="email_karyawan" required>
                </div>
                <div class="form-group">
                  <label>Password:</label>
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                    placeholder="Password" name="password_karyawan" required>
                </div>
                <div class="mt-3">
                  <input type="submit" name="login" value="Login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- End Bootstrap JS and jQuery -->
</body>

</html>
