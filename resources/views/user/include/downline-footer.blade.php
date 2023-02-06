            <div class="row">
                <div class="col-lg-12">
                  <div class="d-flex justify-content-between mt-3 mb-3">
                    <h6 class="heading__primary--h6">Recent Downlines</h6>
                    <a href="/realtor/downlines" class="heading__primary--span d-block">
                      View all</a
                    >
                  </div>
          
                 
                  <div class="row mb-4">         
                  @forelse($downlines as $downline)
                  
                    <div class="col-lg-4 col-md-4 mt-mobile">
                      <div class="downline__box">
                        <div class="d-flex align-items-center">
                          <div
                            class="profile__pics d-flex justify-content-center"
                          >
                           
                          <img
                       @if (config('app.env') == 'production')
                          src="{{asset('public/realtor_uploads/profile_pic/'.$user->profile_pic)}}"
                        @else
                          src="{{asset('realtor_uploads/profile_pic/'.$user->profile_pic)}}"
                        @endif
                          class="pro_pics"
                           id="profile__pics"
                        />
                        
                          </div>
                          <div class="ml-3">
                            <p class="downline__name">{{$downline->name}}</p>
                            <p class="downline__email">
                              {{$downline->email}}
                            </p>

                           @if($downline->badge == 'Active')
                            <span class="badge badge-success px-2 font-10 py-1 mt-1">{{$downline->badge}}</span>
                           @else
                            <span class="badge badge-danger px-2 font-10 py-1 mt-1">{{$downline->badge}}</span>
                            @endif
                          </div>
                        </div>
                        <div class="downline__hr"></div>
                        <div class="d-flex justify-content-between mt-2">
                          <p class="downline__sold">Sold Projects</p>
                          <p class="downline__sold">00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                          <p class="downline__sold">Last Sale</p>
                          <p class="downline__sold">null</p>
                        </div>
                        <p class="downline__tel">
                          +234 <span>{{$downline->phone}}</span>
                        </p>
                      </div>
                    </div>
                  @empty
                 
                    <div class="sale__box col-lg-4 col-md-5">
                      <div class="d-flex justify-content-between">
                        <img
                          src="../../assets/img/dashboard/flight.svg"
                          alt=""
                          class="sale__icon"
                        />
                        <p class="sale__text" style="color: #040f4f">
                          So Sorry, You do not have downlines yet
                        </p>
                      </div>
                    </div>
                  </div>
                  
                  @endforelse
                  <!-- The class .g-hidden hides any of the container -->

                  
                </div>
              </div>