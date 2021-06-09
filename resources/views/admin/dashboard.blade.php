<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet"  href="{{ asset('bootstrap-4.0.0/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h4 style="text-align:center; text-decoration:underline">User List</h4>
            </div>
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Has Admin Role ?</th>
                    <th>Registered Date</th>
                    @if(session()->get('hasAdminRole') == 1)
                    <th><a href="{{ route('admin.create') }}"><button class="btn btn-primary mb-2">Add New</button></a></th>
                    @else
                    <th></th>
                    @endif
                </thead>
                <tbody>
                    @foreach ($data as $user)
                    <tr>
                        <td> {{ $user->name }}</td>
                        <td> {{ $user->email }}</td>
                        <td> {{ $user->has_admin_role == 1 ? 'YES' : 'NO' }}</td>
                        <td> {{ $user->registerated_date }}</td>
                        @if(session()->get('LoggedUser') == $user->id)
                        <td> <a href="{{ route('admin.logout') }}"><button class="btn btn-danger">Logout</button></a></td>
                        @else
                        <td></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
