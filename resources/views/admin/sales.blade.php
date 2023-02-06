<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sales | Administrative Dashboard</title>
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
              <div class="row mt-3 mb-5">
                <h2 class="dashboard__title mb-2 pl-3">All Sales</h2>
                <div class="col-12">
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
                          <th class="dashboard-table__heading">Realtor</th>
                          <th class="dashboard-table__heading">
                            Payments Status
                          </th>
                          <th class="dashboard-table__heading">View Sales</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $sale)
                        <tr>
                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text d-block font-weight-600 font-12"
                            >
                            {{$sale['sales']->estate_name}} | {{$sale['sales']->property_type}}
                            </p>
                            <span class="dashboard-table__span font-11"
                              >{{$sale['sales']->property_name}} {{$sale['sales']->property_type}}</span
                            >
                          </td>

                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text font-12 font-weight-600"
                            >
                            {{$sale['sales']->client_full_name}}
                            </p>
                            <span class="dashboard-table__span font-11">
                            {{$sale['sales']->client_email}} | {{$sale['sales']->client_phone}}</span
                            >
                          </td>
                          <td class="dashboard-table__data">
                            <p class="dashboard-table__text font-12">
                            {{$sale['sales']->realtor_first_name}} {{$sale['sales']->realtor_last_name}}
                            </p>
                            <span class="dashboard-table__span font-11">
                              Ref-Code : {{$sale['sales']->realtor_ref_code}}</span
                            >
                          </td>
                          <td
                            class="dashboard-table__data 
                            @if($sale['sales']['pending_conf'] > 0)
                           bg-brown
                           @else
                           bg-success
                          @endif
                            text-white text-center font-11"
                          >
                          @if($sale['sales']['pending_conf'] > 0)
                           <span class="badge badge-danger">{{$sale['sales']['pending_conf']}}</span> Pending Confimation
                           @else
                           All Payments confirmed
                          @endif
     
                          </td>

                          <td class="dashboard-table__data">
                            <a
                              href="/admin/sales/{{$sale['sales']['id']}}/{{$sale['sales']['user_id']}}"
                              class="btn btn-success font-weight-600 m-0 font-11"
                            >
                              View Sale
                            </a>
                          </td>
                        </tr>
                       @endforeach
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
  </body>
</html>
