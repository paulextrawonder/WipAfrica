<!DOCTYPE html>
<html lang="en">
  <head>
  <title>My Dashboard | WBN</title>
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
              <div class="row mt-2">
                <div class="col-lg-8 col-md-8">
                  <div class="row mt-3 px-3">
                    <div class="col-md-12 pr-0 pl-0">
                      <div class="card bg__secondary">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-9">
                              <h4 class="mb-1 text-title">Welcome {{Auth::user()->first_name}},</h4>
                              <p class="text-muted mb-1 text-primary">
                                <i
                                  >Share the work, share the wealth, and enjoy
                                  the freedom lifestyle</i
                                >
                              </p>
                            </div>
                            <div class="col-3 position-relative">
                              <img
                                src="../../assets/img/welcome.png"
                                alt="Welcome"
                                height="120rem"
                                style="
                                  position: absolute;
                                  bottom: -1.25rem;
                                  right: 0.5rem;
                                "
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row px-3 mt-0">
                    <div class="col-lg-4 col-md-6 mt-2 pr-0 pl-0">
                      <div class="wallet__card">
                        <div class="wallet__icon-box">
                          <i class="far fa-newspaper wallet__icon"></i>
                        </div>
                        <div class="wallet__text-box">
                          <p class="wallet__title">
                            Amount Earned <span>&#8605;</span>
                          </p>
                          <h3 class="wallet__amount">NGN {{number_format($data['amount_earned'], 2) ?? 0}}</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-2 pr-0 pl-md-3 pl-0">
                      <div class="wallet__card">
                        <div class="wallet__icon-box">
                          <i class="far fa-money-bill-alt wallet__icon"></i>
                        </div>
                        <div class="wallet__text-box">
                          <p class="wallet__title">
                            Paid Commission <span>&#8605;</span>
                          </p>
                          <h3 class="wallet__amount">NGN {{number_format($data['paid_commission'], 2) ?? 0}}</h3>
                        </div>
                      </div>
                    </div>
                    <div
                      class="col-lg-4 col-md-6 mt-2 pr-0 pl-lg-3 pl-md-0 pl-0"
                    >
                      <div class="wallet__card">
                        <div class="wallet__icon-box">
                          <i class="far fa-building wallet__icon"></i>
                        </div>
                        <div class="wallet__text-box">
                          <p class="wallet__title">
                            Available Projects<span>&#8605;</span>
                          </p>

                          <h3 class="wallet__amount">{{$properties->count()}}</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="row mt-3">
                    <div class="col-lg-12">
                      <div class="profile__box">
                        <div class="profile__pics-box">
                          <img
                            src="{{asset('users/profile_pic/'.$key_data->profile_pic)}}"
                            alt="Pics"
                            class="profile__pics"
                          />
                        </div>
                        <p class="profile__name font-14">{{Auth::user()->first_name}}  {{Auth::user()->last_name}}</p>
                        <p class="profile__type font-12">Realtor</p>
                        <p
                          class="profile__id mt-2 mb-0 p-0 w-70"
                          style="overflow: hidden"
                        >
                          REF-CODE:
                          <span
                            class="mr-1 profile__span"
                            style="overflow: hidden"
                            >{{Auth::user()->ref_code}}</span
                          ><i
                            class="far fa-clone profile__icon"
                            onclick="refFunction()"
                          ></i>
                        </p>
                        <small
                          class="copied d-block m-0 p-0"
                          id="ref-tooltip"
                        ></small>
                        <input
                          type="text"
                          id="ref-link"
                          value="{{Auth::user()->ref_link}}"
                          hidden
                        />
                        <div
                          class="d-flex justify-content-between profile__stat mt-3"
                        >
                          <div class="profile__stat--box">
                            <p class="profile__stat--box-h1">00</p>
                            <p class="profile__stat--box-p">sales</p>
                          </div>
                          <div class="profile__stat--box">
                            <p class="profile__stat--box-h1">00</p>
                            <p class="profile__stat--box-p">Downlines</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mt-3 mb-5">
                <div class="col-12">
                  <h2 class="dashboard__title mb-2">Recent Projects On Sale</h2>
                  <div class="table-responsive mb-5">
                    <table
                      class="table table-striped table-hover"
                      id="save-stage"
                      style="width: 100%"
                    >
                      <thead>
                        <tr>
                          <th class="dashboard-table__heading">Project Logo</th>
                          <th class="dashboard-table__heading">Project</th>
                          <th class="dashboard-table__heading">Total Amount</th>
                          <th class="dashboard-table__heading">
                            Initial Deposit
                          </th>
                          <th class="dashboard-table__heading">% Commission</th>
                          <!-- <th class="dashboard-table__heading">Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($properties as $property)
                        <tr>
                          <td>
                            <img
                              alt="image"
                              src="{{asset('properties/logo/'.$property->estate_logo)}}"
                              class="rounded-circle"
                              width="50"
                              height="50"
                              style="object-fit: cover !important"
                              data-toggle="tooltip"
                              title="Wildan Ahdian"
                            />
                          </td>
                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text d-block font-weight-600 font-12"
                            >
                              <a href="/user/property-{{$property->id}}">
                                {{$property->estate_name}} | {{$property->property_type}}</a
                              >
                            </p>
                            <span class="dashboard-table__span font-11"
                              >{{$property->property_name}} {{$property->property_type}}</span
                            >
                          </td>

                          <td class="dashboard-table__data">
                            <p class="dashboard-table__text font-weight-600">
                              {{$property->amount}}
                            </p>
                          </td>
                          <td class="dashboard-table__data">
                            <p class="dashboard-table__text font-weight-600">
                             {{$property->down_payment}}
                            </p>
                          </td>
                          <td class="dashboard-table__data">
                            <p class="dashboard-table__text font-weight-600">
                              {{$property->commission}}%
                            </p>
                          </td>
                        </tr>
                       @empty
                       @endforelse
                      </tbody>
                    </table>
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
