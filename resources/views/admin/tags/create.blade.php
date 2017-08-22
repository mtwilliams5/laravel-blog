@extends('layouts.master')

@section('content')
<div class="container">
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.tags.create') }}" method="post">
                <div class="form-group">
                    <label for="name">Tag Name: </label>
                    <input type="text" id="name" name="name">
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection