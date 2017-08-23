@extends('layouts.master')

@section('content')
<div class="container">
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.tags.update') }}" method="post">
                <div class="form-group">
                    <label for="name">Tag Name: </label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $tag->name }}">
                </div>
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $tagId }}">
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection