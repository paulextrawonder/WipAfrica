<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Forgot-Password | WBN</title>
    @include('user.include.header')
    <link rel="stylesheet" href="../../assets/css/main.min.css" />
  </head>
  <body>
    <div class="login__container">
      <div class="login__container-img"></div>
      <div class="login__container-form">
        <img src="../../assets/img/logo.png" alt="" class="login__logo" />
        <h2 class="login__title">Forgot Password</h2>
       
        <form method="POST" action="{{ route('password.email') }}" class="form">
                        @csrf
          <div class="form__group">
            <label class="form__label">
              Enter Email Address associated with your Account to recieve a link
              to reset your password</label
            >
            <input
            name="email"
              type="email"
              placeholder="Enter Email Address"
              class="form__input"
            />
          </div>

          <div class="form__group d-flex-h-center">
            <label for="submit" class="main-btn main-btn-100"> CONTINUE </label>
            <input type="submit" class="form__input--submit" id="submit" />
          </div>
          <p class="form__label form__label--2 form__label--2-center">
            Don’t have an Account Yet?
            <a href="{{route('register')}}" class="label-link">Sign Up</a>
          </p>
        </form>
      </div>
      <img src="../../assets/img/form-bg.png" alt="" class="login__form-img" />
    </div>
    @include('user.include.footer')
    @if(session()->has('status'))
    <script>
        iziToast.success({
        title: 'Success',
        message: "{{session()->get('status')}}",
        position: "topRight",
        });
    </script>
     @endif
  </body>
</html>
