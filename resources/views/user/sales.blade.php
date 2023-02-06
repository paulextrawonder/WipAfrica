<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sales | WBN</title>
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
              <h6
                class="heading__primary--h6 mt-large mt-4"
                style="color: #1d2b12"
              >
                Sales
              </h6>
              <div class="row">
                <div class="col-12">
                  <div class="d-flex justify-content-end">
                    <button
                      class="btn btn-success w-40 bg-main mb-3 font-14"
                      data-toggle="modal"
                      data-target="#sales-modal">
                      Add Sale
                    </button>
                  </div>
                  <div class="table-responsive mb-5">
                    <table
                      class="table table-striped table-hover"
                      id="save-stage"
                      style="width: 100%"
                    >
                      <thead>
                        <tr>
                          <th class="dashboard-table__heading">Project</th>
                          <th class="dashboard-table__heading">Client</th>
                          <th class="dashboard-table__heading">
                            Add More Sales
                          </th>
                          <th class="dashboard-table__heading">
                            Payment Status
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $sale)
                        <tr>
                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text d-block font-weight-600 font-12"
                            >
                              <a href="/user/property-{{$sale['sales']->id}}">
                               {{$sale['sales']->estate_name}} | {{$sale['sales']->property_type}}</a
                              >
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
                            <button
                              class="btn btn-success font-weight-600 m-0 font-11"
                              data-toggle="modal"
                              data-target="#add-payment{{$sale['sales']->id}}"
                            >
                              Add Payment
                            </button>
                          </td>

                          <td class="dashboard-table__data">
                            <button
                              class="btn btn-success font-weight-600 m-0 font-11"
                              style="background: #4f7135 !important"
                              data-toggle="modal"
                              data-target="#view-payment{{$sale['sales']->id}}"
                            >
                              View Payments
                            </button>
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

          <!-- Modal Add Sales -->
          <div
            class="modal fade"
            id="sales-modal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="formModal"
            aria-hidden="true"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h6
                    class="heading__primary--h6 mt-large mt-4"
                    id="salesModal"
                  >
                    Add Sale
                  </h6>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{route('user.addSales')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Select Project</label>
                      <select
                        class="form-control"
                        name="property_id"
                        id="project__id"
                        required
                      >   
                        <option value="" hidden>Select Project</option>
                        @forelse($properties as $property)
                        <option
                          value="{{$property->id}}|{{$property->amount}}"
                          class="font-11"
                        >
                        {{$property->estate_name}} | {{$property->property_type}} | {{$property->property_name}} | {{$property->amount}}
                        </option>
                        @empty
                        @endforelse
                        
                      </select>
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label"
                        >Project Price (Per Unit)</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        name="amount"
                        id="project_price"
                        value=""
                        readonly
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Number Of Units</label>
                      <select
                        class="form-control"
                        name="no_of_unit"
                        id="project_unit"
                        required
                      >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                      </select>
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Total Price</label>
                      <input
                        type="text"
                        class="form-control"
                        name="total_price"
                        id="project_total_price"
                        readonly
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Amount Paid By Client</label>
                      <input
                        type="number"
                        class="form-control"
                        name="amount_paid"
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Client's Full Name</label>
                      <input
                        type="text"
                        class="form-control"
                        name="client_full_name"
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Client's E-mail</label>
                      <input
                        type="email"
                        class="form-control"
                        name="client_email"
                        id="email"
                        onblur="checkEmail(email)"
                      />
                      <small id="email__error" class="font-11"></small>
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Gender</label>
                      <select class="form-control" name="client_gender" required>
                        <option value="" hidden>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Client's Telephone</label>
                      <input
                        type="number"
                        class="form-control mobile-phone"
                        placeholder="+234"
                        name="client_phone"
                        id="phone"
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Upload Client's Form</label>
                      <input
                        type="file"
                        class="form-control"
                        name="client_form"
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Upload Payment Proof</label>
                      <input
                        type="file"
                        class="form-control"
                        name="payment_proof"
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label
                        for="submit__form"
                        class="btn btn-success w-100 text-white bg-main"
                        >Submit Sale</label
                      >
                      <input type="submit" id="submit__form" hidden />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal Add Payments -->
          @foreach($data as $sale)
          <div
            class="modal fade"
            id="add-payment{{$sale['sales']->id}}"
            tabindex="-1"
            role="dialog"
            aria-labelledby="formModal"
            aria-hidden="true"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h6
                    class="heading__primary--h6 mt-large mt-4"
                    id="salesModal"
                  >
                    Add Client Payment
                  </h6>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="d-block">
                    <p class="form__label m-0 font-weight-bold font-13">
                      Full Name
                    </p>
                    <p class="form__label font-13">{{$sale['sales']->client_full_name}}</p>
                  </div>
                  <div class="d-block">
                    <p class="form__label m-0 font-weight-bold font-13">
                      Email
                    </p>
                    <p class="form__label font-13">{{$sale['sales']->client_email}}</p>
                  </div>
                  <div class="d-block">
                    <p class="form__label m-0 font-weight-bold font-13">
                      Telephone
                    </p>
                    <p class="form__label font-13">{{$sale['sales']->client_phone}}</p>
                  </div>
                  <div class="d-block">
                    <p class="form__label m-0 font-weight-bold font-13">
                      Project
                    </p>
                    <p class="form__label font-13">
                    {{$sale['sales']->estate_name}} | {{$sale['sales']->property_type}} | {{$sale['sales']->property_name}}
                    </p>
                  </div>
                  <div class="d-block">
                    <p class="form__label m-0 font-weight-bold font-13">
                      Number of Units
                    </p>
                    <p class="form__label font-13"><span>{{$sale['sales']->no_of_unit}}</span> Units</p>
                  </div>
                  <div class="d-block">
                    <p class="form__label m-0 font-weight-bold font-13">
                      Total Project Price
                    </p>
                    <p class="form__label font-13">
                      NGN<span>{{$sale['sales']->total_price}}</span>
                    </p>
                  </div>
                  <div class="d-block">
                    <p class="form__label m-0 font-weight-bold font-13">
                      Amount Paid
                    </p>
                    <p class="form__label font-13">
                      NGN<span>{{$sale['sales']->amount_paid}}</span>
                    </p>
                  </div>
                  <!-- <div class="d-block">
                    <p class="form__label m-0 font-weight-bold font-13">
                      Payment Balance
                    </p>
                    <p class="form__label font-13">
                      NGN<span>10,000,000</span>
                    </p>
                  </div> -->

                  <form action="{{route('user.addPaymentToSales')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="sales_id" value="{{$sale['sales']->id}}" required>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Enter Client Amount</label>
                      <input
                        type="number"
                        class="form-control"
                        name="added_amount"
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Upload Payment Proof</label>
                      <input
                        type="file"
                        class="form-control"
                        name="payment_proof"
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <!-- <label
                        for="submit__form"
                        class="btn btn-success w-100"
                        style="color: #fff"
                        >Submit Payment</label
                      > -->
                      <input class="btn btn-success" type="submit"/>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($data as $data)
          <!-- Modal View Payments -->
          <div
            class="modal fade"
            id="view-payment{{$data['sales']->id}}"
            tabindex="-1"
            role="dialog"
            aria-labelledby="formModal"
            aria-hidden="true"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h6
                    class="heading__primary--h6 mt-large mt-4"
                    id="salesModal"
                  >
                    View Client Payment Status
                  </h6>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="d-block">
                    <p class="form__label m-0 font-weight-bold font-13">
                      Full Name
                    </p>
                    <p class="form__label font-13">{{$data['sales']->client_full_name}}</p>
                  </div>
                  <div class="d-block">
                    <p class="form__label m-0 font-weight-bold font-13">
                      Project
                    </p>
                    <p class="form__label font-13">
                    {{$data['sales']->estate_name}} | {{$data['sales']->property_type}} | {{$data['sales']->property_name}}
                    </p>
                  </div>
                  <div class="d-block">
                    <p class="form__label m-0 font-weight-bold font-13">
                      Number of Units
                    </p>
                    <p class="form__label font-13"><span>{{$data['sales']->no_of_unit}}</span> Units</p>
                  </div>
                  <div class="d-block">
                    <p class="form__label m-0 font-weight-bold font-13">
                      Total Project Price
                    </p>
                    <p class="form__label font-13">
                      NGN<span>{{$data['sales']->total_price}}</span>
                    </p>
                  </div>

                  <div class="table-responsive">
                    <table class="table table-sm table-hover">
                      <thead>
                        <tr>
                          <th class="font-13" scope="col">ID</th>
                          <th class="font-13" scope="col">Amount</th>
                          <th class="font-13" scope="col">Balance</th>
                          <th class="font-13" scope="col">Date</th>
                          <th class="font-13" scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data['payments'] as $key=>$d)
                         <tr>
                          <th class="font-12" scope="row">{{$key + 1}}</th>
                          <td class="font-12">NGN<span>{{$d['added_amount']}}</span></td>
                          <td class="font-12 @if($d['balance'] ==  0) badge badge-success @endif">NGN<span>{{$d['balance']}}</span></td>
                          <td class="font-12">{{$d->created_at->format('d M Y')}}</td>
                         <td
                         @if($d['status'] == 'Pending')
                            class="bg-brown d-flex justify-content-center align-items-center font-12 mb-1"
                            style="color: #fff"
                          @elseif($d['status'] == 'Declined')
                          class="bg-danger d-flex justify-content-center align-items-center font-12 mb-1"
                            style="color: #fff"
                          @else
                          class="bg-success d-flex justify-content-center align-items-center font-12 mb-1"
                            style="color: #fff"
                          @endif
                          >
                            {{$d['status']}}
                          </td>
                        </tr>
                        @endforeach
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
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
