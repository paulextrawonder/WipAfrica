<!DOCTYPE html>
<html lang="en">
  <head>
  <link
      rel="stylesheet"
      href="../../assets/bundles/izitoast/css/iziToast.min.css"
    />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New Password | WBN</title>
    <link
      href="https://cdn.jsdelivr.net/npm/mc-datepicker/dist/mc-calendar.min.css"
      rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../assets/css/main.min.css" />

    <style>
    #loader {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    background: rgba(0,0,0,0.85) url("{{asset('assets/img/loader.gif')}}") no-repeat center center;
    z-index: 99999;
}
    </style>

  </head>
  <body>
  <div id='loader'></div>
    <div class="login__container">
      <div class="login__container-img"></div>
      <div class="login__container-form">
        <img src="../../assets/img/logo.png" alt="" class="login__logo" />
        <h2 class="login__title login__title--primary">Email Confirmation</h2>
        <div class="email-card">
          <p class="form__label form__label--2 form__label--2-center">
            An e-mail has been sent to your mail, kindly click the link in your
            mail to proceed
          </p>

          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
          <button type="submit" class="main-btn main-btn-100">Resend Email</button>
          </form>
        </div>
      </div>
      <img src="../../assets/img/form-bg.png" alt="" class="login__form-img" />
    </div>
    <footer class="footer">
      <p class="footer__text">
        © 2022 Wip Africa Business Network. All rights reserved.
      </p>
    </footer>
    <!-- General JS Scripts -->
    <script src="../../assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="../../assets/bundles/izitoast/js/iziToast.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="../../assets/js/page/toastr.js"></script>
    <!-- Template JS File -->
    <script src="../../assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="../../assets/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.0.0-rc.1/cropper.min.js"></script>
  </body>
</html>

<script>
        $(function() {
        $( "form" ).submit(function() {
        $('#loader').show();
        });
        });
        </script>

    @if(session('resent'))
    <script>
        iziToast.success({
        title: 'Success',
        message: "A refresh token has been sent to you mail.",
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
