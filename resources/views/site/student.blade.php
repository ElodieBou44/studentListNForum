@extends('layouts.app')

@section('title', 'Student infos')

@section('content')

<div class="container d-flex mt-5 justify-content-between">
        <a href="{{ route('site.index') }}" class="btn btn-info ml-3">Go back to Student List</a>
    </div>
    <div class="container d-flex flex-column align-items-center">
        <h1 class="display-1 mt-5">{{ $student->name }}</h1>
        <div class="container d-flex flex-column mt-5">
            <table>
                <tr>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Birthdate</th>
                    <th>City</th>
                </tr>
                <tr>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->birthdate }}</td>
                    <td>{{ $student->city_name }}</td>
                </tr>
            </table>
        </div>
        <hr>
    </div>
    <div class="container d-flex justify-content-between mb-5">
        <a href="{{ route('site.edit', $student->id) }}" class="btn btn-primary">Update</a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
    </div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">Delete a student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you really want to delete the student "{{ $student->name }}"? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form action="{{ route('site.delete', $student->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
        </form>
      </div>
    </div>
  </div>
</div>

@endsection