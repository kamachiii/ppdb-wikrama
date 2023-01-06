<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-00R8F6D0PD"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-00R8F6D0PD');
  </script>
  <title>{{ $title }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- CSS Libraries -->
  {{-- <link rel="stylesheet" href="../../node_modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="../../node_modules/summernote/dist/summernote-bs4.css"> --}}
  <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/dataTables/css/datatables-bootstrap.min.css') }}"/>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


  <!-- Template CSS -->
  <link rel="stylesheet" href="../../../assets/admin/css/style.css">
  <link rel="stylesheet" href="../../../assets/admin/css/components.css">
  <link rel="stylesheet" href="../../../assets/admin/css/progres.css">
  <link rel="stylesheet" href="../../../assets/admin/css/card.css">

  <link href="" rel='shortcut icon'>

</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      @include('partials.navbar')
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">PPDB 2022-2023</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">{{ $title }}</li>
              <li class="nav-item dropdown @if($title == 'Dashboard') {{ 'active' }} @endif">
                <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i><span>Dashboard</span></a>
              </li>
              <li class="nav-item dropdown @if($title == 'Payment') {{ 'active' }} @endif">
                <a href="{{ route('payment') }}"><i class="fas fa-money-bill"></i> <span>Pembayaran</span></a>
              </li>
            </ul>
        </aside>
      </div>

      <div class="main-content">
        <section class="content">
          <section class="section">
            <div class="section-header">
                <h1>@if(Auth::user()->is_admin == 0) {{ 'Student' }} @else {{ 'Administrator' }} @endif</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">@if($title == 'Dashboard') <a href="{{ route('dashboard') }}">Dashboard</a> @else <a href="{{ route('payment') }}">Payment</a> @endif</div>
                </div>
            </div>
            <div class="section-body">
                <h3 class="section-title">@if($title == 'Dashboard') Hi, {{ Auth::user()->name }}! @else Pembayaran @endif</h3>
                <span style="position: relative; bottom: 20px; left: 45px;">@if($title == 'Dashboard') Selamat datang @else Silahkan upload bukti bayar anda di form berikut @endif</span>
            </div>
            @yield('content')
          </section>
        </section>
      </div>
      </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"><a>PPLG SMK Wikrama Bogor</a></div>
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ url('assets/admin/js/stisla.js')}}"></script>

  <!-- JS Libraies -->
  {{-- <script src="{{ url('assets/admin/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script> --}}
  {{-- <script src="{{ url('assets/admin/node_modules/chart.js/dist/Chart.min.js')}}"></script> --}}
  {{-- <script src="{{ url('assets/admin/node_modules/owl.carousel/dist/owl.carousel.min.js')}}"></script> --}}
  {{-- <script src="{{ url('assets/admin/node_modules/summernote/dist/summernote-bs4.js')}}"></script>
  <script src="{{ url('assets/admin/node_modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- Template JS File -->
  <script src="{{ url('assets/admin/js/scripts.js')}}"></script>
  <script src="{{ url('assets/admin/js/custom.js')}}"></script>
  <script src="{{ url('assets/admin/js/newCustom.js')}}"></script>
@yield('asset_footer')

</body>
</html>
