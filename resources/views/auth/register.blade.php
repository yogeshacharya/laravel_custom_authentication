<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link rel="stylesheet"  href="{{ asset('bootstrap-4.0.0/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><b>Create New User</b></div>
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action=" {{ route('admin.store') }}">
                                @if(Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success')}}
                                    </div>
                                @endif
                                @if(Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail')}}
                                </div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="cols-sm-2 control-label">Your Name</label>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name"  value="{{ old('name') }}" />
                                        </div>
                                    </div>
                                    <span class="text-danger">@error('name') {{ $message}} @enderror </span>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="cols-sm-2 control-label">Your Email</label>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" value="{{ old('email') }}" />
                                        </div>
                                    </div>
                                    <span class="text-danger">@error('email') {{ $message}} @enderror </span>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="cols-sm-2 control-label">Password</label>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password" />
                                        </div>
                                    </div>
                                    <span class="text-danger">@error('password') {{ $message}} @enderror </span>
                                </div>
                                <div class="form-group">
                                    <label for="has_admin_role"> Has Admin Role ?</label>
                                    <input type="checkbox" id="has_admin_role" name="has_admin_role">
                                  </div>
                                <div class="form-group ">
                                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>