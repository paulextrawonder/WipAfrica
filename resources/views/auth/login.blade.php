<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login | WBN</title>
    @include('user.include.header')
    <link rel="stylesheet" href="../../assets/css/main.min.css" />
  </head>
  <body>
    <div class="login__container">
      <div class="login__container-img"></div>
      <div class="login__container-form">
        <img src="../../assets/img/logo.png" alt="" class="login__logo" />
        <h2 class="login__title">Log in to your dashboard</h2>

        <form method="POST" action="{{ route('login') }}">
        @csrf
          <div class="form__group">
            <label class="form__label"> Email Address</label>
            <input
              name="email"
              type="email"
              placeholder="Enter Email Address"
              class="form__input  @error('email') is-invalid @enderror"
              value="{{ old('email') }}"
            />
          </div>
          <div class="form__group">
            <label class="form__label">Password</label>
            <input
              name="password"
              type="password"
              placeholder="Enter Your Password"
              class="form__input  @error('password') is-invalid @enderror"
            />
          </div>
          <div class="form__group d-flex-h-center">
            <label for="submit" class="main-btn main-btn-100"> CONTINUE </label>
            <input type="submit" class="form__input--submit" id="submit" />
          </div>
          <p class="form__label form__label--2 form__label--2-center">
            Don’t have an Account Yet?
            <a href="{{ route('register') }}" class="label-link">Register Here</a>
          </p>
          <p class="form__label form__label--2 form__label--2-center">
            <a href="{{ route('password.request') }}" class="label-link">Forgot Password</a>
          </p>
        </form>
      </div>
      <img src="../../assets/img/form-bg.png" alt="" class="login__form-img" />
    </div>
    <footer class="footer">
      <p class="footer__text">
        <center>© {{date("Y")}} Wip Africa Business Network. All rights reserved.</center>
      </p>
    </footer>
    @include('user.include.footer')
  </body>
</html>
