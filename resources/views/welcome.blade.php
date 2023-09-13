@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-4">
            <h1 class="display-1 mt-5">{{ config('app.name') }}</h1>
            <p>Welcome to your student list.</p>
            <a href="{{ route('site.index') }}" class="btn btn-outline-info">Display students</a>
        </div>
    </div>
</div>

@endsection