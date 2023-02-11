<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Profile | WBN</title>
    @include('user.include.header')
  </head>

  <body>
    <div class="loader"></div>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('user.include.top-nav')
        @include('user.include.side-bar')

        <!-- Main Content -->
        <div class="main-content hd-100">
          <section class="section">
            <div class="section-body">
              <!-- add content here -->
              <div class="row pb-4 mt-4">
                <div class="col-lg-10 col-md-8 mx-md-auto p-0">
                  <h6 class="heading__primary--h6 mt-large">My Profile</h6>
                  <div class="row mt-4">
                    <div class="col-xl-3 col-lg-3">
                      <center>
                        <div class="form-group m-0 mt-2 p-0">
                          <div
                            id="image-preview"
                            class="image-preview pro_pics p-0"
                          >
                          <form action="{{route('user.changeProfilePic')}}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                              <label for="image-upload" id="image-label"
                                >Choose File</label
                              >
                              <input type="file" name="profile_pic" id="image-upload" accept="images/png, images/jpeg, images/jpg" required>
                            </div>
                          </div>

                          <button
                            class="btn btn-primary d-block m-0 bg-green mt-2 btn__upload"
                          >
                            Upload
                          </button>
                      </form>

                        <div class="form-group mt-3">
                          <label class="form__text">Referral Code</label>
                          <div class="input-group">
                            <input
                              type="text"
                              class="form-control border-yellow"
                              id="ref-link"
                              value="{{$user->ref_link}}"
                              aria-label=""
                              readonly
                            />
                            <div class="input-group-append">
                              <button
                                class="btn btn-primary bg-yellow"
                                onclick="refFunction()"
                                type="button"
                              >
                                <i class="fas fa-unlink"></i>
                              </button>
                            </div>
                          </div>
                          <small
                            class="copied d-block m-0 p-0"
                            id="ref-tooltip"
                          ></small>
                        </div>
                      </center>
                    </div>
                    <div class="col-xl-8 col-lg-8 mx-auto">
                      
                      <form action="{{route('user.saveProfile')}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group m-0 mb-3">
                          <label class="form__label">First Name</label>
                          <input
                            type="text"
                            class="form-control"
                            value="{{$user->first_name ? $user->first_name : old('first_name')}}"
                            name="first_name"
                            readonly
                          />
                        </div>
                        <div class="form-group m-0 mb-3">
                          <label class="form__label">Last Name</label>
                          <input
                            type="text"
                            class="form-control"
                            value="{{$user->last_name ? $user->last_name : old('last_name')}}"
                            name="last_name"
                          />
                        </div>
                        <div class="form-group m-0 mb-3">
                          <label class="form__label">Middle Name</label>
                          <input
                            type="text"
                            class="form-control"
                            value="{{$user->middle_name ? $user->middle_name : old('middle_name')}}"
                            name="middle_name"
                            readonly
                          />
                        </div>
                        <div class="form-group m-0 mb-3">
                          <label class="form__label">Gender</label>
                          <select
                            class="form-control"
                            name="gender"
                            readonly
                          >
                          @if($user->gender)
                          <option value="{{$user->gender}}" selected>{{$user->gender}}</option>
                          @else
                            <option value="" hidden>Gender</option>
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                          @endif
                          </select>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group m-0 mb-3">
                              <label class="form__label">E-mail</label>
                              <input
                                type="email"
                                class="form-control"
                                value="{{$user->email ? $user->email : old('email')}}"
                                name="email"
                                id="email"
                                onblur="checkEmail(email)"
                              />
                              <small id="email__error" class="font-11"></small>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group m-0 mb-3">
                              <label class="form__label">Phone Number</label>
                              <input
                                type="number"
                                class="form-control mobile-phone"
                                value="{{$user->phone ? $user->phone : old('phone')}}"
                                name="phone"
                                id="phone"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="form-group m-0 mb-3">
                          <label class="form__label">Street Address</label>
                          <input
                            type="tel"
                            class="form-control"
                            value="{{$user->address ? $user->address : old('address')}}"
                            name="address"
                          />
                        </div>
                        <div class="form-group m-0 mb-3">
                          <label class="form__label">State Of Residence</label>
                          <select class="form-control" name="state_of_residence">
                            @if($user->state_of_residence)
                            <option value="{{$user->state_of_residence}}" selected>{{$user->state_of_residence}}</option>
                            @endif
                            <option value="">--Select State--</option>
                            <option value="Abia">Abia</option>
                            <option value="Adamawa">Adamawa</option>
                            <option value="Akwa Ibom">Akwa Ibom</option>
                            <option value="Anambra">Anambra</option>
                            <option value="Bauchi">Bauchi</option>
                            <option value="Bayelsa">Bayelsa</option>
                            <option value="Benue">Benue</option>
                            <option value="Borno">Borno</option>
                            <option value="Cross River">Cross River</option>
                            <option value="Delta">Delta</option>
                            <option value="Ebonyi">Ebonyi</option>
                            <option value="Edo">Edo</option>
                            <option value="Ekiti">Ekiti</option>
                            <option value="Enugu">Enugu</option>
                            <option value="FCT">Federal Capital Territory</option>
                            <option value="Gombe">Gombe</option>
                            <option value="Imo">Imo</option>
                            <option value="Jigawa">Jigawa</option>
                            <option value="Kaduna">Kaduna</option>
                            <option value="Kano">Kano</option>
                            <option value="Katsina">Katsina</option>
                            <option value="Kebbi">Kebbi</option>
                            <option value="Kogi">Kogi</option>
                            <option value="Kwara">Kwara</option>
                            <option value="Lagos">Lagos</option>
                            <option value="Nasarawa">Nasarawa</option>
                            <option value="Niger">Niger</option>
                            <option value="Ogun">Ogun</option>
                            <option value="Ondo">Ondo</option>
                            <option value="Osun">Osun</option>
                            <option value="Oyo">Oyo</option>
                            <option value="Plateau">Plateau</option>
                            <option value="Rivers">Rivers</option>
                            <option value="Sokoto">Sokoto</option>
                            <option value="Taraba">Taraba</option>
                            <option value="Yobe">Yobe</option>
                            <option value="Zamfara">Zamfara</option>
                            
                          </select>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group m-0 mb-3">
                              <label class="form__label">Nationality</label>
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Nigeria"
                                name="nationality"
                                value="{{$user->nationality ? $user->nationality : 'Nigeria'}}"
                                readonly
                              />
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group m-0 mb-3">
                              <label class="form__label">State Of Origin</label>
                              <select
                                class="form-control"
                                name="state_of_origin">
                                @if($user->state_of_origin)
                                <option value="{{$user->state_of_origin}}">{{$user->state_of_origin}}</option>
                                @else
                                <option disabled selected>--Select State--</option>
                                <option value="Abia">Abia</option>
                                <option value="Adamawa">Adamawa</option>
                                <option value="Akwa Ibom">Akwa Ibom</option>
                                <option value="Anambra">Anambra</option>
                                <option value="Bauchi">Bauchi</option>
                                <option value="Bayelsa">Bayelsa</option>
                                <option value="Benue">Benue</option>
                                <option value="Borno">Borno</option>
                                <option value="Cross River">Cross River</option>
                                <option value="Delta">Delta</option>
                                <option value="Ebonyi">Ebonyi</option>
                                <option value="Edo">Edo</option>
                                <option value="Ekiti">Ekiti</option>
                                <option value="Enugu">Enugu</option>
                                <option value="FCT">Federal Capital Territory</option>
                                <option value="Gombe">Gombe</option>
                                <option value="Imo">Imo</option>
                                <option value="Jigawa">Jigawa</option>
                                <option value="Kaduna">Kaduna</option>
                                <option value="Kano">Kano</option>
                                <option value="Katsina">Katsina</option>
                                <option value="Kebbi">Kebbi</option>
                                <option value="Kogi">Kogi</option>
                                <option value="Kwara">Kwara</option>
                                <option value="Lagos">Lagos</option>
                                <option value="Nasarawa">Nasarawa</option>
                                <option value="Niger">Niger</option>
                                <option value="Ogun">Ogun</option>
                                <option value="Ondo">Ondo</option>
                                <option value="Osun">Osun</option>
                                <option value="Oyo">Oyo</option>
                                <option value="Plateau">Plateau</option>
                                <option value="Rivers">Rivers</option>
                                <option value="Sokoto">Sokoto</option>
                                <option value="Taraba">Taraba</option>
                                <option value="Yobe">Yobe</option>
                                <option value="Zamfara">Zamfara</option>
                                @endif
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="form-group m-0 mb-3">
                          <label
                            for="submit__form"
                            class="btn btn-primary w-100 bg-main">Save Changes</label>
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
    @include('user.include.footer')
    <script src="{{asset('assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
    <script src="{{asset('assets/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
    <script src="{{asset('assets/js/page/create-post.js')}}"></script>
  </body>
</html>
