<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Onboarding | WBN</title>
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
    <header class="header">
      <a href="../public/index.html"
        ><img src="../../assets/img/logo.png" alt="" class="header__logo"
      /></a>
      <a href="#" class="header__btn">My Account</a>
    </header>
    <main class="main">
      <div class="inspection__container">
        <h2 class="inspection__title">Get Started</h2>
        <form method="POST" action="{{ route('register') }}" id="form">
         @csrf
          <div class="form__group" id="realtor-id">
            <label for="category" class="form__label">Referral ID</label>
            <input
            {{$ref_by ? "readonly":""}}
            type="text"
            class="form__input"
            name="ref_by"
            value="{{ $ref_by ? $ref_by : old('ref_by')}}"
            placeholder="wbn-****"
            />
            <p class="form__label form__label--2 color-red"></p>
          </div>
          <div class="form__group">
            <label for="first_name" class="form__label"> First Name</label>
            <input
              type="text"
              placeholder="Enter Your First Name"
              class="form__input form__input--reg"
              required
            />
          </div>
          <div class="form__group">
            <label for="last_name" class="form__label"> Last Name</label>
            <input
              type="text"
              placeholder="Enter Your Last Name"
              class="form__input form__input--reg"
              required
            />
          </div>
          <div class="form__group">
            <label for="middle_name" class="form__label">
              Middle Name (Optional)</label
            >
            <input
              type="text"
              placeholder="Enter Your Middle Name"
              class="form__input form__input--reg"
            />
          </div>
          <div class="form__group">
            <label for="email" class="form__label">Email</label>
            <input
              type="email"
              placeholder="example@gmail.com"
              class="form__input form__input--reg"
              required
            />
          </div>
          <div class="form__group">
            <label for="tel_number" class="form__label"> Phone Number</label>
            <input
              type="tel"
              placeholder="90 0000 000 00"
              class="form__input form__input--reg"
              required
            />
          </div>
          <div class="form__group">
            <label for="category" class="form__label"> Select Gender</label>
            <select
              name="gender"
              id="gender"
              class="form__input form__input--reg"
              required
            >
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="form__group">
            <label for="dob" class="form__label"
              >Date of Birth (Min. 18yrs)</label
            >
            <input
              type="date"
              class="form__input form__input--reg"
              name="dob"
              id="dob"
              onblur="checkDateOfBirth()"
              required
            />
          </div>
          <div class="form__group">
            <label for="address" class="form__label"> Street Address</label>
            <input
              type="text"
              placeholder="Example Street"
              class="form__input form__input--reg"
            />
          </div>
          <div class="form__group">
            <label for="state_country" class="form__label">
              State/Country</label
            >
            <input
              type="text"
              placeholder="Lagos, Nigeria"
              class="form__input form__input--reg"
            />
          </div>
          <div class="form__group">
            <label for="idcard" class="form__label">
              Upload Valid means of Identification</label
            >
            <input
              type="file"
              class="form__input form__input--reg"
              name="idcard"
              id="idcard"
              accept="image/*"
              style="border: none"
              required
            />
          </div>

          <div class="form__group d-flex-h-center">
            <button type="submit" class="main-btn" id="btn">CONTINUE</button>
          </div>
          <p class="form__label form__label--2 form__label--2-center">
            Already Have an Account?
            <a href="{{route('login')}}" class="label-link">Login Here</a>
          </p>
        </form>
      </div>
    </main>
    <footer class="footer">
      <p class="footer__text">
        © {{date("Y")}} Wip Africa Business Network. All rights reserved.
      </p>
    </footer>
  </body>
</html>
