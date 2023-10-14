@extends('layouts.app')
@section('title', __('lang.text_add'))

@section('content')
<div class="container mt-5">
    <a href="{{ route('forum.index') }}" class="btn btn-info ml-3">@lang('lang.text_go_back_files')</a>
    <div class="row">
        <div class="col-12 text-center pt-2">
            <h1 class="display-1">
            @lang('lang.text_add_file')
            </h1>
        </div>
    </div>
            <hr>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form action="" method="post" enctype="multipart/form-data">
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
                                <label for="file">@lang('lang.text_file')</label>
                                <input type="file"class="form-control" id="file" name="name" accept=".pdf, .zip, .doc">
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