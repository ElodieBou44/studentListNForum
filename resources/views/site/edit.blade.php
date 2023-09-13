@extends('layouts.app')

@section('title', 'Update a student')

@section('content')

<div class="container mt-5">
    <a href="{{ route('site.index') }}" class="btn btn-info ml-3">Go back to Student List</a>
    <div class="row">
        <div class="col-12 text-center pt-2">
            <h1 class="display-1">
                Update a student
            </h1>
        </div>
    </div>
            <hr>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form action="" method="post">
                    @method('put')
                    @csrf
                    <div class="card-header">
                        Form to fill
                    </div>
                    <div class="card-body">   
                        <div class="control-grup col-12 mb-3">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $student->name }}">
                        </div>
                        <div class="control-grup col-12 mb-3">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" value="{{ $student->address }}">
                        </div>
                        <div class="control-grup col-12 mb-3">
                            <label for="phone">Phone</label>
                            <input class="form-control" id="phone" name="phone" value="{{ $student->phone }}"></input>
                        </div>
                        <div class="control-grup col-12 mb-3">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" name="email" value="{{ $student->email }}"></input>
                        </div>
                        <div class="control-grup col-12 mb-3">
                            <label for="birthdate">Birthdate</label>
                            <input class="form-control" id="birthdate" name="birthdate" value="{{ $student->birthdate }}"></input>
                        </div>
                        <div class="control-grup col-12 mb-3">
                            <label for="city">City</label>
                            <select name="city_id" id="city" class="form-control">
                                <option value="{{ $student->city_id }}">{{ $student->city_name }}</option>
                                @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-success" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection