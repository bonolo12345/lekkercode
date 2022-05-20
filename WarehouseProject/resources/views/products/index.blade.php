@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Warehouse Items</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Add New Item</a>
            </div>
        </div>
    </div>
    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="search" required/>
        <button type="submit">Search</button>
    </form>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Photo</th>
            <th>Quantity</th>
            <th width="280px">Actions</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td><img src="/image/{{ $product->image }}" width="75px"></td>
            <td>{{ $product->quantity }}</td>

            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">View</a>

                    <a class="btn btn-info" href="{{ route('products.edit',$product->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-info">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
