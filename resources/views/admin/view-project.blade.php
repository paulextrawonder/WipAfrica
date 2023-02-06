<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Projects | Administrative Dashboard</title>
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
              <div class="row mt-4 pb-4">
                <div class="col-lg-8 col-md-7 p-0">
                  <a
                    href="/admin/project"
                    class="heading__primary--h6 project__back-btn"
                    ><i class="fas fa-angle-left"></i>&nbsp; Back to Projects</a
                  >
                  <div class="project__slide">
                    <div
                      style="
                        --swiper-navigation-color: #fff;
                        --swiper-pagination-color: #fff;
                      "
                      class="project__swiper swiper position-relative project__slider2 mt-3"
                    >
                      <div class="swiper-wrapper">
                        <div class="swiper-slide project__swiper-slide">
                          <img
                            src="{{asset('properties/slider/'.$property->image_1)}}"
                          />
                        </div>
                        <div class="swiper-slide project__swiper-slide">
                          <img
                            src="{{asset('properties/slider/'.$property->image_2)}}"
                          />
                        </div>
                        <div class="swiper-slide project__swiper-slide">
                          <img
                            src="{{asset('properties/slider/'.$property->image_3)}}"
                          />
                        </div>
                        <div class="swiper-slide project__swiper-slide">
                          <img
                            src="{{asset('properties/slider/'.$property->image_4)}}"
                          />
                        </div>
                      </div>
                      <div class="swiper-pagination"></div>
                    </div>
                  </div>
                  <div class="project__details">
                    <div class="project__details--heading">More Details</div>
                    <div class="project__details--body">
                      Direct cash ready clients <br /><br />{{$property->description}} <br /><br />
                    </div>
                    <a
                      href="{{asset('properties/form/'.$property->form)}}"
                      class="btn btn-success m-0 bg-main smm-btn ml-3 mb-3 mr-4 project__details--btn"
                      download
                    >
                      Download Prospect Form
                    </a>
                    <button
                      class="btn btn-primary"
                      style="display: none"
                    ></button>
                  </div>
                </div>

                <div class="col-lg-4 col-md-5 project__info">
                  <div class="project__filter-box">
                    <div class="project__title-box">
                      <p class="project__title-heading">Project Details</p>
                    </div>
                    <div class="project__info-box">
                      <div class="d-group">
                        <h6 class="project__info--heading">Estate Name</h6>
                        <p class="project__info--text">{{$property->estate_name}}</p>
                      </div>
                      <div class="d-group">
                        <h6 class="project__info--heading">Location</h6>
                        <p class="project__info--text">{{$property->location}}</p>
                      </div>
                      <div class="d-group">
                        <h6 class="project__info--heading">Project Type</h6>
                        <p class="project__info--text">{{$property->property_type}}</p>
                      </div>
                      <div class="d-group">
                        <h6 class="project__info--heading">Project Info</h6>
                        <p class="project__info--text">{{$property->property_name}}</p>
                      </div>
                      <div class="d-group">
                        <h6 class="project__info--heading">Total Price</h6>
                        <p class="project__info--text">{{$property->amount}}</p>
                      </div>
                      <div class="d-group">
                        <h6 class="project__info--heading">Down Payment</h6>
                        <p class="project__info--text">NGN{{$property->down_payment}}</p>
                      </div>
                      <div class="d-group">
                        <h6 class="project__info--heading">
                          Interest Free Installment Months
                        </h6>
                        <p class="project__info--text">{{$property->interest_free_months}} Months</p>
                      </div>
                      <div class="d-group">
                        <h6 class="project__info--heading">Commission</h6>
                        <p class="project__info--text">NGN{{$property->commission}}</p>
                      </div>
                      <div class="d-group">
                        <h6 class="project__info--heading">Account Name</h6>
                        <p class="project__info--text">WIP AFRICA</p>
                      </div>
                      <div class="d-group">
                        <h6 class="project__info--heading">Account Number</h6>
                        <p class="project__info--text">0102938394</p>
                      </div>
                      <div class="d-group">
                        <h6 class="project__info--heading">Bank Name</h6>
                        <p class="project__info--text">Access Bank</p>
                      </div>
                    </div>
                  </div>
                  <div class="project__filter-box">
                    <div class="project__title-box">
                      <p class="project__title-heading">
                        Download Project Materials
                      </p>
                    </div>
                    <div class="project__info-box">
                      <div class="attachment-mail">
                        <div class="row m-0">
                          <div class="col-md-12 m-0">
                            <a
                              class="name"
                              href="{{asset('properties/slider/'.$property->image_1)}}"
                              download
                            >
                              IMG_001.png
                            </a>
                          </div>
                          <div class="col-md-12">
                            <a
                              class="name"
                              href="{{asset('properties/slider/'.$property->image_2)}}"
                              download
                            >
                              IMG_002.png
                            </a>
                          </div>
                          <div class="col-md-12">
                            <a
                              class="name"
                              href="{{asset('properties/slider/'.$property->image_3)}}"
                              download
                            >
                              IMG_003.png
                            </a>
                          </div>
                          <div class="col-md-12">
                            <a
                              class="name"
                              href="{{asset('properties/slider/'.$property->image_4)}}"
                              download
                            >
                              IMG_004.png
                            </a>
                          </div>
                        </div>
                      </div>
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
