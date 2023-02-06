<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Realtors Profile | Administrative Dashboard</title>
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
              <div class="row mt-4">
                <div class="col-12">
                  <a href="#" class="details__btn-back">&#60; Back</a>
                  <h2 class="dashboard__title mb-2">Realtor's Details</h2>
                  <div class="row">
                    <div class="col-xl-3 col-lg-3 mt-3">
                      <center>
                        <img src="{{asset('users/profile_pic')}}/{{$data['realtor']['profile_pic']}}" class="pro_pics" />
                      </center>
                    </div>
                    <div class="col-xl-8 col-lg-8 mx-auto mt-m-large mt-3">
                      <div class="details__card">
                        <span class="badge 
                        @if ($data['realtor']['is_active'])
                        badge-success
                        @else
                        badge-danger
                        @endif
                        mb-3">
                        @if ($data['realtor']['is_active'])
                        Active
                        @else
                        Blocked
                        @endif
                      </span>
                        <div class="details__text-box">
                          <p class="details__text details__text-bold font-14">
                            Realtor ID
                          </p>
                          <p class="details__text font-13">{{$data['realtor']['ref_code']}}</p>
                        </div>
                        <div class="details__text-box">
                          <p class="details__text details__text-bold font-14">
                            Full Name
                          </p>
                          <p class="details__text font-13">{{$data['realtor']['firt_name']}} {{$data['realtor']['last_name']}}</p>
                        </div>
                        <div class="details__text-box">
                          <p class="details__text details__text-bold font-14">
                            Email Address
                          </p>
                          <p class="details__text font-13">
                          {{$data['realtor']['email']}}
                          </p>
                        </div>
                        <div class="details__text-box">
                          <p class="details__text details__text-bold font-14">
                            Phone Number
                          </p>
                          <p class="details__text font-13">{{$data['realtor']['phone']}}</p>
                        </div>
                        <div class="details__text-box">
                          <p class="details__text details__text-bold font-14">
                            Number Of Sales
                          </p>
                          <p class="details__text font-13">--</p>
                        </div>
                        <div class="details__text-box">
                          <p class="details__text details__text-bold font-14">
                            Gender
                          </p>
                          <p class="details__text font-13">{{$data['realtor']['gender']}}</p>
                        </div>
                        <div class="details__text-box">
                          <p class="details__text details__text-bold font-14">
                            Date of Birth
                          </p>
                          <p class="details__text font-13">{{$data['realtor']['dob']}}</p>
                        </div>
                        <div class="details__text-box">
                          <p class="details__text details__text-bold font-14">
                            Street Address
                          </p>
                          <p class="details__text font-13">
                          {{$data['realtor']['address']}}
                          </p>
                        </div>
                        <div class="details__text-box">
                          <p class="details__text details__text-bold font-14">
                            State/Country
                          </p>
                          <p class="details__text font-13">{{$data['realtor']['state_of_residence']}}, {{$data['realtor']['country']}}</p>
                        </div>
                        <div class="details__text-box">
                          <p class="details__text details__text-bold font-14">
                            Identification document
                          </p>
                          <a
                            href="{{asset('users/identification')}}/{{$data['realtor']['identification']}}"
                            class="btn btn-success details__text font-14 text-white font-weight-600"
                            download
                            >Download ID</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mt-4">
                <div class="col-12">
                  <h2 class="dashboard__title mb-2">Account Details</h2>
                  <div class="details__card">
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Realtor's Account Name
                      </p>
                      <p class="details__text font-13">{{$data['realtor']['bank_beneficiary_name'] ?? 'NAN'}}</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Realtor's Bank Name
                      </p>
                      <p class="details__text font-13">{{$data['realtor']['bank_name'] ?? 'NAN'}}</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Realtor's Account Number
                      </p>
                      <p class="details__text font-13">{{$data['realtor']['bank_account_no'] ?? 'NAN'}}</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mt-4">
                <div class="col-12">
                  <h2 class="dashboard__title mb-2">Next Of Kin</h2>
                  <div class="details__card">
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Full Name
                      </p>
                      <p class="details__text font-13">{{$data['nok']['first_name'] ?? 'NAN'}} {{$data['nok']['last_name'] ?? NAN}}</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Email Address
                      </p>
                      <p class="details__text font-13">
                      {{$data['nok']['email'] ?? "NAN"}}
                      </p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Phone Number
                      </p>
                      <p class="details__text font-13">{{$data['nok']['phone'] ?? "NAN"}}</p>
                    </div>

                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Gender
                      </p>
                      <p class="details__text font-13">{{$data['nok']['gender'] ?? "NAN"}}</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Date Of Birth
                      </p>
                      <p class="details__text font-13">{{$data['nok']['dob'] ?? "NAN"}}</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Relationship
                      </p>
                      <p class="details__text font-13">{{$data['nok']['relationship'] ?? "NAN"}}</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Street Address
                      </p>
                      <p class="details__text font-13">
                      {{$data['nok']['address'] ?? "NAN"}}
                      </p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        State Of Residence
                      </p>
                      <p class="details__text font-13"> {{$data['nok']['state_of_residence'] ?? "NAN"}}</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Nationality
                      </p>
                      <p class="details__text font-13"> {{$data['nok']['nationality'] ?? "NAN"}}</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        State Of Origin
                      </p>
                      <p class="details__text font-13"> {{$data['nok']['state_of_origin'] ?? "NAN"}}</p>
                    </div>
                  </div>
                </div>
              </div>

             
              <div class="row mt-3 mb-5">
                <div class="col-12">
                  <h2 class="dashboard__title mb-2">Downlines</h2>
                  <div class="table-responsive mb-5">
                    <table
                      class="table table-striped table-hover"
                      id="save-stage"
                      style="width: 100%"
                    >
                      <thead>
                        <tr>
                          <th class="dashboard-table__heading">
                            Level 1 Downline
                          </th>
                          <th class="dashboard-table__heading">
                            Level 2 Downline
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @forelse($data['downlines'] as $downline)
                        <tr>
                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text font-12 font-weight-600"
                            >
                              {{$downline['first_level_downline']['first_name']}} {{$downline['first_level_downline']['last_name']}} 
                              <!-- | Sales
                              <span style="color: #458337">00</span> -->
                            </p>
                            <span class="dashboard-table__span font-11">
                            {{$downline['first_level_downline']['email']}} | {{$downline['first_level_downline']['phone']}}</span
                            >
                          </td>
                          @if($downline['second_level_downline'])
                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text font-12 font-weight-600"
                            >
                            {{$downline['second_level_downline']['first_name']}} {{$downline['second_level_downline']['last_name']}} 
                            <!-- | Sales
                              <span style="color: #458337">00</span> -->
                            </p>
                            <span class="dashboard-table__span font-11">
                            {{$downline['second_level_downline']['email']}} | {{$downline['second_level_downline']['phone']}}</span
                            >
                          </td>
                          @else
                          <td class="dashboard-table__data">Nil</td>
                          @endif
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
    @include('admin.include.script')

    <script>
      function wipConfirm2(message, messageDelete, messageCancel, id) {
        swal({
          title: "Are you sure?",
          text: message,
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {
            swal(messageDelete);
            window.location = `/admin/realtor/active/${id}`;
          } else {
            swal(messageCancel);
          }
        });
}
    </script>
  </body>
</html>
