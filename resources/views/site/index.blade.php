<!-- Appeler le master (header + footer) -->
@extends('layouts.app')

@section('title', 'Student list')

@section('content')

<div class="container">
    <a href="{{ route('site.create') }}" class="btn btn-warning mt-5">Add a student</a>
    <div class="row">
        <div class="col-12 text-center pt-2">
            <h1 class="display-1 mb-5">
                Students
            </h1>
        </div>
    </div>
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Birthdate</th>
            <th>City</th>
          </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
            <tr>
                <td><strong><a href="{{ route('site.show', $student->id) }}" class="text-dark">{{ $student->name }}</a></strong></td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->birthdate }}</td>
                <td>{{ $student->city_name }}</td>
                <td>
                    <a href="{{ route('site.edit', $student->id) }}" class="btn btn-info">Update</a>
                </td>
            </tr>
            @empty
            <tr class="text-danger">Aucun étudiant</tr>
            @endforelse
        </tbody>
      </table>
</div>

@endsection