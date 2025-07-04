<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Aplikasi Manajemen Pegawai</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">

  <!-- [Favicon] icon -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
  <!-- [Tabler Icons] https://tablericons.com -->
  <link rel="stylesheet" href="{{asset('template/dist')}}/assets/fonts/tabler-icons.min.css">
  <!-- [Feather Icons] https://feathericons.com -->
  <link rel="stylesheet" href="{{asset('template/dist')}}/assets/fonts/feather.css">
  <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
  <link rel="stylesheet" href="{{asset('template/dist')}}/assets/fonts/fontawesome.css">
  <!-- [Material Icons] https://fonts.google.com/icons -->
  <link rel="stylesheet" href="{{asset('template/dist')}}/assets/fonts/material.css">
  <!-- [Template CSS Files] -->
  <link rel="stylesheet" href="{{asset('template/dist')}}/assets/css/style.css" id="main-style-link">
  <link rel="stylesheet" href="{{asset('template/dist')}}/assets/css/style-preset.css">
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
  <!-- Scripts -->
  @vite(['resources/js/app.js'])
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->
  <!-- [ Sidebar Menu ] start -->
  <x-sidebar></x-sidebar>
  <!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
  <x-header></x-header>
  <!-- [ Header ] end -->



  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <x-breadcrumbs></x-breadcrumbs>
      <!-- [ breadcrumb ] end -->
      <!-- [ Main Content ] start -->
      <div class="row">
        @if (session('success'))
        <div class="container">
          <div class="alert alert-success" id="success-alert" role="alert">
            {{session ('success')}}
          </div>
        </div>
        @endif

        @yield('content')
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->
  <x-footer></x-footer>
  <!-- jQuery dan DataTables -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>

  <script>
    $(document).ready(function() {
      new DataTable('#table');

      $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
        $("#success-alert").slideUp(500);
      });


    });
  </script>
  <!-- [Page Specific JS] start -->
  <script src="{{asset('template/dist')}}/assets/js/plugins/apexcharts.min.js"></script>
  <script src="{{asset('template/dist')}}/assets/js/pages/dashboard-default.js"></script>
  <!-- [Page Specific JS] end -->
  <!-- Required Js -->
  <script src="{{asset('template/dist')}}/assets/js/plugins/popper.min.js"></script>
  <script src="{{asset('template/dist')}}/assets/js/plugins/simplebar.min.js"></script>
  <script src="{{asset('template/dist')}}/assets/js/plugins/bootstrap.min.js"></script>
  <script src="{{asset('template/dist')}}/assets/js/fonts/custom-font.js"></script>
  <script src="{{asset('template/dist')}}/assets/js/pcoded.js"></script>
  <script src="{{asset('template/dist')}}/assets/js/plugins/feather.min.js"></script>





  <script>
    layout_change('light');
  </script>




  <script>
    change_box_container('false');
  </script>



  <script>
    layout_rtl_change('false');
  </script>


  <script>
    preset_change("preset-1");
  </script>


  <script>
    font_change("Public-Sans");
  </script>


  <!-- Bootstrap Bundle (with Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
<!-- [Body] end -->

</html>