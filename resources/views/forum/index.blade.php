@extends('layouts.app')

@section('title', __('lang.text_forum'))

@section('content')
<div class="container d-flex row justify-content-between mt-5">
    <div>
        <a href="{{ route('forum.create') }}" class="btn btn-warning mt-5">@lang('lang.text_add_post')</a>
    </div>
</div>
<div class="row mt-3">
@php $locale = session()->get('locale') @endphp
    <div class="col-12">
        <div class="card">
            <div class="card-header text-center">
                <h1 class="display-1">@lang('lang.text_post_list')</h1>
            </div>
            <div class="card-body">
                <ul>
                    @forelse($posts as $post)
                    @if($locale=='en')
                    <li><a href="{{ route('forum.show', $post->id) }}" class="text-dark">{{ $post->title_en }} by {{ $post->postHasUser->name }}</a></li>
                    @endif
                    @if($locale=='fr')
                    <li><a href="{{ route('forum.show', $post->id) }}">{{ $post->title_fr }} by {{ $post->postHasUser->name }}</a></li>
                    @endif
                    @empty
                        <li class="text-danger">@lang('lang.text_no_post')</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection