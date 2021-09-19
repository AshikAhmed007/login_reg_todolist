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
                                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                            <span aria-hidden="true">
                                                ×
                                            </span>
                                        </button>
                                    </div>
                                    @endif
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">
                                            Registration
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('process_reg')}}" method="post">
                                            @csrf
                                             <div class="form-group icon_parent">
                                                <label for="uname">
                                                    Name
                                                </label>
                                                <input autocomplete="name" autofocus="" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Full Name" required="" type="text" value="{{ old('name') }}">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                                    @enderror
                                                </input>
                                            </div>
                                             <div class="form-group icon_parent">
                                                <label for="uname">
                                                    User Name
                                                </label>
                                                <input autocomplete="username" autofocus="" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" required="" type="text" value="{{ old('username') }}">
                                                    @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                                    @enderror
                                                </input>
                                            </div>
                                             
                                            <div class="form-group icon_parent">
                                                <label for="email">
                                                    E-mail
                                                </label>
                                                <input autocomplete="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Address" required="" type="email" value="{{ old('email') }}">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                                    @enderror
                                                    
                                                </input>
                                            </div>
                                            <div class="form-group icon_parent">
                                                <label for="password">
                                                    Password
                                                </label>
                                                <input autocomplete="new-password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required="" type="password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                                    @enderror
                                                   
                                                </input>
                                            </div>
                                            
                                            <div class="form-group">
                                                <a class="registration" href="{{route('login')}}">
                                                    Already have an account
                                                </a>
                                                <br>
                                                    <button class="btn btn-primary" type="submit">
                                                        Signup
                                                    </button>
                                                </br>
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