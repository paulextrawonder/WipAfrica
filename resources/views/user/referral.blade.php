<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Account Password | WBN</title>
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
              <div class="row mt-3 mb-5 p-3">
                <div class="col-12">
                  <h2 class="dashboard__title mb-2">Referrals/Downlines</h2>
                  <div class="table-responsive mb-5">
                    <table
                      class="table table-striped table-hover"
                      id="save-stage"
                      style="width: 100%"
                    >
                      <thead>
                        <tr>
                          <th class="dashboard-table__heading">
                            Level 1 Downline
                          </th>
                          <th class="dashboard-table__heading">
                            Level 2 Downline
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($downlines as $downline)
                        <tr>
                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text font-12 font-weight-600"
                            >
                              {{$downline['first_level_downline']['first_name']}} {{$downline['first_level_downline']['last_name']}} 
                              <!-- | Sales
                              <span style="color: #458337">00</span> -->
                            </p>
                            <span class="dashboard-table__span font-11">
                            {{$downline['first_level_downline']['email']}} | {{$downline['first_level_downline']['phone']}}</span
                            >
                          </td>
                          @if($downline['second_level_downline'])
                          <td class="dashboard-table__data">
                            <p
                              class="dashboard-table__text font-12 font-weight-600"
                            >
                            {{$downline['second_level_downline']['first_name']}} {{$downline['second_level_downline']['last_name']}} 
                            <!-- | Sales
                              <span style="color: #458337">00</span> -->
                            </p>
                            <span class="dashboard-table__span font-11">
                            {{$downline['second_level_downline']['email']}} | {{$downline['second_level_downline']['phone']}}</span
                            >
                          </td>
                          @else
                          <td class="dashboard-table__data">Nil</td>
                          @endif
                        </tr>
                        @empty
                        No data available..
                        @endforelse
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
        @include('user.include.footer')
  </body>
</html>
