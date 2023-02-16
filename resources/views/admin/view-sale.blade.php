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
                <a
                  href="sales.html"
                  class="heading__primary--h6 project__back-btn"
                  ><i class="fas fa-angle-left"></i>&nbsp; Back to Sales</a
                >
                <div class="col-12">
                  <h6 class="dashboard__title mt-4 mb-2">Client Details</h6>
                  <div class="details__card">
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Client's Full Name
                      </p>
                      <p class="details__text font-13">{{$data['sales']['client_full_name']}}</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Client's Email Address
                      </p>
                      <p class="details__text font-13">
                      {{$data['sales']['client_email']}}
                      </p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Client's Phone Number
                      </p>
                      <p class="details__text font-13">{{$data['sales']['client_phone']}}</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Gender
                      </p>
                      <p class="details__text font-13">{{$data['sales']['client_gender']}}</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Project
                      </p>
                      <p class="details__text font-13">
                        {{$data['sales']['estate_name']}} | {{$data['sales']['project_type']}} | {{$data['sales']['project_name']}}
                      </p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Number of Units
                      </p>
                      <p class="details__text font-13">{{$data['sales']['no_of_units']}} Units</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Project Price Total
                      </p>
                      <p class="details__text font-13">NGN{{number_format($data['sales']['total_price'])}}</p>
                    </div>

                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Amount Paid So Far
                      </p>
                      <p class="details__text font-13">NGN{{number_format($data['sales']['total_amount_paid'])}}</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Total Payment Balance
                      </p>
                      <p class="details__text font-13">NGN{{number_format($data['sales']['balance_to_be_paid'])}}</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Download Client's Form
                      </p>
                      <a
                        href="{{asset('properties/client_form')}}/{{$data['sales']['client_form']}}"
                        class="btn btn-success details__text font-12 text-white font-weight-600"
                        download
                        >Download Form</a
                      >
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <h6 class="dashboard__title mt-4 mb-2">Realtors Details</h6>
                  <div class="details__card">
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Realtor's Full Name
                      </p>
                      <p class="details__text font-13">{{$data['realtor']['first_name']}} {{$data['realtor']['last_name']}}</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Realtor's Email Address
                      </p>
                      <p class="details__text font-13">
                        {{$data['realtor']['email']}}
                      </p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Realtor's Phone Number
                      </p>
                      <p class="details__text font-13">{{$data['realtor']['phone']}}</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Account Number
                      </p>
                      <p class="details__text font-13">{{$data['realtor']['bank_account_no']}}</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Bank Name
                      </p>
                      <p class="details__text font-13">{{$data['realtor']['bank_name']}}</p>
                    </div>
                    <div class="details__text-box">
                      <p class="details__text details__text-bold font-14">
                        Account Name
                      </p>
                      <p class="details__text font-13">{{$data['realtor']['bank_beneficiary_name']}}</p>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <h6 class="dashboard__title mt-4 mb-2">All Payments</h6>
                  <div class="table-responsive mb-5">
                    <table
                      class="table table-striped table-hover"
                      id="tableExport"
                      style="width: 100%"
                    >
                      <thead>
                        <tr>
                          <th class="dashboard-table__heading">
                            Amount/Commission
                          </th>
                          <th class="dashboard-table__heading">
                            Payment Proof
                          </th>
                          <th class="dashboard-table__heading">Date</th>
                          <!-- <th class="dashboard-table__heading">Commission</th> -->
                          <th class="dashboard-table__heading">
                            Confirm Payment
                          </th>
                          <th class="dashboard-table__heading">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data['payments'] as $payment)
                        <tr>
                        <form action="{{route('confirmSale')}}" method="POST">
                          @csrf
                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text d-block font-weight-600 font-12"
                            >
                              NGN<span>{{number_format($payment['added_amount'])}}</span>
                            </p>
                            <span class="dashboard-table__span font-11"
                              >Commission <span>({{$payment['commission']}}%)</span> |
                              <span>NGN{{number_format($payment['commission_amount'])}}</span></span
                            >
                          </td>

                          <td class="dashboard-table__data">
                            <a
                              href="{{asset('properties/payment_proof')}}/{{$payment['payment_proof']}}"
                              class="btn btn-success font-weight-600 m-0 font-11"
                              download
                            >
                              Download Proof
                            </a>
                          </td>
                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text font-12 font-weight-600"
                            >
                            {{$payment['created_at']->format('d M, Y')}}
                             </p>
                            <span class="dashboard-table__span font-11"
                              >{{$payment['created_at']->format('h:sa')}}</span
                            >
                          </td>
                          <td class="dashboard-table__data">
                            <input type="hidden" name="payment_id" value="{{$payment['id']}}">
                            <input type="hidden" name="user_id" value="{{$data['realtor']['id']}}">
                            <input type="hidden" name="commission" value="{{$payment['commission']}}">
                            <input type="hidden" name="commission_amount" value="{{$payment['commission_amount']}}">
                            <div class="d-flex">
                              <select
                                class="form-control font-12"
                                name="action"
                                id="sales_commission"
                                @if($payment['status'] == 'Confirmed')
                                disabled
                                @endif
                              >
                              @if($payment['status'] == 'Confirmed')
                              <option value="Confirmed">Confirm</option>
                                @endif
                                <option value="Pending">Pending</option>
                                <option value="Confirmed">Confirm</option>
                                <option value="Declined">Decline</option>
                              </select>
                              <button type="submit" class="btn btn-toolbar ml-2 p-2">
                                ✓
                              </button>
                             </div>
                          </td>
                          <td
                          @if($payment['status'] == 'Pending')
                            class="dashboard-table__data bg-brown text-white text-center font-11"
                          @elseif ($payment['status'] == 'Confirmed')
                          class="dashboard-table__data bg-success text-white text-center font-11"
                          @else
                          class="dashboard-table__data bg-danger text-white text-center font-11"
                          @endif
                            id="sales__commission_status"
                          >
                          {{$payment['status']}}
                          </td>
                        </form>
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
