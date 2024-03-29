<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Onboarding | WBN</title>
    @include('user.include.header')
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
    <header class="header">
      <a href="https://wipafricabusinessnetwork.com/"
        ><img src="../../assets/img/logo.png" alt="" class="header__logo"
      /></a>
      <a href="{{route('login')}}" class="header__btn">My Account</a>
    </header>
    <main class="main">
      <div class="inspection__container">
        <h2 class="inspection__title">Get Started</h2>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
          <div class="form__group" id="realtor-id">
            <label for="ref_by" class="form__label">Referral ID</label>
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
              name="first_name"
              placeholder="Enter Your First Name"
              class="form__input form__input--reg"
              value="{{old('first_name')}}"
              required
            />
          </div>
          <div class="form__group">
            <label for="last_name" class="form__label"> Last Name</label>
            <input
              type="text"
              name="last_name"
              placeholder="Enter Your Last Name"
              class="form__input form__input--reg"
              value="{{old('last_name')}}"
              required
            />
          </div>
          <div class="form__group">
            <label for="middle_name" class="form__label">
              Middle Name (Optional)</label
            >
            <input
              type="text"
              name="middle_name"
              placeholder="Enter Your Middle Name"
              class="form__input form__input--reg"
              value="{{old('middle_name')}}"
            />
          </div>
          <div class="form__group">
            <label for="email" class="form__label">Email</label>
            <input
              type="email"
              name="email"
              placeholder="example@gmail.com"
              class="form__input form__input--reg"
              value="{{old('email')}}"
              required
            />
          </div>
          <div class="form__group">
            <label for="tel_number" class="form__label"> Phone Number</label>
            <input
              type="tel"
              name="phone"
              placeholder="90 0000 000 00"
              class="form__input form__input--reg"
              value="{{old('phone')}}"
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
              value="{{old('dob')}}"
              required
            />
          </div>
          <div class="form__group">
            <label for="address" class="form__label"> Street Address</label>
            <input
              name="address"
              type="text"
              placeholder="Example Street"
              class="form__input form__input--reg"
              value="{{old('address')}}"
            />
          </div>
          <div class="form__group">
            <label for="state_country" class="form__label">
              State/Country of Residence</label
            >
            <input
              name="state_of_origin"
              type="text"
              placeholder="Lagos, Nigeria"
              class="form__input form__input--reg"
              value="{{old('state_of_origin')}}"
            />
          </div>
          <div class="form__group">
            <label for="password" class="form__label">
              Password</label
            >
            <div style="position: relative">
            <input
              name="password"
              type="password"
              placeholder="*******"
              class="form__input form__input--reg"
              onblur="checkLength(pass, 6, 25)"
              id="password"
              value=""
              required
            />
            <span
              class="form__icon--eye"
              style="bottom: 9px !important"
              onclick="togglePassword()"
            >
              <i id="eye-open" class="fas fa-eye"></i>
              <i id="eye-close" class="fas fa-eye-slash"></i>
            </span>
          </div>
          </div>
          <!-- <div class="form__group">
            <label for="idcard" class="form__label">
              Upload Valid means of Identification</label
            >
            <input
             name="identification"
              type="file"
              class="form__input form__input--reg"
              name="idcard"
              id="idcard"
              accept="image/*"
              style="border: none"
              value="identification"
              required
            />
          </div> -->

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
        <center>© {{date("Y")}} Wip Africa Business Network. All rights reserved.</center>
      </p>
    </footer>
 @include('user.include.footer')
 <script>
        $(function() {
        $( "form" ).submit(function() {
        $('#loader').show();
        });
        });
        </script>
</html>