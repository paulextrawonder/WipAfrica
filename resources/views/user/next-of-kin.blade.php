<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Account Details | WBN</title>
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
              <div class="row mt-5 pb-4">
                <div class="col-lg-10 col-md-8 mx-md-auto">
                  <h6 class="heading__primary--h6 mt-large">Next Of Kin</h6>
                  <div class="row mt-4">
                    <div class="col-xl-3 col-lg-3">
                    
                      <center>
                        <img src="{{asset('users/profile_pic/'.$key_data->profile_pic)}}" class="pro_pics" />
                      </center>
                    </div>
                    <div class="col-xl-8 col-lg-8 mx-auto mt-m-large">
                      <form action="{{route('user.updateNextOfKin')}}" method="POST">
                        @csrf
                        <div class="form-group m-0 mb-3">
                          <label class="form__label">First Name</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="First Name"
                            name="first_name"
                            id="realtorName"
                            onblur="checkRealtorName(nameError)"
                            value="{{$kin ? $kin->first_name : old('first_name')}}"
                            required
                          />
                          <small id="name__error" class="font-11"></small>
                        </div>
                        <div class="form-group m-0 mb-3">
                          <label class="form__label">Last Name</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Last Name"
                            name="last_name"
                            id="last_name"
                            onblur="checkLastName(nameError2)"
                            value="{{$kin ? $kin->last_name : old('last_name')}}"
                            required
                          />
                          <small id="name__error2" class="font-11"></small>
                        </div>
                        <div class="form-group m-0 mb-3">
                          <label class="form__label">Middle Name</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Middle Name"
                            name="middle_name"
                            value="{{$kin ? $kin->middle_name : old('middle_name')}}"
                          />
                        </div>
                        <div class="form-group m-0 mb-3">
                          <label class="form__label">Gender</label>
                          <select class="form-control" name="gender" required>
                            @if($kin && $kin->gender)
                            <option value="{{$kin->gender}}" selected>{{strtoupper($kin->gender)}}</option>
                            @endif
                            <option value="" hidden>Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            
                          </select>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group m-0 mb-3">
                              <label class="form__label">E-mail</label>
                              <input
                                type="email"
                                class="form-control"
                                placeholder="example@gmail.com"
                                name="email"
                                id="email"
                                onblur="checkEmail(email)"
                                value="{{$kin ? $kin->email : old('email')}}"
                                required
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
                                placeholder="Mobile Number"
                                name="phone"
                                id="phone"
                                value="{{$kin ? $kin->phone : old('phone')}}"
                                required
                              />
                              <span id="error-msg" class="hide font-11"></span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group m-0 mb-3">
                          <label class="form__label"
                            >Relationship (His/her relationship to you)</label
                          >
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Brother, Sister or Aunt etc."
                            name="relationship"
                            value="{{$kin ? $kin->relationship : old('relationship')}}"
                            required
                          />
                        </div>

                        <div class="form-group m-0 mb-3">
                          <label class="form__label">Date of Birth</label>
                          <input
                            type="date"
                            class="form-control"
                            name="dob"
                            id="dob"
                            onblur="checkDateOfBirth()"
                            value="{{$kin ? $kin->dob : old('dob')}}"
                            required
                          />
                          <small id="date__error" class="font-11"></small>
                        </div>
                        <div class="form-group m-0 mb-3">
                          <label class="form__label">Street Address</label>
                          <input
                            type="tel"
                            class="form-control"
                            placeholder="20 Example Street"
                            name="address"
                            value="{{$kin ? $kin->address : old('address')}}"
                            required
                          />
                        </div>
                        <div class="form-group m-0 mb-3">
                          <label class="form__label">State of Residence</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="State of residence"
                            name="state_of_residence"
                            value="{{$kin ? $kin->state_of_residence : old('state_of_residence')}}"
                            required
                          />
                        </div>
                        <div class="form-group m-0 mb-3">
                          <label class="form__label">Nationality</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="State of residence"
                            name="nationality"
                            value="{{$kin ? $kin->nationality : old('nationality')}}"
                            required
                          />
                        </div>

                        <div class="form-group m-0 mb-3">
                          <label class="form__label">State of Origin</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="State of residence"
                            name="state_of_origin"
                            value="{{$kin ? $kin->state_of_origin : old('state_of_origin')}}"
                            required
                          />
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
        @include('user.include.footer')
  </body>
</html>
