<!DOCTYPE html>
<html lang="en" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
  <title> SMS </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/backend/assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/backend/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"> 
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/backend/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/backend/assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/backend/assets/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/backend/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/backend/assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/backend/assets/plugins/summernote/summernote-bs4.min.css')}}">


   <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/backend/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  
<!-- jQuery -->
<script src="{{asset('public/backend/assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Notify.js -->
<style type="text/css">
.notifyjs-corner{
  z-index: 10000 !important;
}  
</style>

<script src="{{asset('public/othersAssets/js/notify.min.js')}}"></script>
<script src="{{asset('public/othersAssets/js/notify.js')}}"></script>

<!-- sweetalert2 -->
<script src="{{asset('public/othersAssets/js/sweetalert.min.js')}}"></script>

<!-- Bootstrap 4 DatePicker -->
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>



<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('public/backend/assets/dist/img/SMS-Admin.png')}}" alt="SMS-Admin" height="60" width="60">
  </div>

  <!-- Navbar  header-->
    @include('admin.layouts.header')
  <!-- /.navbar -->




  <!-- Main Sidebar Container -->
   @include('admin.layouts.side-nav')
    <!--/ Main Sidebar Container -->





  <!-- Content Wrapper. Contains page content -->
@yield('content')

<!-- Notify.js -->
<!-- for success -->
@if(session()->has('success'))
<script type="text/javascript">
  $(function(){
    $.notify("{{session()->get('success')}}",{globalPosition:'top right',className:'success'});
  });
</script>
@endif

<!-- for error -->
@if(session()->has('error'))
<script type="text/javascript">
  $(function(){
    $.notify("{{session()->get('error')}}",{globalPosition:'top right',className:'error'});
  });
</script>
@endif
<!-- /Notify.js -->

  <!-- /.content-wrapper -->

  <!-- footer -->
 @include('admin.layouts.footer')
  <!-- /footer -->



  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->







<!-- jQuery -->
<!-- <script src="{{asset('public/backend/assets/plugins/jquery/jquery.min.js')}}"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/backend/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('public/backend/assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('public/backend/assets/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('public/backend/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/backend/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/backend/assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('public/backend/assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/backend/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/backend/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('public/backend/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/backend/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backend/assets/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/backend/assets/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/backend/assets/dist/js/pages/dashboard.js')}}"></script>


<!-- DataTables  & Plugins -->
<script src="{{asset('public/backend/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/backend/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/backend/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/backend/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/backend/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/backend/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/backend/assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('public/backend/assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('public/backend/assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('public/backend/assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/backend/assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('public/backend/assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- jquery-validation -->
<script src="{{asset('public/backend/assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('public/backend/assets/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- /DataTables  & Plugins -->


<!-- Image reader -->
<script type="text/javascript">
  
  $(document).ready(function(){
   $('#image').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e){
      $('#showImage').attr('src',e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
   });
  });
</script>
<!-- /Image reader -->

<!-- sweetalert2 -->
<script type="text/javascript">
  $(function(){
    $(document).on('click','#delete',function(e){
      // alert('okay');
      e.preventDefault();
      var link = $(this).attr("href")
      // sweetalert code
      Swal.fire({
      title: 'Are you sure?',
      text: "You want to delete this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link;
          Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
         )
        }
     })
// sweetalert code
    });
  });
</script>
<!-- /sweetalert2 -->


</body>
</html>
