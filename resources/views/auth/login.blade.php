<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <link rel="stylesheet" href="{{url('./assets/library/template/vendor/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{url('./assets/library/template/css/sb-admin-2.min.css')}}">

    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row d-flex justify-content-center align-items-center flex-grow" style="height: 100vh">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang Admin, Silahkan Login</h1>
                                        @error('error')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <form class="user" action="{{ route('loginPost') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="username"placeholder="Username">
                                                @error('username')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                                                @error('password')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script src="{{ url('./assets/library/template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('./assets/library/template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('./assets/library/template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ url('./assets/library/template/js/sb-admin-2.min.js') }}"></script>

</body>

</html>