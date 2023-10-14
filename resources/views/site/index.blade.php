<!-- Appeler le master (header + footer) -->
@extends('layouts.app')

@section('title', __('lang.text_student_list'))

@section('content')

<div class="container">
    {{--<a href="{{ route('site.create') }}" class="btn btn-warning mt-5">@lang('lang.text_add')</a>--}}
    <div class="row">
        <div class="col-12 text-center pt-2">
            <h1 class="display-1 mb-5">
            @lang('lang.text_students')
            </h1>
        </div>
    </div>
      <table class="table">
        <thead>
          <tr>
            <th>@lang('lang.text_name')</th>
            <th>@lang('lang.text_address')</th>
            <th>@lang('lang.text_phone')</th>
            <th>@lang('lang.text_email')</th>
            <th>@lang('lang.text_birthdate')</th>
            <th>@lang('lang.text_city')</th>
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
                @if($student->id == Auth::user()->id)
                <td>
                    <a href="{{ route('site.edit', $student->id) }}" class="btn btn-info">@lang('lang.text_update')</a>
                </td>
                @endif
            </tr>
            @empty
            <tr class="text-danger">@lang('lang.text_none_student')</tr>
            @endforelse
        </tbody>
      </table>
</div>

@endsection