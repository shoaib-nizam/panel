@extends('admin.layouts.app');

@section('content')


    <div class="container-fluid border border-dark">
            <div class="row">
                <div class="col-4 m-auto">
                    <h1>All Record</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-6">

                    <select name="client_id" class="form-control">
    <option value="">Select Client</option>

    @foreach($data as $users)
        <option value="">{{ $users->name }}</option>
    @endforeach
</select>

                </div>

                <div class="col-6">

                </div>
            </div>

    </div>



@endsection