<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login Laboratorio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center p-0 fs-4" style="font-size: 18px">Ingresar</h5>
                  </div>

                  <form class="row g-3 needs-validation" action="{{ route('app.login.auth') }}" method="POST">
                    @csrf

                    <div class="col-12">
                      <div class="input-group has-validation">
                        <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuario" required>
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-circle"></i></span>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="input-group has-validation">
                        <input type="text" name="clave_user" class="form-control" id="clave_user" placeholder="Clave" required>
                        <span class="input-group-text" id="clave_user"><i class="bi bi-key-fill"></i></span>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100 btn-sm" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">@<a href="#">LAB2025</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
  <!-- Template Main JS File -->
  <script src="{{ asset('app/modules/usuario/login.js') }}"></script>

</body>

</html>