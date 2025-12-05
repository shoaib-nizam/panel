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
                    </div>
                </div>

                {{-- BANQUET TABLE --}}
                <table class="table table-striped mt-3">
                    <span id="banquatOutput">

                    </span>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Hyper</td>
                        <td>Latifabad Hyderabad</td>
                        <td>Image</td>
                        <td><a href="#" class="btn btn-warning">Update</a></td>
                        <td><a href="#" class="btn btn-danger">Delete</a></td>
                    </tr>

                </table>
            </div>

            {{-- ---------------- RIGHT SIDE (User Section) --------------- --}}
            <div class="col-6">

                <button id="openUser" class="btn btn-primary mb-3">Add User</button>

                {{-- USER MODAL --}}
                <div class="model" id="userModal">
                    <div class="inner-model">
                        <h2>Add User Record</h2>

                        <form action="{{ route('addregister') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control" type="text" placeholder="Enter Name" name="name">
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="email" placeholder="Enter Email" name="email">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <input class="form-control" type="password" placeholder="Password" name="password">
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <select class="form-control" name="role">
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </div>
                        </form>

                        <button id="closeUser" class="btn btn-danger mt-3">Close</button>
                    </div>
                </div>

                {{-- USER TABLE --}}
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
                        <td><button class="btn btn-warning">Update</button></td>
                        <td><button onclick="deleteUser(${user.id})" class="btn btn-danger">Delete</button></td>
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
                url: '{{ route('') }}',
                type: 'POST',
                data: 'data',
                processData:false,
                contentType:false,
                success:function(data){

                },
                error:function(e){

                }
            });
        });
    });

  
</script>

@endsection
