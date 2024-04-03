
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Portal Rental - Register</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <!-- Favicon -->
    <link href="{{ URL::to('/') }}/assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ URL::to('/') }}/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ URL::to('/') }}/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ URL::to('/') }}/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"></i>Portal Rental</h3>
                            </a>
                            <h3>Register</h3>
                        </div>
                        @include('notifications')
                         <form novalidate action="register/validasi-register" method="post">
                        @csrf <br>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="silahkan isi nama" name="nama">
                            <label for="floatingInput">Nama</label>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">+62</span>
                            <input type="number" class="form-control" placeholder="No HandPhone" aria-label="number" aria-describedby="basic-addon1"name="tlp">
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="silahkan isi nama" name="sim">
                            <label for="floatingInput">Nomor SIM</label>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Alamat</span>
                            <textarea class="form-control" aria-label="With textarea" name="alamat"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Register</button>
                        <p class="text-center mb-0">have an Account? <a href="">Login</a></p>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/lib/chart/chart.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/lib/easing/easing.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ URL::to('/') }}/assets/js/main.js"></script>
</body>

</html>
