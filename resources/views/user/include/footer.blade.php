<footer class="footer">
      <p class="footer__text">
        <!-- <center>© {{date("Y")}} Wip Africa Business Network. All rights reserved.</center> -->
      </p>
    </footer>
<!-- General JS Scripts -->
 <script src="../../assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="../../assets/bundles/izitoast/js/iziToast.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="../../assets/js/page/toastr.js"></script>

    <!-- Page Specific JS File -->
    <script src="../../assets/bundles/datatables/datatables.min.js"></script>
    <script src="../../assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
    <script src="../../assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
    <script src="../../assets/bundles/datatables/export-tables/jszip.min.js"></script>
    <script src="../../assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
    <script src="../../assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
    <script src="../../assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
    <script src="../../assets/js/page/datatables.js"></script>
    <!-- Template JS File -->
    <script src="../../assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="../../assets/js/custom.js"></script>
    <script>
        $(function() {
        $( "form" ).submit(function() {
        $('#loader').show();
        });
        });
        </script>

    @if(isset($errors) && $errors->any())              
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
            title: 'Error',
            message: "{{$error}}",
            position: "topRight",
            });
        </script>
    @endforeach
    @endif

    @if(session()->has('success'))
    <script>
        iziToast.success({
        title: 'Success',
        message: "{{session()->get('success')}}",
        position: "topRight",
        });
    </script>
     @endif

     @if(session()->has('error'))
    <script>
        iziToast.error({
        title: 'Error',
        message: "{{session()->get('error')}}",
        position: "topRight",
        });
    </script>
     @endif

     @if(session()->has('warning'))
    <script>
        iziToast.warning({
        title: 'Warning',
        message: "{{session()->get('warning')}}",
        position: "topRight",
        });
    </script>
     @endif