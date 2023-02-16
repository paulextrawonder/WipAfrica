<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Projects | WBN</title>
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
                <div class="col-lg-12 col-md-12">
                  <h6 class="heading__primary--h6">All Projects</h6>
                  <div class="row">
                    <!-- Project Item Starts -->
                    @forelse ($properties as $property )
                      
                    <div class="col-lg-4 col-md-6 mt-4">
                      <div class="project__item">
                        <img
                          src="{{asset('properties/slider/'.$property->image_1)}}"
                          alt=""
                          class="project__thumbnail"
                        />
                        <div class="project__content-box">
                          <h6 class="project__heading">{{$property->property_name}} {{$property->property_type}}</h6>
                        </div>
                        <span class="project__estates">{{$property->estate_name}}</span>
                        <div class="project__content-box">
                          <h6 class="project__heading">Total Amount</h6>
                          <p class="project__paragraph">
                            NGN<span>{{number_format($property->amount)}}</span>
                          </p>
                        </div>
                        <div class="project__content-box">
                          <h6 class="project__heading">Commission</h6>
                          <p class="project__paragraph">
                            <span>{{$property->commission}}%</span>
                          </p>
                        </div>
                        <div class="project__content-box">
                          <h6 class="project__heading">Initial Deposit</h6>
                          <p class="project__paragraph">
                            NGN<span>{{number_format($property->down_payment)}}</span>
                          </p>
                        </div>
                        <div class="project__content-box">
                          <h6 class="project__heading">Location</h6>
                          <p class="project__paragraph">{{$property->location}}</p>
                        </div>
                        <div
                          class="project__content-box d-flex justify-content-center"
                        >
                          <a
                            href="/user/property-{{$property->id}}"
                            class="btn__project text-success"
                          >
                            View More
                          </a>
                        </div>
                      </div>
                    </div>
                    @empty
                      'No available property at the moment'
                    @endforelse
                    <!-- Project Item Ends -->
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
