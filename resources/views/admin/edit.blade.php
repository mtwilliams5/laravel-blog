@extends('layouts.master')

@section('content')
<div class="container">
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.update') }}" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <div class="btn-group" role="group" aria-label="Select tags">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tags
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                @foreach($tags as $tag)
                                    <a class="checkbox">
                                        <label>
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->name }}
                                        </label>
                                    </a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                <hr />
                <div class="form-group">
                    <textarea class="existing-title-editable" id="title" name="title" data-disable-return="true"><h1>{{ $post->title }}</h1></textarea>
                </div>
                <div class="form-group">
                    <textarea class="existing-body-editable" id="content" name="content">{{ $post->content }}</textarea>
                </div>
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $postId }}">
            </form>
        </div>
    </div>
</div>
@endsection