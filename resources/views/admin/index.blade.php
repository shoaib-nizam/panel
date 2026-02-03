@extends('admin.layouts.app')

@section('content')

<style>
    /* --- Modal Styling --- */
    .model {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }
    .inner-model {
        background: white;
        padding: 25px;
        width: 500px;
        border-radius: 10px;
    }
</style>

<section class="content">
    <div class="container-fluid">

        {{-- ===================== DASHBOARD BOXES ===================== --}}
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>New Orders</p>
                    </div>
                    <div class="icon"><i class="ion ion-bag"></i></div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>53%</h3>
                        <p>Bounce Rate</p>
                    </div>
                    <div class="icon"><i class="ion ion-stats-bars"></i></div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            @if (Gate::allows('Admin'))
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>44</h3>
                        <p>User Registrations</p>
                    </div>
                    <div class="icon"><i class="ion ion-person-add"></i></div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            @endif

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>
                        <p>Unique Visitors</p>
                    </div>
                    <div class="icon"><i class="ion ion-pie-graph"></i></div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        {{-- ===================== BANQUET & USERS SECTION ===================== --}}
        <div class="row">

            {{-- ----------------- LEFT SIDE (Banquet Section) ---------------- --}}
            <div class="col-6">

                <button id="openBanquet" class="btn btn-primary mb-3">Add Banquet</button>

                {{-- BANQUET MODAL --}}
                <div class="model" id="banquetModal">
                    <div class="inner-model">
                        <h2>Add New Banquet</h2>

                        <form id="addBanquat">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control" type="text" placeholder="Banquet Name" name="bname">
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="text" placeholder="Banquet Address" name="baddress">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <input class="form-control" type="file" name="bimage">
                                </div>
                                <div class="col-6">
                                    <input class="btn btn-primary" type="submit" value="Save" id="btnBanquat">
                                </div>
                            </div>
                        </form>

                        <button id="closeBanquet" class="btn btn-danger mt-3">Close</button>

                        <div id="output"></div>
                    </div>
                </div>

                {{-- BANQUET TABLE --}}
                <table class="table table-striped mt-3">

                     <div>
                        <input type="text" placeholder="Search Banquet....." class="form-control" name="banquetsearch" id="banquetsearch">
                    </div>
                    <span id="banquatOutput">

                    </span>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <div id="banquet_list">
                        banquet Display
                    </div>

                    <tbody id="banquetTableBody"></tbody>
                   

                </table>
            </div>

            {{-- ---------------- RIGHT SIDE (User Section) --------------- --}}
            <div class="col-6">

                <button id="openUser" class="btn btn-primary mb-3">Add User</button>

                {{-- USER MODAL --}}
                <div class="model" id="userModal">
                    <div class="inner-model">
                        <h2>Add User Record</h2>
                        <form action="{{ route('dashboardRegister') }}" method="POST">
    @csrf
    
    <div class="row">
        {{-- Name Field --}}
        <div class="col-6">
            <input type="text" 
                   name="name" 
                   value="{{ old('name') }}" 
                   class="form-control @error('name') is-invalid @enderror" 
                   placeholder="Enter Name">
            @error('name')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        {{-- Email Field --}}
        <div class="col-6">
            <input type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   class="form-control @error('email') is-invalid @enderror" 
                   placeholder="Enter Email">
            @error('email')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="row mt-3">
        {{-- Password Field (Removed old() for security) --}}
        <div class="col-6">
            <input type="password" 
                   name="password" 
                   class="form-control @error('password') is-invalid @enderror" 
                   placeholder="Enter Password">
            @error('password')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        {{-- Confirm Password Field --}}
        <div class="col-6">
            <input type="password" 
                   name="password_confirmation" 
                   class="form-control" 
                   placeholder="Confirm Password">
        </div>
    </div>

    <div class="row mt-3">
        {{-- Role Selection --}}
        <div class="col-6">
            <select class="form-control @error('role') is-invalid @enderror" name="role">
                <option value="" selected disabled>Select Role</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
            </select>
            @error('role')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-6">
            <button type="submit" class="btn btn-primary w-100">Register Account</button>
        </div>
    </div>
</form>

                        <button id="closeUser" class="btn btn-danger mt-3">Close</button>
                    </div>
                </div>

                {{-- USER TABLE --}}
               
                <table class="table table-striped">
                    <div>
                        <input type="text" placeholder="Search Record" class="form-control">
                    </div>
                     
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>UPDATE</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody"></tbody>
                </table>

            </div>
        </div>

    </div>
</section>

<script src="{{ asset('jquery/jquery.js') }}"></script>

<script>
    // ------------------- USER LOADER ----------------------
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
                        <td>${user.role}</td>
                        <td><button class="btn btn-warning">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>

                            </button></td>
                        <td><button onclick="deleteUser(${user.id})" class="btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                            </button></td>
                    </tr>`;
                });
                $('#userTableBody').html(html);
            }
        });
    }
    loadUsers();

    function deleteUser(id) {
        if (confirm("Are you sure you want to delete this user?")) {
            $.post('/user/delete', {
                id: id,
                _token: '{{ csrf_token() }}'
            }, function(response) {
                alert("User deleted successfully");
                loadUsers(); 
            });
        }
    }

    // Banquat record Insert With Ajax

    $(document).ready(function(){
        $('#addBanquat').submit(function(event){
            event.preventDefault();

            var form = $('#addBanquat')[0];
            var data = new FormData(form);

            $('#btnBanquat').prop("disabled",true);

            $.ajax({
                type: "POST",
                url: "{{ route('addBanquat') }}",
                data:data,
                processData:false,
                contentType:false,
                success:function(data){
                    // alert(data.res);
                    $('#output').text(data.res);
                      $('#btnBanquat').prop("disabled",false);
                },
                error:function(e){
                    // console.log(e.responseText);
                    $('#output').text(e.responseText);
                      $('#btnBanquat').prop("disabled",false);
                }
            });
        });
    });

    
    // ------------------- Babquet Loader ----------------------
     function loadBanquet(page = 1) {
    $.ajax({
        url: "{{ route('displayBanquet') }}",
        method: "GET",
        data: { page: page },
        success: function(response) {
            let html = "";
            
            // Check if data exists to avoid errors
            if (response.data && response.data.length > 0) {
                response.data.forEach(banquet => {
                    html += `
                    <tr>
                        <td>${banquet.banquet_id}</td>
                        <td>${banquet.banquet_name}</td>
                        <td>${banquet.banquet_address}</td>

                        <td>
    <img src="{{ asset('storage') }}/${banquet.banquet_image}" 
         alt="Banquet Image"
         width="100" 
         onerror="this.onerror=null;this.src='{{ asset('images/default-placeholder.png') }}';">
</td>

                        <td>
                            <button class="btn btn-warning edit-btn" data-id="${banquet.banquet_id}">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger delete-btn" data-id="${banquet.banquet_id}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>`;
                });
            } else {
                html = "<tr><td colspan='6' class='text-center'>No banquets found.</td></tr>";
            }

            $('#banquetTableBody').html(html);
        },
        error: function(xhr) {
            console.error("Error loading banquets:", xhr.responseText);
        }
    });
}

// Initial call
$(document).ready(function() {
    loadBanquet();
});

$(document).ready(function(){
    $("#banquetsearch").on('keyup',function(){
        var val = $(this).val();
        $.ajax();
    });
});

</script>

@endsection
