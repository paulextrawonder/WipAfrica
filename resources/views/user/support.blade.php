<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Support | WBN</title>

    <link
      rel="stylesheet"
      href="{{asset('assets/bundles/summernote/summernote-bs4.css')}}"
    />
    <link
      rel="stylesheet"
      href="{{asset('assets/bundles/jquery-selectric/selectric.css')}}"
    />
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
                Support
              </h6>
              <div class="row">
                <div class="col-12">
                  <div class="d-flex justify-content-end">
                    <button
                      class="btn btn-success w-40 bg-main mb-3 font-13"
                      data-toggle="modal"
                      data-target="#ticket-modal"
                    >
                      Create Ticket
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
                          <th class="dashboard-table__heading">Ticket</th>
                          <th class="dashboard-table__heading">Status</th>
                          <th class="dashboard-table__heading">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($tickets as $ticket)
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
                              {{$ticket->subject}}
                            </p>
                            <span class="dashboard-table__span font-11 d-block"
                              >{{$ticket->created_at->format('D M Y')}} | {{$ticket->created_at->format('h:sa')}}</span
                            >
                          </td>

                          <td
                            class="dashboard-table__data 
                            @if($ticket->action == 'open') 
                              @if($ticket->who_replied['is_admin'] == 1)
                                bg-success
                              @else
                                bg-brown
                              @endif
                            @else
                             bg-danger
                            @endif 
                            text-white text-center font-11"
                          >
                          @if($ticket->action == 'open')

                              @if($ticket->who_replied['is_admin'] == 1)
                              Admin Replied
                              @else
                              Awaiting Reply
                              @endif
                            
                            @else
                            Closed
                            @endif
                          </td>

                          <td
                            class="dashboard-table__data d-flex justify-content-center align-items-center"
                          >
                            <a
                              href="/user/supports/{{$ticket->id}}"
                              class="btn btn-success font-weight-600 m-0 font-11"
                            >
                              View Ticket
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

          <!-- Modal Create Ticket-->
          <div
            class="modal fade"
            id="ticket-modal"
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
                    Create Support Ticket
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
                  <form action="{{route('createSupportTicket')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                      <label class="form__label">Ticket Title</label>
                      <input
                        type="text"
                        class="form-control"
                        name="subject"
                        required
                      />
                    </div>
                    <div class="form-group mb-4">
                      <label class="form__label">Ticket Message</label>
                      <textarea
                        class="summernote-simple"
                        name="message"
                        required
                      ></textarea>
                    </div>
                    <div class="form-group mb-4">
                      <label class="form__label"
                        >Upload Supporting Files (If Any)</label
                      >
                      <input type="file" name="attachment" class="form-control" />
                    </div>
                    <div class="form-group m-0 mb-3">
                      <label
                        for="submit__form"
                        class="btn btn-success text-white w-100"
                        >Submit Ticket</label
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
    @include('user.include.footer')
    <!-- JS Libraies -->
    <script src="{{asset('assets/bundles/summernote/summernote-bs4.js')}}"></script>
    <script src="{{asset('assets/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
    <script src="{{asset('assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
    <script src="{{asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('assets/js/page/create-post.js')}}"></script>
    <script src="{{asset('assets/js/page/chat.js')}}"></script>
  </body>
</html>
