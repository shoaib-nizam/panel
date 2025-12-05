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
                <div class="col-6 mt-5">

    <div class="card">
  <h5 class="card-header ">
    <div class="row">
        <div class="col-5 m-auto fw-bold text-muted">
                Registration Form
        </div>
    </div>

  </h5>
  <div class="card-body">
    {{-- <ul>
        @foreach ( $errors->all() as $error )
    <li>{{ $error }}</li>
@endforeach
    </ul> --}}
    

        <form action="{{ route('addregister') }}" method="POST">
                @csrf
            <div class="mb-3">
               <label>*</label> 
    <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror " placeholder="Enter Name" name="name" >
                    <span class="text-danger">
                        @error('name')
                        {{ $message }}
                @enderror
                    </span>
                
            </div>

            <div class="mb-3">
                <label>*</label>
                <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror " placeholder="Enter Email" name="email">
                <span class="text-danger">
                        @error('email')
                        {{ $message }}
                @enderror
                    </span>
            </div>


            <div class="mb-3">
                <label>*</label>
                <input type="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror " placeholder="Enter Password" name="password">
            <span class="text-danger">
                        @error('password')
                        {{ $message }}
                @enderror
                    </span>
            </div>

            <div class="mb-3">
                <label>*</label>
                <input type="password" value="{{ old('password_confirmation') }}" class="form-control @error('password_confirmation') is-invalid @enderror " placeholder="Confirm Password" name="password_confirmation">
            <span class="text-danger">
                        @error('password_confirmation')
                        {{ $message }}
                @enderror
                    </span>
            </div>


            <div class="mb-3">
                <label>*</label>
                <select class="form-select" aria-label="Default select example" name="role">
                    <option selected>Open this select menu</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                    
                  </select>
            </div>



            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Register</button>
                <a href="{{ route('login_form') }}" class="btn btn-secondary ">Login</a>

            </div>

            

            
        </form>
  </div>
</div>

                </div>
            </div>
        </div>


</body>
</html>