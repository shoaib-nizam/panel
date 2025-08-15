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
  <h5 class="card-header">Register</h5>
  <div class="card-body">

    @foreach ( $errors->all() as $error )
    {{ $error }}
@endforeach

        <form action="{{ route('addregister') }}" method="POST">
                @csrf
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Enter Name" name="name">
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Enter Email" name="email">
            </div>


            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Enter Password" name="password">
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
            </div>


            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="role">
                    <option selected>Open this select menu</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                    
                  </select>
            </div>



            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Register</button>
                <a href="/" class="btn btn-primary">Back</a>
                <a href="{{ route('login_form') }}" class="btn btn-secondary offset-7">Sign up</a>

            </div>

            

            
        </form>
  </div>
</div>

                </div>
            </div>
        </div>


</body>
</html>