@extends('layouts.app')
@section('title', __('lang.text_files'))
@section('content')

<div class="container">
@php $locale = session()->get('locale') @endphp
    <a href="{{ route('files.create')}}" class="btn btn-info mt-5">@lang('lang.text_add_file')</a>
    <div class="row">
        <div class="col-12 text-center pt-2">
            <h1 class="display-1 mb-5">
                @lang('lang.text_files')
            </h1>
        </div>
    </div>
      <table class="table">
        <thead>
          <tr>
            <!-- <th>Id</th> -->
            <th>@lang('lang.text_file')</th>
            <th>@lang('lang.text_name')</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
            @forelse($files as $file)
            <tr>
                @if($locale=='en')
                <td><strong><a href="{{ route('files.show', $file->id) }}" class="text-dark">{{ $file->title_en }}</a></strong></td>
                @endif
                @if($locale=='fr')
                <td><strong><a href="{{ route('files.show', $file->id) }}" class="text-dark">{{ $file->title_fr }}</a></strong></td>
                @endif
                <td>{{ $file->fileHasUser->name }}</td>
                <td>{{ $file->fileHasUser->created_at }}</td>
            </tr>
            @empty
            <tr class="text-danger">@lang('lang.text_no_file')</tr>
            @endforelse
        </tbody>
      </table>
      {{ $files }}
</div>
@endsection