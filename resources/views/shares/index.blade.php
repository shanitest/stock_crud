@extends('layout')

@section('title')
  Show Stock
@endsection

@section('content')

<div class="uper">
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br />
    @endif

    <a href="{{ route('shares.create')  }}" class="btn btn-primary float-right mb-2">Add New Stock</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <td>ID</td>
            <td>Stock Name</td>
            <td>Stock Price</td>
            <td>Stock Quantity</td>
            <td colspan="2">Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($shares as $share)
            <tr>
                <td>{{$share->id}}</td>
                <td>{{$share->share_name}}</td>
                <td>{{$share->share_price}}</td>
                <td>{{$share->share_qty}}</td>
                <td><a href="{{ route('shares.edit',$share->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('shares.destroy', $share->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

