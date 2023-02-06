<!DOCTYPE html>
<html lang="en">
  <head>
  <link
      rel="stylesheet"
      href="{{asset('assets/bundles/summernote/summernote-bs4.css')}}"
    />
    <link
      rel="stylesheet"
      href="{{asset('assets/bundles/jquery-selectric/selectric.css')}}"
    />
    <title>Support Tickets | Administrative Dashboard</title>
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
 <div class="main-content hd-100 ticket-padding">
          <section class="section">
            <div class="section-body p-0 m-0">
              <!-- add content here -->

              <div class="card mt-5">
                <p
                  class="heading__primary--h6 font-weight-600 font-18 mt-large mt-5 border-bottom px-4 pb-3"
                  id="salesModal"
                  style="line-height: 18px; color: #4f7135"
                >
                 {{$data['ticket']['subject']}}
                </p>
                <div class="boxs mail_listing">
                  <div class="inbox-body no-pad">
                    <section class="mail-list">
                      <div class="message-box mt-4">
                        <div class="clearfix d-flex align-items-center w-100">
                          <img
                            alt="image"
                            src="{{asset('users/profile_pic/'.$data['ticket']['profile_pic'])}}"
                            class="rounded-circle"
                            width="50"
                            data-toggle="tooltip"
                            title="Sachin Pandit"
                          />
                          <div class="about ml-3">
                            <div
                              class="name font-13 font-weight-500 m-0"
                              style="line-height: 12px"
                            >
                              {{$data['ticket']['first_name']}} {{$data['ticket']['last_name']}}
                            </div>
                            <small
                              class="text-muted m-0"
                              style="line-height: 0px"
                              >Email: {{$data['ticket']['email']}}</small
                            >
                          </div>
                        </div>

                        <div class="view-mail p-t-20">
                          <p class="font-12 font-weight-500">
                            {!! $data['ticket']['message'] !!}
                          </p>
                        </div>

                        <div class="attachment-mail">
                          <p>
                            <span>
                              <i class="fa fa-paperclip"></i>Attachments
                              <span>( @if($data['ticket']['attachment'])
                                1
                                @else 
                                0 
                                @endif )</span>
                            </span>
                          </p>
                          <div class="row m-0">
                            <div class="col-md-12 m-0">
                              <a
                                href="{{asset('users/tickets/'.$data['ticket']['attachment'])}}"
                                class="name"
                                download
                              >
                              {{$data['ticket']['attachment']}}
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>


                     @forelse($data['replies'] as $reply)
                      <div class="message-box mt-5" id="administration">
                        <div class="clearfix d-flex align-items-center w-100">
                          <img
                            alt="image"
                            @if($reply['is_admin'])
                            src="{{asset('assets/img/logo.png')}}"
                            @else
                            src="{{asset('users/profile_pic/'.$data['ticket']['profile_pic'])}}"
                            @endif
                            class="rounded-circle"
                            width="50"
                            data-toggle="tooltip"
                            title="Sachin Pandit"
                          />
                          <div class="about ml-3">
                            <div
                              class="name font-13 font-weight-600 m-0 text-success"
                              style="line-height: 12px"
                            >
                            @if($reply['is_admin'])
                            WBN
                            @else
                            {{$data['ticket']['first_name']}} {{$data['ticket']['last_name']}}
                            @endif
                            </div>
                            <small
                              class="text-muted m-0"
                              style="line-height: 0px"
                            >
                            @if($reply['is_admin'])
                            Customer care
                            @else
                            {{$data['ticket']['email']}}
                            @endif
                            </small
                            >
                          </div>
                        </div>
                        <div class="view-mail p-t-20">
                          <p class="font-12 font-weight-500 text-dark">
                            {!! $reply->reply !!}
                          </p>
                        </div>

                        <div class="attachment-mail">
                          <p>
                            <span>
                              <i class="fa fa-paperclip"></i>Attachments
                              <span>( @if($reply['reply_attachment'])
                                1
                                @else 
                                0 
                                @endif )</span>
                            </span>
                          </p>
                          <div class="row m-0">
                            <div class="col-md-12 m-0">
                              <a
                                class="name"
                                href="{{asset('users/tickets/'.$reply['reply_attachment'])}}"
                                download
                              >
                              {{$reply['reply_attachment']}}
                              </a>
                            </div>
                           
                            <!-- <div class="col-md-12">
                              <a
                                class="name"
                                href="../../assets/img/logo.png"
                                download
                              >
                                IMG_003.png
                              </a>
                            </div> -->
                          </div>
                        </div>
                      </div>
                      @empty
                      <div class="badge badge-warning mt-5">
                          No reply yet..
                      </div>
                      @endforelse

                      <div class="inbox-reply mt-5">
                        <form action="{{route('adminReplyTicket', ['ticket'=>$data['ticket']['id']])}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group mb-4">
                            <label class="form__label">Send A Reply</label>
                            <textarea
                              class="summernote-simple"
                              name="reply"
                              required
                            ></textarea>
                          </div>
                          <div class="form-group mb-4">
                            <label class="form__label"
                              >Upload Supporting Files (If Any)</label
                            >
                            <input name="reply_attachment" type="file" class="form-control"/>
                          </div>
                          <div class="form-group m-0 mb-3">
                            <label
                              for="submit__form"
                              class="btn btn-success text-white font-13"
                              >Reply Ticket</label
                            >
                            <input type="submit" id="submit__form" hidden />
                          </div>
                        </form>
                      </div>
                    </section>
                  </div>
                </div>
              </div>

              <div class="message-body"></div>
            </div>
          </section>
        </div>
      </div>
    </div>
    @include('admin.include.script')
     <!-- JS Libraies -->
     <script src="{{asset('assets/bundles/summernote/summernote-bs4.js')}}"></script>
    <script src="{{asset('assets/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
    <script src="{{asset('assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
    <script src="{{asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('assets/js/page/create-post.js')}}"></script>
    <script src="{{asset('assets/js/page/chat.js')}}"></script>
  </body>
</html>
