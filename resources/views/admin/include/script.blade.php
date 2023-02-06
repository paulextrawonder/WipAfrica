<!-- General JS Scripts -->
<script src="{{asset('assets/js/app.min.js')}}"></script>
<script src="{{asset('assets/bundles/sweetalert/sweetalert.min.js')}}"></script>
<!-- JS Libraies -->
<script src="{{asset('assets/bundles/izitoast/js/iziToast.min.js')}}"></script>
<!-- Page Specific JS File -->
<script src="{{asset('assets/js/page/toastr.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/bundles/datatables/export-tables/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/bundles/datatables/export-tables/jszip.min.js')}}"></script>
<script src="{{asset('assets/bundles/datatables/export-tables/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/bundles/datatables/export-tables/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/bundles/datatables/export-tables/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/page/datatables.js')}}"></script>
<!-- Template JS File -->
<script src="{{asset('assets/js/scripts.js')}}"></script>
<!-- Custom JS File -->
<script src="{{asset('assets/js/custom.js')}}"></script>

            <!-- Swiper JS -->
            <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <!-- Custom JS File -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script>
      var swiper = new Swiper(".project__swiper", {
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
          renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + "</span>";
          },
        },
      });
    </script>

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

     <script>
      function confirmDeleteModal(alertMessage, yesMessage, noMessage, route) {
        swal({
          title: "Are you sure?",
          text: alertMessage,
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {
            swal(yesMessage);
            window.location = `${route}`;
          } else {
            swal(noMessage);
          }
        });
}
    </script>