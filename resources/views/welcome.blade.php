@extends('layouts.app')
@section('title', __('lang.text_welcome'))
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-4">
            <h1 class="display-1 mt-5">@lang('lang.text_student_list')</h1>
            <p>@lang('lang.text_welcome')</p>
            <a href="{{ route('site.index') }}" class="btn btn-outline-info">@lang('lang.text_display_students')</a>
        </div>
    </div>
</div>

@endsection