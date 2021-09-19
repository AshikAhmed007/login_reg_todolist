@extends('dashboard_layout')
@section('dash_content')
        <div class="container col-lg-8">
             @if(Auth::user()->level=='admin')
         <div class="sl-mainpanel mx-auto">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5 style="margin-top:50px;">User List</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Name</th>
                  <th class="wd-15p">User Name</th>
                  <th class="wd-15p">Email</th>
                  <th class="wd-15p">Role</th>
                  <th class="wd-15p">Status</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
             @php
             $i=1;
             @endphp
             @foreach($user as $usr)
             <tr>
                  <td>{{$i++}}</td>
                  <td>{{$usr->name}}</td>
                  <td>{{$usr->username}}</td>
                  <td>{{$usr->email}}</td>
                  <td>{{$usr->level}}</td>
                  <td>
                   
                    @if($usr->status==1)
                        <a href="{{URL::to('inactive/user/'.$usr->id)}}" class="btn btn-danger">Make Inactive</a>
                      @elseif($usr->status==0)
                      <a href="{{URL::to('active/user/'.$usr->id)}}" class="btn btn-info">Make Active</a>
                      @endif
                    
                  </td>
                  <td>
                   
                   <a href="{{URL::to('delete/user/'.$usr->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                   
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
          </div><!-- table-wrapper -->
        </div><!-- card -->

      </div><!-- sl-pagebody -->
  </div>
  @else

    
  <div class="sl-mainpanel">
      <div class="sl-pagebody"><br><br>
        
          <h6 class="card-body-title">Todo List
            <a href="#" class="btn btn-sm btn-success" style="float: right;" data-toggle="modal" data-target="#modalAdd">Add New</a>
          </h6>
          <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Task</th>
                  <th class="wd-15p">Created at</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1;?>
                @foreach($tasks as $task)
                @if(($task->user_id==Auth::user()->id && $task->status==0) || ($task->status==1))
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$task->task_name}}</td>
                  <td>{{$task->created_at}}</td>
                  <td>
                    
                    <a href="{{URL::to('delete/task/'.$task->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                    @if($task->user_id==Auth::user()->id && $task->status==1)
                    <a href="{{URL::to('private/task/'.$task->id)}}" class="btn btn-danger">Make Private</a>
                    @elseif($task->user_id==Auth::user()->id && $task->status==0)
                    <a href="{{URL::to('public/task/'.$task->id)}}" class="btn btn-success">Make Public</a>
                    @endif
                  </td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

      </div><!-- sl-pagebody -->


    <!-- LARGE MODAL -->
        <div id="modalAdd" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Task Add</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            <form method="post" action="{{route('store')}}">
              @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                  <label for="exampleInputEmail1">Task Name</label>
                  <input type="text" class="form-control"  placeholder="Task Name" name="task_name" required="">
                </div>
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
  @endif


@endsection
