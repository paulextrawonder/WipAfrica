<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Upload Projects | Administrative Dashboard</title>

    <link
      rel="stylesheet"
      href="{{asset('assets/bundles/summernote/summernote-bs4.css')}}"
    />
    <link
      rel="stylesheet"
      href="{{asset('assets/bundles/jquery-selectric/selectric.css')}}"
    />

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
              <a
                href="/user/property"
                class="heading__primary--h6 project__back-btn"
                ><i class="fas fa-angle-left"></i>&nbsp; Back to Projects</a
              >
              <h2 class="dashboard__title mb-2 pl-3 mt-4">Upload Project</h2>
              <div class="row mt-3 pb-5">
                <div class="col-10 mx-auto">
                  <form action="{{route('adminCreateProperty')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group m-0 mb-3">
                          <label class="form__label"
                            >Upload Slides Image 1</label
                          >
                          <input
                            type="file"
                            class="form-control"
                            name="image_1"
                            required
                            value="{{old('image_1')}}"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group m-0 mb-3">
                          <label class="form__label"
                            >Upload Slides Image 2</label
                          >
                          <input
                            type="file"
                            class="form-control"
                            name="image_2"
                            value="{{old('image_2')}}"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group m-0 mb-3">
                          <label class="form__label"
                            >Upload Slides Image 3</label
                          >
                          <input
                            type="file"
                            class="form-control"
                            name="image_3"
                            value="{{old('image_3')}}"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group m-0 mb-3">
                          <label class="form__label"
                            >Upload Slides Image 4</label
                          >
                          <input
                            type="file"
                            class="form-control"
                            name="image_4"
                            value="{{old('image_4')}}"
                            required
                          />
                        </div>
                      </div>
                    </div>

                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Estate Name</label>
                      <input
                        type="text"
                        class="form-control"
                        name="estate_name"
                        value="{{old('estate_name')}}"
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Upload Estate Logo</label>
                      <input
                        type="file"
                        class="form-control"
                        name="estate_logo"
                        value="{{old('estate_logo')}}"
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Location</label>
                      <input type="text" class="form-control" name="location" value="{{old('location')}}" required />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Project Type</label>
                      <select class="form-control" name="property_type" value="{{old('property_type')}}" required>
                        <option value="apartment">Apartment</option>
                        <option value="land">Land</option>
                      </select>
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Project Name/Title</label>
                      <input
                        type="text"
                        class="form-control"
                        name="property_name"
                        value="{{old('property_name')}}"
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Total Price</label>
                      <input
                        type="text"
                        class="form-control"
                        name="amount"
                        value="{{old('amount')}}"
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Down Payment</label>
                      <input
                        type="text"
                        class="form-control"
                        name="down_payment"
                        value="{{old('down_payment')}}"
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label"
                        >Interest Free Installment Months</label
                      >
                      <select class="form-control" name="interest_free_months" required>
                        <option value="">Choose</option>
                        <option value="3">3 Months</option>
                        <option value="4">4 Months</option>
                        <option value="5">5 Months</option>
                        <option value="6">6 Months</option>
                        <option value="7">7 Months</option>
                        <option value="8">8 Months</option>
                        <option value="9">9 Months</option>
                        <option value="10">10 Months</option>
                        <option value="11">11 Months</option>
                        <option value="12">12 Months</option>
                        <option value="24">24 Months</option>
                      </select>
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Commission %</label>
                      <input
                        type="number"
                        class="form-control"
                        name="commission"
                        value="{{old('commission')}}"
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label"
                        >Upload Project Flyers (Multiple)</label
                      >
                      <input
                        type="file"
                        class="form-control"
                        name="flier"
                        value="{{old('flier')}}"
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Upload Project Brochure</label>
                      <input
                        type="file"
                        class="form-control"
                        name="brochure"
                        value="{{old('brochure')}}"
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Upload Prospect Form</label>
                      <input
                        type="file"
                        class="form-control"
                        name="form"
                        value="{{old('form')}}"
                      />
                    </div>
                    <!-- <div class="form-group m-0 mb-3">
                      <label class="form__label">About Project</label>
                      <textarea
                        class="form-control"
                        name="description"
                        value="{{old('description')}}"
                        style="height: 150px !important"
                        required
                      ></textarea>
                    </div> -->

                      <div class="inbox-reply mt-5">
                          <div class="form-group mb-4">
                            <label class="form__label">Project Description</label>
                            <textarea
                              class="summernote-simple"
                              name="description"
                              required
                            >{{old('description')}}</textarea>
                          </div>
                          <div class="form-group m-0 mb-3">           
                          </div>
                      </div>

                    <div class="form-group m-0 mb-3">
                      <label
                        for="submit__form"
                        class="btn btn-primary w-100 bg-main"
                        >Upload Project</label
                      >
                      <input type="submit" id="submit__form" hidden />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    @include('admin.include.script')
        <!-- JS Libraies -->
        <script src="{{asset('assets/bundles/summernote/summernote-bs4.js')}}"></script>
    <script src="{{asset('assets/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
    <script src="{{asset('assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
    <script src="{{asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('assets/js/page/create-post.js')}}"></script>
    <script src="{{asset('assets/js/page/chat.js')}}"></script>
  </body>
</html>
