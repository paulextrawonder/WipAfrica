<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Projects | WBN</title>
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
                Notification
              </h6>
              <div class="row">
                <div class="col-md-12 p-0">
                  <div class="card-body">
                    <ul
                      class="list-unstyled list-unstyled-border user-list"
                      id="message-list"
                    >
                    @forelse($data['notifications'] as $notification)
                      <li class="media notification d-flex align-items-center">
                        <div class="notification__initials">WBN</div>
                        <div class="media-body">
                          <div
                            class="mt-0 font-weight-bold notification__title"
                          >
                            {{$notification->title}}
                          </div>
                          <div class="text-small notification__body">
                           {{$notification->message}}
                          </div>
                        </div>
                      </li>
                      @empty
                      'No new message'
                      @endforelse
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </section>
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
