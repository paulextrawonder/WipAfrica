<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Reset | WBN</title>
    @include('user.include.header')
    <link rel="stylesheet" href="../../assets/css/main.min.css" />
  </head>
  <body>
    <div class="login__container">
      <div class="login__container-img"></div>
      <div class="login__container-form">
        <img src="../../assets/img/logo.png" alt="" class="login__logo" />
        <h2 class="login__title">Log in to your dashboard</h2>

        <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
          <div class="form__group">
            <label class="form__label"> Email Address</label>
            <input
              name="email"
              type="email"
              class="form__input  @error('email') is-invalid @enderror"
              value="{{ old('email') }}"
              readonly
              required
            />
          </div>
          <div class="form__group">
            <label class="form__label">Password</label>
            <input
              name="password"
              type="password"
              placeholder="Enter Your Password"
              class="form__input  @error('password') is-invalid @enderror"
              required
            />
          </div>
          <div class="form__group">
            <label class="form__label">Confirm Password</label>
            <input
              name="password_confirmation"
              type="password"
              placeholder="Confirm Password"
              class="form__input  @error('password') is-invalid @enderror"
              required
            />
          </div>
          <div class="form__group d-flex-h-center">
            <label for="submit" class="main-btn main-btn-100"> RESET PASSWORD </label>
            <input type="submit" class="form__input--submit" id="submit" />
          </div>
         
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
