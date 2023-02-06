<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Block Realtors | Administrative Dashboard</title>
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
                <h2 class="dashboard__title mb-2">Blocked Realtors</h2>
                <div class="table-responsive mb-5">
                <table
                    class="table table-striped table-hover"
                    id="tableExport"
                    style="width: 100%"
                  >
                    <thead>
                      <tr>
                        <th class="dashboard-table__heading">s/n</th>
                        <th class="dashboard-table__heading">Realtor Ref-Code</th>
                        <th class="dashboard-table__heading">Realtor</th>
                        <th class="dashboard-table__heading">Referrees</th>
                        <th class="dashboard-table__heading">Sales</th>
                        <th class="dashboard-table__heading">View Profile</th>
                        <th class="dashboard-table__heading">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $key=>$data)
                      <tr>
                        <td>{{++$key}}</td>
                        <td class="dashboard-table__data">
                          <p class="dashboard-table__text">{{$data['realtor']['ref_code']}}</p>
                        </td>
                        <td class="dashboard-table__data">
                          <p
                            class="dashboard-table__text font-12 font-weight-600"
                          >
                          {{$data['realtor']['first_name']}} {{$data['realtor']['last_name']}}
                          </p>
                          <span class="dashboard-table__span font-11">
                          {{$data['realtor']['email']}} | {{$data['realtor']['phone']}}</span
                          >
                        </td>
                        <td class="dashboard-table__data">
                          <p class="dashboard-table__text mt-2">{{$data['ref']}}</p>
                        </td>
                        <td class="dashboard-table__data">
                          <p class="dashboard-table__text mt-2">{{$data['sales']}}</p>
                        </td>
                        <td class="dashboard-table__data">
                          <a
                            href="{{route('realtorProfile', ['id'=>$data['realtor']['id']])}}"
                            class="btn btn-success text-white"
                          >
                            View Profile
                          </a>
                        </td>
                        <td class="downline__border">
                          <button type="button"
                            style="border: 0; background: transparent"
                            onclick="wipConfirm2('Continue With Unblocking This User', 
                            'This User has been Unblocked', 
                            'The User was not Unblocked', `{{$data['realtor']['id']}}`)"
                          >
                            <i class="fas fa-ban"></i> Unblock
                          </button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  </table>
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
            window.location = `/admin/realtor/blocked/${id}`;
          } else {
            swal(messageCancel);
          }
        });
}
    </script>
  </body>
</html>
