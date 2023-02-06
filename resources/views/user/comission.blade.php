<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Commissions | WBN</title>
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
                Commissions
              </h6>
              <div class="row">
                <div class="col-12">
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
                            Commission Type
                          </th>
                          <th class="dashboard-table__heading">Client Paid</th>
                          <th class="dashboard-table__heading">
                            Commission (-VAT)
                          </th>
                          <th class="dashboard-table__heading">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text d-block font-weight-600 font-12"
                            >
                              <a href="single-project.html">
                                Magonal Estate | Apartments</a
                              >
                            </p>
                            <span class="dashboard-table__span font-11"
                              >2 Bedroom Apartment</span
                            >
                          </td>

                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text font-12 font-weight-600"
                            >
                              Anyanwu Young
                            </p>
                          </td>
                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text font-12 font-weight-600"
                            >
                              Direct Commission
                            </p>
                            <span class="dashboard-table__span font-11">
                              Realtor: Alex Unusal</span
                            >
                          </td>
                          <td class="dashboard-table__data">
                            <p class="dashboard-table__text font-12">
                              ₦10,000,000
                            </p>
                          </td>
                          <td class="dashboard-table__data">
                            <p class="dashboard-table__text font-12">
                              ₦100,000
                            </p>
                          </td>
                          <td class="dashboard-table__data">
                            <button
                              class="btn btn-success font-weight-600 m-0 font-11"
                              data-toggle="modal"
                              data-target="#commision-detail"
                            >
                              View Details
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text d-block font-weight-600 font-12"
                            >
                              <a href="single-project.html">
                                Magonal Estate | Apartments</a
                              >
                            </p>
                            <span class="dashboard-table__span font-11"
                              >2 Bedroom Apartment</span
                            >
                          </td>

                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text font-12 font-weight-600"
                            >
                              Anyanwu Young
                            </p>
                          </td>
                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text font-12 font-weight-600"
                            >
                              Downline Level 1
                            </p>
                            <span class="dashboard-table__span font-11">
                              Realtor: Miyim Jummai</span
                            >
                          </td>
                          <td class="dashboard-table__data">
                            <p class="dashboard-table__text font-12">
                              ₦10,000,000
                            </p>
                          </td>
                          <td class="dashboard-table__data">
                            <p class="dashboard-table__text font-12">₦20,000</p>
                          </td>
                          <td class="dashboard-table__data">
                            <button
                              class="btn btn-success font-weight-600 m-0 font-11"
                              data-toggle="modal"
                              data-target="#commision-detail"
                            >
                              View Details
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text d-block font-weight-600 font-12"
                            >
                              <a href="single-project.html">
                                Magonal Estate | Apartments</a
                              >
                            </p>
                            <span class="dashboard-table__span font-11"
                              >2 Bedroom Apartment</span
                            >
                          </td>

                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text font-12 font-weight-600"
                            >
                              Anyanwu Young
                            </p>
                          </td>
                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text font-12 font-weight-600"
                            >
                              Downline Level 2
                            </p>
                            <span class="dashboard-table__span font-11">
                              Realtor: Dayo Abiodun</span
                            >
                          </td>
                          <td class="dashboard-table__data">
                            <p class="dashboard-table__text font-12">
                              ₦10,000,000
                            </p>
                          </td>
                          <td class="dashboard-table__data">
                            <p class="dashboard-table__text font-12">₦10,000</p>
                          </td>
                          <td class="dashboard-table__data">
                            <button
                              class="btn btn-success font-weight-600 m-0 font-11"
                              data-toggle="modal"
                              data-target="#commision-detail"
                            >
                              View Details
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- Modal with form -->
          <div
            class="modal fade"
            id="commision-detail"
            tabindex="-1"
            role="dialog"
            aria-labelledby="formModal"
            aria-hidden="true"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="commissionDetails">
                    Commission Details
                  </h5>
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
                  <div class="form-group m-0 mb-3">
                    <label class="form__label">Project</label>
                    <input
                      type="text"
                      class="form-control"
                      name="Project_name"
                      value="Magonal Estate | Land | 500sqm"
                      readonly
                    />
                  </div>

                  <div class="form-group m-0 mb-3">
                    <label class="form__label">Project Price (Per Unit)</label>
                    <input
                      type="text"
                      class="form-control"
                      name="project_price"
                      value="NGN35,000,000"
                      readonly
                    />
                  </div>
                  <div class="form-group m-0 mb-3">
                    <label class="form__label">Number Of Units</label>
                    <input
                      type="text"
                      class="form-control"
                      name="project_units"
                      value="1"
                      readonly
                    />
                  </div>
                  <div class="form-group m-0 mb-3">
                    <label class="form__label">Total Price</label>
                    <input
                      type="text"
                      class="form-control"
                      name="total_price"
                      value="NGN35,000,000"
                      readonly
                    />
                  </div>
                  <div class="form-group m-0 mb-3">
                    <label class="form__label">Amount Paid By Prospect</label>
                    <input
                      type="text"
                      class="form-control"
                      name="project_price"
                      value="NGN15,000,000"
                      readonly
                    />
                  </div>
                  <div class="form-group m-0 mb-3">
                    <label class="form__label">Pending Client's Balance</label>
                    <input
                      type="text"
                      class="form-control"
                      name="prospect_balance"
                      value="NGN20,000,000"
                      readonly
                    />
                  </div>
                  <div class="form-group m-0 mb-3">
                    <label class="form__label">Commission Paid</label>
                    <input
                      type="text"
                      class="form-control"
                      name="Commission"
                      value="NGN150,000"
                      readonly
                    />
                  </div>

                  <div class="form-group m-0 mb-3">
                    <label class="form__label">Client's Full Name</label>
                    <input
                      type="text"
                      class="form-control"
                      name="client_name"
                      value="Anyanwu Young"
                      readonly
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('user.include.footer')
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
