<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"> <!--nuevo -->
    <link rel="stylesheet" href="{{url('assets/css/admin.css')}}">


    <title>Qr-services</title>

</head>
<body>
  <nav class="navbar navbar-expand-sm py-2">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img class="logo" src="{{ url('assets/imgs/logosena.png') }}" width="45"></a>
      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->
      <input type="checkbox" id="toggler">
      <Label for="toggler"><i class="navbar-toggler-icon"></i></Label>
      <div class="menu navbar-collapse" id="navbarNav">
        <ul class="list navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('fichas.index') }}">Fichas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('users.admin.profile') }}">Contacto</a>
            </li>
            <li class="nav-item ml-auto">
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger me-md-2">Cerrar sesión</button>
              </form>
            </li>
          </ul>
      </div>
    </div>
  </nav>
<div class="container mt-4 mb-4 ">
    @yield('content')
    <!-- <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Informacion general</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-file-shield-alt"></i>
                        <span class="text">Total facturas</span>
                        <span class="number">12</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-file-check-alt"></i>
                        <span class="text">Facturas enviadas</span>
                        <span class="number">11</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-file-times-alt"></i>
                        <span class="text">Facturas sin enviar</span>
                        <span class="number">11</span>
                    </div>
                </div>
            </div>

            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Biometric</span>
            </div>


            <div class="info-biometric">
              <div class="info-parrafo">
               <p>
                   Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                   Natus quaerat voluptatum explicabo sapiente sequi quam asperiores 
                   ex earum ea saepe tempore similique facere distinctio temporibus,
                   aut laboriosam ipsam, animi quos!
                   Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                   Natus quaerat voluptatum explicabo sapiente sequi quam asperiores 
                   ex earum ea saepe tempore similique facere distinctio temporibus,
                   aut laboriosam ipsam, animi quos!
                </p>
              </div>  
                <img  src="{{ url('assets/imgs/ilsData.svg') }}" width="300" alt="">
            </div>    
        </div> -->
</div>

<!--nuevo -->
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function () {
          $('table.display').DataTable();
      });

      $(document).ready(function () {
          $('#myTable').DataTable();
      });

    </script>
</html>