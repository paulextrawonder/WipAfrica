<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Send Notification | Administrative Dashboard</title>
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
                <h2 class="dashboard__title mb-2 pl-3">Notification</h2>
                <div class="col-12">
                  <div class="d-flex justify-content-end">
                    <button
                      class="btn btn-success w-40 bg-main mb-3 font-14"
                      data-toggle="modal"
                      data-target="#notification-modal"
                    >
                      Send Notification
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
                          <th class="dashboard-table__heading">
                            Notification Title / Message
                          </th>

                          <th class="dashboard-table__heading">Date/Time</th>
                          <th class="dashboard-table__heading">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $notification)
                        <tr>
                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text d-block font-weight-600 font-13"
                              style="
                                line-height: 15px;
                                margin-bottom: 22px;
                                color: #4f7135 !important;
                              "
                              id="support-title"
                            >
                              {{$notification->title}}
                            </p>
                            <span
                              class="dashboard-table__span font-11 d-block"
                              id="support-message"
                              > {{$notification->message}}
                            </span>
                          </td>

                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text font-12 font-weight-600"
                            >
                            {{date('D M Y', strtotime($notification->created_at))}}
                            </p>
                            <span class="dashboard-table__span font-11"
                              >{{date('H:ma', strtotime($notification->created_at))}}</span
                            >
                          </td>

                          <td class="downline__border">
                            <!-- <button
                              style="border: 0; background: transparent"
                              data-toggle="modal"
                              data-target="#notification-modal"
                            >
                              <i class="fas fa-edit"></i>
                            </button> -->
                            <button
                              style="
                                border: 0;
                                background: transparent;
                                margin-left: 10px;
                              "
                              onclick="wipConfirm2('Are you sure to delete notification', 'This notification has been deleted', 'The notification was not deleted',  `{{$notification->id}}`)"
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
          </section>

          <!-- Modal Notification -->
          <div
            class="modal fade"
            id="notification-modal"
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
                    Send Notification
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
                  <form action="{{route('adminCreateNotification')}}" method="POST">
                    @csrf
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Title</label>
                      <input
                        type="text"
                        class="form-control"
                        name="title"
                        id="title"
                        required
                      />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label class="form__label">Message</label>
                      <textarea name="message" class="form-control" required></textarea>
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label
                        for="submit__form"
                        class="btn btn-success w-100 text-white"
                        >Send Notification</label
                      >
                      <input type="submit" id="submit__form" hidden />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
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
            window.location = `/admin/notification/${id}`;
          } else {
            swal(messageCancel);
          }
        });
}
    </script>
  </body>
</html>
