<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Commissions | Administrative Dashboard</title>
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
            <form action="{{route('payCommission')}}" method="POST">
              @csrf
            <div class="section-body">
              <!-- add content here -->
              <div class="row mt-3 mb-5">
                <h2 class="dashboard__title pl-3">Commissions</h2>

                <div class="col-12">
                  <div class="d-flex justify-content-end">
                    <button
                      class="btn btn-success font-weight-600 m-0 font-11"
                      data-toggle="modal"
                      data-target="#commision-detail"
                    >
                      Mark Completed
                    </button>
                  </div>
                  <div class="table-responsive mb-5">
                    <table
                      class="table table-striped table-hover"
                      id="tableExport"
                      style="width: 100%"
                    >
                      <thead>
                        <tr>
                          <th class="text-center">
                            <div
                              class="custom-checkbox custom-checkbox-table custom-control"
                            >
                             <input
                                type="checkbox"
                                data-checkboxes="mygroup"
                                data-checkbox-role="dad"
                                class="custom-control-input"
                                id="checkbox-all"
                               
                              />
                              <label
                                for="checkbox-all"
                                class="custom-control-label"
                                >&nbsp;</label
                              >
                            </div>
                          </th>
                          <th class="dashboard-table__heading">Project</th>
                          <th class="dashboard-table__heading">
                            Client / Realtor
                          </th>
                          <th class="dashboard-table__heading">
                            Realtor Account Info
                          </th>
                          <!-- <th class="dashboard-table__heading">Client Paid</th> -->
                          <th class="dashboard-table__heading">Commission</th>
                          <th class="dashboard-table__heading">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($commissions as $key=>$commission)
                        <tr>
                          <input type="hidden" name="ids[]" value="{{$commission['id']}}">
                          <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                              <input
                                type="checkbox"
                                data-checkboxes="mygroup"
                                class="custom-control-input"
                                id="checkbox-{{++$key}}"
                                name="check[]"
                              />
                              <label
                                for="checkbox-{{$key}}"
                                class="custom-control-label"
                                >&nbsp;</label
                              >
                            </div>
                          </td>
                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text d-block font-weight-600 font-12"
                            >
                              <a href="single-project.html">
                                {{$commission->estate_name}} | {{$commission->property_type}}</a
                              >
                            </p>
                            <span class="dashboard-table__span font-11"
                              >{{$commission->property_name}} {{$commission->property_type}}</span
                            >
                          </td>

                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text font-12 font-weight-600"
                            >
                            {{$commission->client_full_name}}
                            </p>
                            <span class="dashboard-table__span font-12"
                              >Realtor - {{$commission->first_name}} {{$commission->last_name}}</span
                            >
                          </td>
                          <td class="dashboard-table__data pt-4">
                            <span class="dashboard-table__span font-12">
                              Account No: {{$commission->bank_account_no ?? 'NULL'}} <br />
                              Account Name: {{$commission->bank_beneficiary_name ?? 'NULL'}} <br />
                              Bank: {{$commission->bank_name ?? 'NULL'}}
                            </span>
                          </td>

                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text font-11 font-weight-600"
                            >
                            {{$commission->commission_type}}
                            </p>
                            <span class="dashboard-table__span font-11">
                            {{$commission->commission}}% | ₦{{number_format($commission->commission_amount)}}</span
                            >
                            <p class="dashboard-table__text font-11">
                              Client Paid: ₦{{number_format($commission->amount_paid)}}
                            </p>
                          </td>
                          <td class="dashboard-table__data">
                            @if($commission->status == 'Pending')
                            <div class="badge badge-danger">{{$commission->status}}</div>
                            @else
                            <div class="badge badge-success">{{$commission->status}}</div>
                            @endif
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    @include('admin.include.script')
  </body>
</html>
