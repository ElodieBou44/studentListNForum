@extends('layouts.app')

@section('title',  __('lang.text_post'))

@section('content')
<div class="container d-flex mt-5 justify-content-between">
    @php $locale = session()->get('locale') @endphp
    <a href="{{ route('forum.index') }}" class="btn btn-info ml-3">@lang('lang.text_go_back_forum')</a>
    </div>
    <div class="container d-flex flex-column align-items-center">
        <h1 class="display-1 mt-5">@lang('lang.text_post')</h1>
        <div class="container d-flex flex-column mt-5">
            <h2 class="mb-3">
              @if($locale=='en')
              {{ $post->title_en }}
              @elseif($locale=='fr')
              {{ $post->title_fr }}
              @endif
            </h2>

            @if($locale=='en')
            <p>{{ $post->body_en }}</p>
            @endif
            @if($locale=='fr')
            <p>{{ $post->body_fr }}</p>
            @endif
            
            <p class="mt-5"><strong>Author: </strong>{{ $post->postHasUser->name }}</p>
            <p><strong>Created at: </strong>{{ $post->created_at }}</p>
        </div>
        <hr>
    </div>
    @if( Auth::user()->id == $post->user_id)
      <div class="container d-flex justify-content-between mb-5">
          <a href="{{ route('forum.edit', $post->id) }}" class="btn btn-info">@lang('lang.text_update')</a>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">@lang('lang.text_delete')</button>
      </div>
    @endif

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">@lang('lang.text_post_delete')</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if($locale=='en')
          @lang('lang.text_post_delete_confirmation')"{{ $post->title_en }}"? 
        @elseif($locale=='fr')
          @lang('lang.text_post_delete_confirmation')"{{ $post->title_fr }}"? 
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.text_cancel')</button>
        <form action="{{ route('forum.delete', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="@lang('lang.text_delete')" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection