<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <title>@yield('title')</title>

    <!-- Custom styles for this page -->
    @stack('custom_css')

  </head>
  <body>
    <div class="wrapper">
      <nav id="sidebar" class="sidebar">
        <div class="sidebar-content js-simplebar">
          <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Reku</span>
          </a>

          <ul class="sidebar-nav">
            <li class="sidebar-item{{ (request()->is('/')) ? ' active' : '' }}">
              <a class="sidebar-link" href="{{ route('index') }}">
                <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
              </a>
            </li>

            <li class="sidebar-item{{ (request()->is('all')) ? ' active' : '' }}">
              <a class="sidebar-link" href="{{ route('show') }}">
                <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
          <a class="sidebar-toggle d-flex">
            <i class="hamburger align-self-center"></i>
          </a>
        </nav>

        <main class="content">
          <div class="container-fluid p-0">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="container">
                      @yield('content')
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </main>

        <footer class="footer">
          <div class="container-fluid">
            <div class="row text-muted">
              <div class="col-6 text-start">
                <p class="mb-0">
                  <a href="index.html" class="text-muted"><strong>AdminKit Demo</strong></a> &copy;
                </p>
              </div>
              <div class="col-6 text-end">
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <a class="text-muted" href="#">Support</a>
                  </li>
                  <li class="list-inline-item">
                    <a class="text-muted" href="#">Help Center</a>
                  </li>
                  <li class="list-inline-item">
                    <a class="text-muted" href="#">Privacy</a>
                  </li>
                  <li class="list-inline-item">
                    <a class="text-muted" href="#">Terms</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script src="js/app.js"></script>

    <!-- Page level custom scripts -->
    @stack('custom_scripts')

  </body>
</html>