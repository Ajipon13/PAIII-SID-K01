<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SistemInformasiDesa</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .login-page {
          background-image: url('bg.jpg');
          background-repeat: no-repeat;
          background-size: cover;
      }
    </style>
</head>
<body class="login-page" style="min-height: 512.781px;">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="card  ">
    <div class="card-body login-card-body " style="background-color:#dffab2; color:#000000;">
      <p class="login-box-msg text-bold">Sistem Informasi Desa</p>
      <center class="mt-2">
        <i class="fa fa-user fa-4x"></i>
      </center>
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <form action="{{ url('proses')}}"  class="mt-2" method="post">
            @csrf
          
          <div class="form-group">
            Username
            <input type="username" class="form-control @error('username') is-invalid @enderror form-control" name="username"  value="{{ old('username') }}" >
          </div>
            @error('username')
            <div class="invalid-feedback">
              {{{$message}}}
            </div>
            @enderror
          <div class="form-group mb-2">
            Password
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror form-control">
        
        </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-success btn-block">LogIn</button>
        </div>
        
        @error('password')
                 <div class="invalid-feedback">
                  {{{$message}}}
                 </div>
                 @enderror
        </div>
        
       
      </form>
    </div>
  </div>
</div>


<!-- jQuery -->
<script src="{{asset('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE')}}/dist/js/adminlte.min.js"></script>



</body></html>