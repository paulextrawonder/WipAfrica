<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Projects | Administrative Dashboard</title>
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
                <h2 class="dashboard__title mb-2 pl-3">Projects</h2>
                <div class="col-12">
                  <div class="d-flex justify-content-end">
                    <a
                      href="/admin/project/create"
                      class="btn btn-success w-40 bg-main mb-3 font-14"
                    >
                      Upload Project
                    </a>
                  </div>
                  <div class="row mt-3 mb-5">
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
                              <th class="dashboard-table__heading">
                                Total Amount
                              </th>
                              <th class="dashboard-table__heading">
                                % Commission
                              </th>
                              <th class="dashboard-table__heading">
                                View Projects
                              </th>
                              <th class="dashboard-table__heading">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($properties as $property)
                            <tr>
                              <td class="dashboard-table__data">
                                <p
                                  class="dashboard-table__text d-block font-weight-600 font-12"
                                >
                                  <a href="single-project.html">
                                    {{$property->estate_name}} | {{$property->property_type}}</a
                                  >
                                </p>
                                <span class="dashboard-table__span font-11"
                                  >{{$property->property_name}} {{$property->property_type}}</span
                                >
                              </td>

                              <td class="dashboard-table__data">
                                <p
                                  class="dashboard-table__text font-weight-600"
                                >
                                  NGN{{$property->amount}}
                                </p>
                              </td>
                              <td class="dashboard-table__data">
                                <p
                                  class="dashboard-table__text font-weight-600"
                                >
                                {{$property->commission}}%
                                </p>
                              </td>
                              <td class="dashboard-table__data">
                                <a
                                  href="/admin/project-{{$property->id}}"
                                  class="btn btn-success font-weight-600 m-0 font-11"
                                >
                                  View Project
                                </a>
                              </td>
                              <td class="downline__border">
                                <a
                                  href="/admin/project/{{$property->id}}/update"
                                  style="border: 0; background: transparent"
                                >
                                  <i class="fas fa-edit"></i>
                                </a>
                                <button
                                  style="
                                    border: 0;
                                    background: transparent;
                                    margin-left: 10px;
                                  "
                                  onclick="confirmDeleteModal('Are you sure to delete `{{$property->estate_name}}`', 
                                  'This project has been deleted', 
                                  'The project was not deleted',
                                  '/admin/project/{{$property->id}}')"
                                >
                                  <i class="fas fa-trash-alt"></i>
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
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    @include('admin.include.script')
  </body>
</html>
