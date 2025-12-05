<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col-6 mt-5 m-auto">
    <img  style="height: 130px; width:350px; margin-left:70px;margin-bottom: 20px" src="{{ asset('admin/dist/img/logo.png') }}" alt="">
    <div class="card">
  <h5 class="card-header">
    <div class="row">
        <div class="col-3 m-auto fw-bold text-muted">
                Login Form
        </div>
    </div>
    
</h5>
  <div class="card-body">

    {{-- @foreach ( $errors->all() as $error )
        {{ $error }}
    @endforeach --}}

             
        <form action="{{ route('login') }}" method="POST">
                @csrf
            <div class="mb-3">
                <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror " placeholder="Enter Email" name="email">
                <span class="text-danger">
                        @error('email')
                        {{ $message }}
                @enderror
                    </span>
            </div>

            <div class="mb-3">
                <input type="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror " placeholder="Enter Password" name="password">
                <span class="text-danger">
                        @error('password')
                        {{ $message }}
                @enderror
                    </span>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
                {{-- <a href="/" class="btn btn-primary">Back</a> --}}
                 <a href="{{ route('register') }}" class="btn btn-secondary">Sign up</a>
            </div>

            

            
        </form>
  </div>
</div>

                </div>
            </div>

           
        </div>


</body>
</html>