<!DOCTYPE html>
<html lang="en">
  <head>
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
        <div class="main-content hd-100">
          <section class="section">
            <div class="section-body">
              <!-- add content here -->
              <div class="row mt-3 mb-5">
                <h2 class="dashboard__title pl-3">All Supports Ticket</h2>
              </div>
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
                          <th class="dashboard-table__heading">Ticket</th>
                          <th class="dashboard-table__heading">Subject</th>
                          <th class="dashboard-table__heading">Status</th>
                          <th class="dashboard-table__heading">
                            Ticket Action
                          </th>
                          <th class="dashboard-table__heading">View Ticket</th>
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
                            >
                              {{$ticket->ticket}}
                          </td>

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
                              >{{$ticket->created_at->format('D M Y')}} | {{$ticket->created_at->format('H:ma')}}</span
                            >
                          </td>

                          <td 
                            class="dashboard-table__data 
                            @if($ticket->action == 'open') 
                              @if($ticket->who_replied['is_admin'] == 1)
                                bg-brown
                              @else
                                bg-success
                              @endif
                            @else
                             bg-danger
                            @endif 
                            text-white text-center font-11"
                          >
                            @if($ticket->action == 'open')

                              @if($ticket->who_replied['is_admin'] == 1)
                              Awaiting Reply
                              @else
                              Realtor Replied
                              @endif
                            
                            @else
                            Closed
                            @endif
                          </td>
                          <td class="dashboard-table__data">
                           <form action="{{route('adminMarkTicketAsClosed', ['id'=>$ticket->id])}}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="d-flex">
                              <select
                                class="form-control font-12"
                                name="ticket_action"
                                id="ticket_action"                             
                              >
                              @if ($ticket->action != 'open')
                                <option value="{{$ticket->action}}">{{$ticket->action}}</option>
                              @endif
                                <option value="open">Open</option>
                                <option value="close">Close</option>
                              </select>
                              <button type="submit" class="btn btn-toolbar ml-2 p-2">  
                                 ✓
                              </button>
                              
                             </div>
                            </form>
                          </td>

                          <td
                            class="dashboard-table__data d-flex justify-content-center align-items-center"
                          >
                            <a
                              href="{{route('adminViewTicket', ['id'=>$ticket->id])}}"
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
        </div>
      </div>
    </div>
    @include('admin.include.script')
  </body>
</html>
