@extends('base')
@section('content')
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    {{-- Error Alert --}}
                                    @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{session('error')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Reset Pasword</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{url('password_update')}}" method="POST" id="logForm">
                                            @csrf
                                            
                                            
                                            <div class="form-group">
                                               
                                                <input
                                                    class="form-control py-4"
                                                    id="inputPassword"
                                                    type="password"
                                                    name="old_password"
                                                    placeholder="Old Password"/>
                                            </div>
                                             <div class="form-group">
                                                
                                                <input
                                                    class="form-control py-4"
                                                    id="inputPassword"
                                                    type="password"
                                                    name="new_password"
                                                    placeholder="New Password"/>
                                               
                                            </div>
                                             <div class="form-group">
                                                
                                                <input
                                                    class="form-control py-4"
                                                    id="inputPassword"
                                                    type="password"
                                                    name="confirm_password"
                                                    placeholder="Confirm Password"/>
                                               
                                            </div>
                                            <div class="form-group">
                                               
                                            </div>
                                            <div
                                                class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                               
                                                <button class="btn btn-primary btn-block" type="submit">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
 
        </div>
       @endsection

       