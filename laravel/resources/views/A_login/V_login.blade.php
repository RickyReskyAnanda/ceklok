<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Dec 2015 00:53:03 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="{{URL::to('public/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{URL::to('public/admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{URL::to('public/admin/css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Welcome to IN+</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            @if ($message = Session::get('success'))
		        <div class="alert alert-success">
		            <p>{{ $message }}</p>
		        </div>
		    @endif
            <form class="m-t" role="form" method="post" action="{{URL::to('admin/login')}}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Email or phone number" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{URL::to('js/jquery-2.1.1.js')}}"></script>
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
@include('home')
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Dec 2015 00:53:03 GMT -->
</html>
