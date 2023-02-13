<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Account Password | Administrative Dashboard</title>
    @include('admin.include.header')

  </head>

  <body>
    <div class="loader"></div>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        @include('admin.include.top-nav')
        @include('admin.include.side-nav')
        <!-- Main Content -->
        <div class="main-content hd-100">
          <section class="section">
            <div class="section-body">
              <!-- add content here -->
              <div class="row mt-5 pb-4">
                <div class="col-lg-10 col-md-8 mx-md-auto">
                  <h6 class="heading__primary--h6 mt-large">Account Details</h6>
                  <div class="row mt-4">
                    <div class="col-xl-3 col-lg-3">
                      <center>
                        <img src="../../assets/img/logo.png" class="pro_pics" />
                      </center>
                    </div>
                    <div class="col-xl-8 col-lg-8 mx-auto mt-m-large">
                      <form action="{{route('adminChangePassword')}}" method="POST">
                        @csrf
                        <div class="form-group m-0 mb-3">
                          <label class="form__label">E-mail</label>
                          <input
                            type="email"
                            class="form-control"
                            name="email"
                            id="email"
                            readonly
                            value="{{Auth::guard('admin')->user()->email}}"
                            onblur="checkEmail(email)"
                          />
                          <small id="email__error" class="font-11"></small>
                        </div>
                        <div class="form-group m-0 mb-3">
                          <label class="form__label">Old Password</label>
                          <div style="position: relative">
                            <input
                              type="password"
                              class="form-control"
                              onblur="checkLength(pass2, 6, 25)"
                              id="password2"
                              placeholder=""
                              name="current_password"
                              value=""
                              required
                            />
                            <span
                              class="form__icon--eye"
                              style="bottom: 9px !important"
                              onclick="oldPassword()"
                            >
                              <i id="eye-open2" class="fas fa-eye"></i>
                              <i id="eye-close2" class="fas fa-eye-slash"></i>
                            </span>
                          </div>
                          <small
                            id="password__error2"
                            class="form-text text-muted"
                          ></small>
                        </div>

                        <div class="form-group m-0 mb-3">
                          <label class="form__label">New Password</label>
                          <div style="position: relative">
                            <input
                              type="password"
                              class="form-control"
                              onblur="checkLength(pass, 6, 25)"
                              id="password"
                              placeholder=""
                              name="password"
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
                          <small
                            id="password__error"
                            class="form-text text-muted"
                          ></small>
                        </div>
                        <div class="form-group m-0 mb-3">
                          <label
                            for="submit__form"
                            class="btn btn-primary w-100 bg-main"
                            >Save Changes</label
                          >
                          <input type="submit" id="submit__form" hidden />
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    @include('admin.include.script')
  </body>
</html>
