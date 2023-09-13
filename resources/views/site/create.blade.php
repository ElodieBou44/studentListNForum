<!-- Appeler le master (header + footer) -->
@extends('layouts.app')

@section('title', 'Add a student')

@section('content')

<div class="container">
    <a href="{{ route('site.index') }}" class="btn btn-info mt-5">Go back to Student List</a>
    <div class="row">
        <div class="col-12 text-center pt-2">
            <h1 class="display-1 mb-5">
                Add a student
            </h1>
        </div>
    </div>
    <form action="" method="post" class="gap-">
    @csrf
    <div class="card-header mb-3">
        <strong>Form to file</strong>
    </div>
    <div class="card-body">   
            <div class="control-grup col-12 mb-3">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Surname Name">
            </div>
            <div class="control-grup col-12 mb-3">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="1234, Street">
            </div>
            <div class="control-grup col-12 mb-3">
                <label for="phone">Phone</label>
                <input class="form-control" id="phone" name="phone" placeholder="(123) 123-1234"></input>
            </div>
            <div class="control-grup col-12 mb-3">
                <label for="email">Email</label>
                <input class="form-control" id="email" name="email" placeholder="studentname@example.com"></input>
            </div>
            <div class="control-grup col-12 mb-3">
                <label for="birthdate">Birthdate</label>
                <input class="form-control" id="birthdate" name="birthdate" placeholder="YYYY-MM-DD"></input>
            </div>
            <div class="control-grup col-12 mb-3">
                <label for="city">City</label>
                <select name="city_id" id="city" class="form-control">
                    <option value="">Select a city</option>
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                    @endforeach
                </select>
            </div>
    </div>
    <div class="card-footer">
        <input type="submit" class="btn btn-success" value="Add">
    </div>
    </form>
</div>

@endsection