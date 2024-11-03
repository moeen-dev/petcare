<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>404 &mdash; Pet Care</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/backend/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/backend/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/backend/css/components.css') }}">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>404</h1>
            <div class="page-description">
              The page you were looking for could not be found.
            </div>
            <div class="page-search">
              <div class="mt-3">
                <a href="{{ route('home')}}">Back to Home</a>
              </div>
            </div>
          </div>
        </div>
        <div class="simple-footer mt-5">
          Copyright &copy; Pet Care <span id="year"></span>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/backend/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/backend/modules/popper.js') }}"></script>
  <script src="{{ asset('assets/backend/modules/tooltip.js') }}"></script>
  <script src="{{ asset('assets/backend/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/backend/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/backend/modules/moment.min.js') }}"></script>
  <script src="{{ asset('assets/backend/js/stisla.js') }}"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{ asset('assets/backend/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/backend/js/custom.js') }}"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      let currentYear = new Date().getFullYear();
      document.getElementById('year').textContent = currentYear;
    });
  </script>
</body>
</html>