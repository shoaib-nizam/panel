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
          </div>
           <div class="col-6">
            <div class="row">
              <div class="col-3 mb-2">
                <a href="" class="btn btn-primary" id="addUser" onclick="enter()">Add User</a>
                <script>
                   function enter(){
                    alert("Enter value");
                   }
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