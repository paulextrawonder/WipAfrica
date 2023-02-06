<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | WBN</title>
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
  </head>
  <body>
    <div class="login__container">
      <div class="login__container-img"></div>
      <div class="login__container-form">
        <img src="../../assets/img/logo.png" alt="" class="login__logo" />
        <h2 class="login__title">Log in to your dashboard</h2>
        <form action="#" class="form">
          <div class="form__group">
            <label class="form__label"> Email Address</label>
            <input
              type="email"
              placeholder="Enter Email Address"
              class="form__input"
            />
          </div>
          <div class="form__group">
            <label class="form__label">Password</label>
            <input
              type="password"
              placeholder="Enter Your Password"
              class="form__input"
            />
          </div>
          <div class="form__group d-flex-h-center">
            <label for="submit" class="main-btn main-btn-100"> CONTINUE </label>
            <input type="submit" class="form__input--submit" id="submit" />
          </div>
          <p class="form__label form__label--2 form__label--2-center">
            Don’t have an Account Yet?
            <a href="#" class="label-link">Register Here</a>
          </p>
          <p class="form__label form__label--2 form__label--2-center">
            <a href="#" class="label-link">Forgot Password</a>
          </p>
        </form>
      </div>
      <img src="../../assets/img/form-bg.png" alt="" class="login__form-img" />
    </div>
    <footer class="footer">
      <p class="footer__text">
        © 2022 Wip Africa Business Network. All rights reserved.
      </p>
    </footer>
  </body>
</html>
