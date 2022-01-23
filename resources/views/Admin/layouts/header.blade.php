<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png')}}">
  <title>
    سرب -  @yield('title')
  </title>

  <script src="https://use.fontawesome.com/3859c5f1d0.js"></script>
  <link rel="stylesheet" href="{{ asset('datatables/jquery.dataTables.min.css')}}" />    <!--  dataTable الرئيسي المغلق -->
  <link rel="stylesheet" href="{{ asset('datatables/buttons.dataTables.min.css')}}" />   <!--  زر جدول dataTable الرئيسي المغلق -->
  <script src="{{ asset('datatables/jquery-3.6.0.min.js')}}"></script>                       <!--  جدول dataTable الرئيسي js -->
    <script src="{{ asset('datatables/jquery.dataTables.min.js')}}"></script>            <!--  جدول dataTable الرئيسي js -->
    <script src="{{ asset('datatables/dataTables.buttons.min.js')}}"></script>           <!--  زر جدول dataTable js الرئيسي -->
    <script src="{{ asset('datatables/jszip.min.js')}}"></script>
    <script src="{{ asset('datatables/buttons.html5.min.js')}}"></script>          <!--  تصدير وظيفة js -->
    {{-- <script src="{{ asset('datatables/buttons.flash.min.js')}}"></script>          <!--  تصدير وظيفة js --> --}}
    <script src="{{ asset('datatables/pdfmake.min.js')}}"></script>               <!--  تصدير وظيفة js -->
    <script src="{{ asset('datatables/vfs_fonts.js')}}"></script>               <!--  تصدير وظيفة js -->
    <script src="{{ asset('datatables/buttons.print.min.js')}}"></script>       <!--  تصدير وظيفة js -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400&display=swap" rel="stylesheet">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.0.0')}}" rel="stylesheet" />
  <link id="pagestyle" href="{{ asset('assets/css/ar.css')}}" rel="stylesheet" />
  @stack('custom-css')
</head>
<body class="g-sidenav-show rtl bg-gray-200">

