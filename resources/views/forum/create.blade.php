@extends('layouts.app')
@section('title', __('lang.text_add'))

@section('content')
<div class="container mt-5">
    <a href="{{ route('forum.index') }}" class="btn btn-info ml-3">@lang('lang.text_go_back')</a>
    <div class="row">
        <div class="col-12 text-center pt-2">
            <h1 class="display-1">
            @lang('lang.text_add_post')
            </h1>
        </div>
    </div>
            <hr>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form action="" method="post">
                    @csrf
                    <div class="card-header">
                        @lang('lang.text_form')
                    </div>
                    <div class="card-body">   
                            <input hidden name="user_id" value="{{ Auth::user()->id }}">
                            <div class="control-grup col-12">
                                <label for="title">@lang('lang.text_title_fr')</label>
                                <input type="text" id="title" name="title_fr" class="form-control">
                            </div>
                            <div class="control-grup col-12">
                                <label for="title">@lang('lang.text_title_en')</label>
                                <input type="text" id="title" name="title_en" class="form-control">
                            </div>
                            <div class="control-grup col-12">
                                <label for="message">@lang('lang.text_body_fr')</label>
                                <textarea class="form-control" id="message" name="body_fr"></textarea>
                            </div>
                            <div class="control-grup col-12">
                                <label for="message">@lang('lang.text_body_en')</label>
                                <textarea class="form-control" id="message" name="body_en"></textarea>
                            </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-warning" value="@lang('lang.text_save')">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection