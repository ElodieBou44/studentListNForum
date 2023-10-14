@extends('layouts.app')

@section('title', __('lang.text_update_student'))

@section('content')

<div class="container mt-5">
    <a href="{{ route('site.index') }}" class="btn btn-info ml-3">@lang('lang.text_go_back')</a>
    <div class="row">
        <div class="col-12 text-center pt-2">
            <h1 class="display-1">
            @lang('lang.text_update_student')
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
                    @lang('lang.text_form')
                    </div>
                    <div class="card-body">   
                        <div class="control-grup col-12 mb-3">
                            <label for="name">@lang('lang.text_name')</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $student->name }}">
                        </div>
                        <div class="control-grup col-12 mb-3">
                            <label for="address">@lang('lang.text_address')</label>
                            <input type="text" id="address" name="address" class="form-control" value="{{ $student->address }}">
                        </div>
                        <div class="control-grup col-12 mb-3">
                            <label for="phone">@lang('lang.text_phone')</label>
                            <input class="form-control" id="phone" name="phone" value="{{ $student->phone }}"></input>
                        </div>
                        <div class="control-grup col-12 mb-3">
                            <label for="email">@lang('lang.text_email')</label>
                            <input class="form-control" id="email" name="email" value="{{ $student->email }}"></input>
                        </div>
                        <div class="control-grup col-12 mb-3">
                            <label for="birthdate">@lang('lang.text_birthdate')</label>
                            <input class="form-control" id="birthdate" name="birthdate" value="{{ $student->birthdate }}"></input>
                        </div>
                        <div class="control-grup col-12 mb-3">
                            <label for="city">@lang('lang.text_city')</label>
                            <select name="city_id" id="city" class="form-control">
                                <option value="{{ $student->city_id }}">{{ $student->city_name }}</option>
                                @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-success" value="@lang('lang.text_update')">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection