<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Upload Projects | Administrative Dashboard</title>
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
                href="/admin/project"
                class="heading__primary--h6 project__back-btn"
                ><i class="fas fa-angle-left"></i>&nbsp; Back to Projects</a
              >
              <h2 class="dashboard__title mb-2 pl-3 mt-4">Updating {{$property->estate_name}}</h2>
              <div class="row mt-3 pb-5">
                <div class="col-10 mx-auto">
                  <form action="{{route('adminUpdateProperty', ['id'=>$property->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id" value="{{$property->id}}">
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
                        value="{{$property->estate_name ?? old('estate_name')}}"
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Upload Estate Logo</label>
                      <input
                        type="file"
                        class="form-control"
                        name="estate_logo"
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Location</label>
                      <input type="text" class="form-control" name="location" value="{{$property->location ?? old('location')}}" required />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Project Type</label>
                      <select class="form-control" name="property_type" required>
                      @if($property->property_type) 
                      <option value="{{$property->property_type}}">{{Str::ucfirst($property->property_type)}}</option>
                      @endif
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
                        value="{{$property->property_name ?? old('property_name')}}"
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Total Price</label>
                      <input
                        type="text"
                        class="form-control"
                        name="amount"
                        value="{{$property->amount ?? old('amount')}}"
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Down Payment</label>
                      <input
                        type="text"
                        class="form-control"
                        name="down_payment"
                        value="{{$property->down_payment ?? old('down_payment')}}"
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label"
                        >Interest Free Installment Months</label
                      >
                      <select class="form-control" name="interest_free_months" required>
                      @if($property->interest_free_months) 
                      <option value="{{$property->interest_free_months}}">{{Str::ucfirst($property->interest_free_months)}} Months</option>
                      @endif
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
                        value="{{$property->commission ?? old('commission')}}"
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
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">About Project</label>
                      <textarea
                        class="form-control"
                        name="description"
                        style="height: 150px !important"
                        required
                      >
                      {{$property->description ?? old('description')}}
                    </textarea>
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label
                        for="submit__form"
                        class="btn btn-primary w-100 bg-main"
                        >Update Project</label
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
  </body>
</html>
