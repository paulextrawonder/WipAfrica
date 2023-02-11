<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Administrative Dashboard</title>
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
              <div class="row">
                <div class="col-12">
                  <h2 class="dashboard__title mt-4">Dashboard</h2>
                  <div class="row">
                    <div class="col-lg-4 col-md-6 mt-3">
                      <div class="dashboard__card">
                        <div class="dashboard__text-box">
                          <p class="dashboard__text font-13">All Realtors</p>
                          <h2
                            class="dashboard__heading font-17"
                            style="line-height: 20px; margin-right: 10px"
                          >
                            {{$count['realtors'] ?? 0}}
                          </h2>
                        </div>
                        <div class="dashboard__icon-box">
                          <i class="material-icons dashboard__icon">group</i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                      <div class="dashboard__card">
                        <div class="dashboard__text-box">
                          <p class="dashboard__text font-13">
                            Pending Support Tickets
                          </p>
                          <h2
                            class="dashboard__heading font-17"
                            style="line-height: 20px; margin-right: 10px"
                          >
                            {{$count['supports'] ?? 0}}
                          </h2>
                        </div>
                        <div class="dashboard__icon-box">
                          <i class="material-icons dashboard__icon"
                            >phone_forwarded</i
                          >
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                      <div class="dashboard__card">
                        <div class="dashboard__text-box">
                          <p class="dashboard__text font-13">All Projects</p>
                          <h2
                            class="dashboard__heading font-17"
                            style="line-height: 20px; margin-right: 10px"
                          >
                            {{$count['projects'] ?? 0}}
                          </h2>
                        </div>
                        <div class="dashboard__icon-box">
                          <i class="material-icons dashboard__icon">business</i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                      <div class="dashboard__card">
                        <div class="dashboard__text-box">
                          <p class="dashboard__text font-13">Commission Paid</p>
                          <h2
                            class="dashboard__heading font-17"
                            style="line-height: 20px; margin-right: 10px"
                          >
                            NGN <span>{{number_format($count['commission'], 2) ?? 0}}</span>
                          </h2>
                        </div>
                        <div class="dashboard__icon-box">
                          <i class="material-icons dashboard__icon"
                            >account_balance_wallet</i
                          >
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                      <div class="dashboard__card">
                        <div class="dashboard__text-box">
                          <p class="dashboard__text font-13">Total sales</p>
                          <h2
                            class="dashboard__heading font-17"
                            style="line-height: 20px; margin-right: 10px"
                          >
                            {{$count['sales'] ?? 0}}
                          </h2>
                        </div>
                        <div class="dashboard__icon-box">
                          <i class="material-icons dashboard__icon"
                            >location_city</i
                          >
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                      <div class="dashboard__card">
                        <div class="dashboard__text-box">
                          <p class="dashboard__text font-13">Confirmed Payments</p>
                          <h2
                            class="dashboard__heading font-17"
                            style="line-height: 20px; margin-right: 10px"
                          >
                          {{number_format($count['confirmed_payments'], 2) ?? 0}}
                          </h2>
                        </div>
                        <div class="dashboard__icon-box">
                          <i class="material-icons dashboard__icon"
                            >account_balance</i
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mt-5">
                <h2 class="dashboard__title mb-2">Recent sales</h2>
                <div class="table-responsive mb-5">
                  <table
                    class="table table-striped table-hover"
                    id="tableExport"
                    style="width: 100%"
                  >
                    <thead>
                      <tr>
                        <th class="dashboard-table__heading">Project</th>
                        <th class="dashboard-table__heading">Client</th>
                        <th class="dashboard-table__heading">Amount Paid</th>
                        <th class="dashboard-table__heading">Date</th>
                        <th class="dashboard-table__heading">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($data as $data)
                      <tr>
                        <td class="dashboard-table__data">
                          <p
                            class="dashboard-table__text d-block font-weight-600 font-12"
                          >
                            <a href="single-project.html">
                              {{$data['sales']['estate_name']}} | {{$data['sales']['property_type']}}</a
                            >
                          </p>
                          <span class="dashboard-table__span font-11"
                            >{{$data['sales']['property_name']}} {{$data['sales']['property_type']}} | {{$data['sales']['no_of_unit']}} unit</span
                          >
                        </td>
                        <td class="dashboard-table__data">
                          <p
                            class="dashboard-table__text font-12 font-weight-600"
                          >
                          {{$data['sales']['client_full_name']}}
                          </p>
                          <span class="dashboard-table__span font-11">
                          {{$data['sales']['client_email']}} | {{$data['sales']['client_phone']}}</span
                          >
                        </td>
                        @foreach($data['payments'] as $key=>$data['payments'])
                        @if(++$key == 1)
                        <td class="dashboard-table__data">
                          <p class="dashboard-table__text font-weight-600">
                            NGN<span>{{$data['payments']['added_amount']}}</span>
                          </p>
                          <span
                            class="dashboard-table__span font-11 text-danger"
                            >{{$data['payments']['status']}}</span
                          >
                        </td>
                        <td class="dashboard-table__data">
                          <p
                            class="dashboard-table__text font-12 font-weight-600"
                          >
                          {{$data['payments']['created_at']->format('d, M, Y')}}
                          </p>
                          <span class="dashboard-table__span font-11"
                            > {{$data['payments']['created_at']->format('H:sa')}}</span
                          >
                        </td>
                        @endif
                        @endforeach

                        <td class="dashboard-table__data">
                          <a
                            href="/admin/sales/{{$data['sales']['id']}}/{{$data['sales']['user_id']}}"
                            class="btn btn-success font-weight-600 m-0 font-11"
                          >
                            View sales
                          </a>
                        </td>
                      </tr>
                      @empty
                    
                      @endforelse
                    </tbody>
                  </table>
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
