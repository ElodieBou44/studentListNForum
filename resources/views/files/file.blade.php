@extends('layouts.app')

@section('title',  __('lang.text_file'))

@section('content')

<div class="container d-flex mt-5 justify-content-between">
    @php $locale = session()->get('locale') @endphp
    <a href="{{ route('files.index') }}" class="btn btn-info ml-3">@lang('lang.text_go_back_forum')</a>
    </div>
    <div class="container d-flex flex-column align-items-center">
        <h1 class="display-1 mt-5">@lang('lang.text_file')</h1>
        <div class="container d-flex flex-column mt-5">
            <h2 class="mb-3">
              @if($locale=='en')
              {{ $file->title_en }}
              @elseif($locale=='fr')
              {{ $file->title_fr }}
              @endif
            </h2>
            <p class="mt-5"><strong>From: </strong>{{ $file->fileHasUser->name }}</p>
            <p><strong>Created at: </strong>{{ $file->created_at }}</p>
            <p>
                <!-- #->cheminVersLeFichier/fichier.pdf -->
                <a href="{{ asset('storage/' . $file->name) }}" class="btn btn-warning" download="{{ $file->name }}">@lang('lang.text_download')</a>
            </p>
        </div>
        <hr>
    </div>
    @if( Auth::user()->id == $file->user_id)
      <div class="container d-flex justify-content-between mb-5">
          <a href="{{ route('files.edit', $file->id) }}" class="btn btn-info">@lang('lang.text_update')</a>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">@lang('lang.text_delete')</button>
      </div>
    @endif

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">@lang('lang.text_file_delete')</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if($locale=='en')
          @lang('lang.text_file_delete_confirmation')"{{ $file->title_en }}"? 
        @elseif($locale=='fr')
          @lang('lang.text_file_delete_confirmation')"{{ $file->title_fr }}"? 
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.text_cancel')</button>
        <form action="{{ route('files.delete', $file->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="@lang('lang.text_delete')" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection