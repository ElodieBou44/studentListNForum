@extends('layouts.app')

@section('title', __('lang.text_student_infos'))

@section('content')
<div class="container d-flex mt-5 justify-content-between">
        <a href="{{ route('site.index') }}" class="btn btn-info ml-3">@lang('lang.text_go_back')</a>
    </div>
    <div class="container d-flex flex-column align-items-center">
        <h1 class="display-1 mt-5">{{ $student->name }}</h1>
        <div class="container d-flex flex-column mt-5">
            <table>
                <tr>
                    <th>@lang('lang.text_address')</th>
                    <th>@lang('lang.text_phone')</th>
                    <th>@lang('lang.text_email')</th>
                    <th>@lang('lang.text_birthdate')</th>
                    <th>@lang('lang.text_city')</th>
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
        @if($student->id == Auth::user()->id)
        <a href="{{ route('site.edit', $student->id) }}" class="btn btn-primary">@lang('lang.text_update')</a>
        @endif
        {{--<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">@lang('lang.text_delete')</button>--}}
    </div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">@lang('lang.text_delete_student')</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @lang('lang.text_delete_confirmation')"{{ $student->name }}"? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.text_cancel')</button>
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