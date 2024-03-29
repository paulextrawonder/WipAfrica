<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Projects | WBN</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
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
              <div class="row mt-4 pb-4">
                <div class="col-lg-8 col-md-7 p-0">
                  <a
                    href="/user/property"
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
                    <div class="project__details--body" style="text-align: justify; font-size:12px">
                      {!! $property->description !!} <br /><br />
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
                        <p class="project__info--text">NGN{{number_format($property->amount)}}</p>
                      </div>
                      <div class="d-group">
                        <h6 class="project__info--heading">Down Payment</h6>
                        <p class="project__info--text">NGN{{number_format($property->down_payment)}}</p>
                      </div>
                      <div class="d-group">
                        <h6 class="project__info--heading">
                          Interest Free Installment Months
                        </h6>
                        <p class="project__info--text">{{$property->interest_free_months}} Months</p>
                      </div>
                      <div class="d-group">
                        <h6 class="project__info--heading">Commission</h6>
                        <p class="project__info--text">{{$property->commission}}%</p>
                      </div>
                      <div class="d-group">
                        <h6 class="project__info--heading">Account Name</h6>
                        <p class="project__info--text">{{$sett->account_name}}</p>
                      </div>
                      <div class="d-group">
                        <h6 class="project__info--heading">Account Number</h6>
                        <p class="project__info--text">{{$sett->account_no}}</p>
                      </div>
                      <div class="d-group">
                        <h6 class="project__info--heading">Bank Name</h6>
                        <p class="project__info--text">{{$sett->bank_name}}</p>
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
        @include('user.include.footer')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <!-- Custom JS File -->
    <script src="../../assets/js/custom.js"></script>
    <script>
      var swiper = new Swiper(".project__swiper", {
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
          renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + "</span>";
          },
        },
      });
    </script>
  </body>
</html>
