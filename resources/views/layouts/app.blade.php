<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ $title ?? config('app.name') }} | Mulfi Collection</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

  @stack('style')
</head>

<body id="page-top" class="{{ $url == 'pos' || $url == 'dashboard' ? 'sidebar-toggled' : '' }}">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('component.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('component.header')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{!! $title !!}</h1>
          </div>

          @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      @include('component.footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" style="line-height:1.5">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          {{ Form::open(['route' => 'logout', 'method' => 'post']) }}
          {{ Form::button('<i class="fas fa-sign-out-alt mr-2"></i> Logout', ['type' => 'submit', 'class' => 'btn btn-primary']) }}
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('sbadmin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('sbadmin/js/sb-admin-2.min.js') }}"></script>

  {{-- Datatable --}}
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"> </script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"> </script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"> </script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"> </script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"> </script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"> </script>

  <script src="{{ asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  {{-- sweetaler --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    .dt-button,
    .swal2-confirm.swal2-styled,
    .swal2-cancel.swal2-styled {
      background-color: #E83E8C;
      /* Green */
      border: none;
      color: white;
      padding: 0.5rem 2rem;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin-bottom: 2rem;
      border-radius: 5px;
      transition: 0.3s
    }

    .dt-button:hover,
    .swal2-confirm.swal2-styled:hover {
      background-color: #E83E8C;
    }

    .buttons-columnVisibility {
      background-color: #343A40;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4)
    }

    .buttons-columnVisibility:hover {
      background-color: #22272c;
    }

    .accent-navy .page-item.active .page-link,
    .accent-navy .page-item.active a {
      background-color: #E83E8C !important;
      border-color: #E83E8C;
      color: #fff;
      ;
    }
  </style>

  <script>
    $(document).ready(function(){
          $('#datatable-normal').DataTable();
          $('#datatable-simple').DataTable({
              aLengthMenu: [
                  [25, 50, 100, 200, -1],
                  [25, 50, 100, 200, "All"]
              ],
              iDisplayLength: -1,
              "bInfo" : false,
              "paging": false,
              "ordering": false,
              "searching": true
          });
          $("#datatable").DataTable({
              "responsive": true,
              "autoWidth": false,
              dom: 'Bfrtip',
              buttons: [{
                      extend: 'print',
                      exportOptions: {
                          columns: ':visible'
                      }
                  }, {
                      extend: 'copyHtml5',
                      exportOptions: {
                          columns: ':visible'
                      }
                  },
                  {
                      extend: 'excelHtml5',
                      exportOptions: {
                          columns: ':visible'
                      }
                  },
                  {
                      extend: 'pdfHtml5',
                      exportOptions: {
                          columns: ':visible'
                      }
                  },
                  'colvis'
              ],
              columnDefs: [{
                  visible: false
              }]
          });

          $(".datatable").DataTable({
              "responsive": true,
              "autoWidth": false,
              dom: 'Bfrtip',
              buttons: [{
                      extend: 'print',
                      exportOptions: {
                          columns: ':visible'
                      }
                  }, 
                  {
                      extend: 'excelHtml5',
                      exportOptions: {
                          columns: ':visible'
                      }
                  },
                  'colvis'
              ],
              columnDefs: [{
                  visible: false
              }]
          });

          $('.delete').on('click', function(e) {
              e.preventDefault();

              Swal.fire({
                  title: 'Yakin ingin menghapus data ini?',
                  text: "Data yang berakitan akan ikut terhapus juga",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Ya, hapus ini',
                  cancelButtonText: 'Tidak'
              }).then((result) => {
                  if (result.value) {
                      $(this).parents('form:first').submit();
                  }
              });
          });

          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          @if(session('status'))
          Toast.fire({
            icon: 'success',
            title: '{{ session("status") }}'
          })
          @endif

          @if(session('salah'))
          Toast.fire({
            icon: 'error',
            title: '{{ session("salah") }}'
          })
          @endif

          @php
          Session::forget('salah');
          Session::forget('status');
          @endphp
      });
  </script>
  @stack('script')
</body>

</html>