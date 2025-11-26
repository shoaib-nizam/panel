@extends('admin.layouts.app')


@section('content')

 <!-- Main content -->
     <section class="content">
      <div class="container">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          @if (Gate::allows('Admin'))
            
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          @endif
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
          
        <div class="row">
          <div class="col-6">

            <div class="row mb-2">
              <div class="col-3">
                 <button id="" class="btn btn-primary">Add Banquat</button>
              </div>
            </div>

             <div class="row">
              <div class="col-12">

                <table class="table table-striped ">
                  <tr>
                    <th>ID</th>
                    <th>BANQUAT NAME</th>
                    <th>BANQUAT ADDRESS</th>
                    <th>BANQUAT PICS</th>
                    <th>UPDATE</th>
                    <th>DELETE</th>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Hyper</td>
                    <td>Latifabad hyderabad</td>
                    <td>Image</td>
                    <td><a href="" class="btn btn-warning">Update</a></td>
                    <td><a href="" class="btn btn-danger">Delete</a></td>
                  </tr>

                   <tr>
                    <td>1</td>
                    <td>Hyper</td>
                    <td>Latifabad hyderabad</td>
                    <td>Image</td>
                  </tr>
            </table>

              </div>
            </div>
            
            

          </div>
           <div class="col-6">
            <div class="row">
              <div class="col-3 mb-2">
                <button id="openModel" class="btn btn-primary">Add Record</button>
                <div class="model" id="model" >
                    <div class="inner-model">
                      <form action="{{ route('addregister') }}" method="POST">
                @csrf
                <div class="row mt-4">
                  <div class="col-6">
                     <div class="mb-3">
                <input type="text" class="form-control" placeholder="Enter Name" name="name">
            </div>
                  </div>

                   <div class="col-6">
                    <div class="mb-3">
                <input type="email" class="form-control" placeholder="Enter Email" name="email">
            </div>
                  </div>
                </div>
           

                <div class="row">
                  <div class="col-6">
                     <div class="mb-3">
                <input type="password" class="form-control" placeholder="Enter Password" name="password">
            </div>
                  </div>

                  <div class="col-6">
                       <div class="mb-3">
                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
            </div>
                  </div>
                </div>
            
                <div class="row">
                  <div class="col-6">
                    <div class="mb-3">
                <select class="form-select form-control" aria-label="Default select example" name="role">
                    <option selected>Open this select menu</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                    
                  </select>
            </div>
                  </div>

                   <div class="col-6">
                       <div class="mb-3">
                <button type="submit" class="btn btn-primary">Register</button>
               
                {{-- <a href="{{ route('login_form') }}" class="btn btn-secondary offset-7">Sign up</a> --}}

            </div>
                  </div>
                </div>    
        </form>
                    

                          <button id="closeModel" class="btn btn-primary">Close</button>
                    </div>
                </div>

                <script>

</script>


                  
               
              </div>
            </div>
            <table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>UPDATE</th>
            <th>DELETE</th>
        </tr>
    </thead>
    <tbody id="userTableBody">
    </tbody>
</table>

          </div>
        </div>

       

       


      
    </section> 
   
<script src="{{ asset('jquery/jquery.js') }}"></script>    

    <script>
function loadUsers(page = 1) {
    $.ajax({
        url: "/show?page=" + page,
        method: "GET",
        success: function(response) {
            let html = "";
            response.data.forEach(user => {
                html += `<tr>
                            <td>${user.id}</td>
                            <td>${user.name}</td>
                            <td>${user.email}</td>
                            <td><a href="" class="btn btn-warning">Update</a></td>
                            <td>
    <button onclick="deleteUser(${user.id})" class="btn btn-danger">Delete</button>
</td>

                         </tr>`;
            });

            $('#userTableBody').html(html);
        }
    });
}

// Load first time
loadUsers();


function deleteUser(id) {
    if(confirm("Are you sure you want to delete this user?")) {
        $.post('/user/delete', {
            id: id,
            _token: '{{ csrf_token() }}'
        }, function(response) {
            alert("User deleted successfully");
            loadUsers(); // Refresh table
        });
    }
}





</script>




@endsection