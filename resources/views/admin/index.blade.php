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

                <style>
/* Modal background */
.model {
    display: none; /* Hidden by default */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5); /* semi-transparent */
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

/* Inner modal box */
.inner-model {
    background: #fff;
    padding: 20px 30px;
    border-radius: 10px;
    text-align: center;
    min-width: 700px;
    animation: slideDown 0.9s ease;
}

/* Slide down animation */
@keyframes slideDown {
    from { transform: translateY(-200px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}


</style>

               


                <button id="openModel" class="btn btn-primary">Add Record</button>
              
                <div class="model" id="model" >
                    <div class="inner-model">

                      <form action="" method="POST">
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
const openBtn = document.getElementById("openModel");
const closeBtn = document.getElementById("closeModel");
const modal = document.getElementById("model");

// Open modal
openBtn.addEventListener("click", function() {
    modal.style.display = "flex";
});

// Close modal
closeBtn.addEventListener("click", function() {
    modal.style.display = "none";
});

// Close modal when clicking outside inner box
window.addEventListener("click", function(e) {
    if(e.target == modal) {
        modal.style.display = "none";
    }
});
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