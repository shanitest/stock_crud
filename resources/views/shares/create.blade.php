@extends('layout')

@section('title')
    Add Share
@endsection


@section('content')
    <div class="card uper">
        <div class="card-header">
            Add Share
        </div>
        <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif


        <form method="post" action="{{ route('shares.store') }}">
            <div class="form-group">
                @csrf
                <label for="name">Share Name:</label>
                <input type="text" class="form-control" name="share_name" value="{{ old('share_name') }}"/>
            </div>
            <div class="form-group">
                <label for="price">Share Price :</label>
                <input type="text" class="form-control" name="share_price" value="{{ old('share_price') }}"/>
            </div>
            <div class="form-group">
                <label for="quantity">Share Quantity:</label>
                <input type="text" class="form-control" name="share_qty" value="{{ old('share_qty') }}"/>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
        </div>
    </div>
@endsection