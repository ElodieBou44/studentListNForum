@extends('layouts.app')
@section('title', __('lang.text_login'))
@section('content')
        <hr>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <form method="post">
                    @csrf
                        <div class="card-header text-center">
                            <h3 class="display-5">@lang('lang.text_login')</h3>
                        </div>
                        <div class="card-body">   
                            <div class="control-grup col-12">
                                <label for="email">@lang('lang.text_email')</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}">
                                @if($errors->has('email'))
                                        <div class="text-danger mt-2">
                                        {{$errors->first('email')}}
                                        </div>       
                                @endif
                            </div>
                            <div class="control-grup col-12">
                                <label for="password">@lang('lang.text_password')</label>
                                <input type="password" id="password" name="password" class="form-control">
                                @if($errors->has('password'))
                                        <div class="text-danger mt-2">
                                        {{$errors->first('password')}}
                                        </div>       
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-grid mx-auto">
                                <input type="submit" class="btn btn-success btn-block" value="@lang('lang.text_login')">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection