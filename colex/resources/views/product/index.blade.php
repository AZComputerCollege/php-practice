@extends('main')

@section('title', 'Products')

@section('content')


<div class="d-flex flex-row justify-content-between py-3">
    <h1 class="fs-3">Products</h1>

    <a class="btn btn-info" href="{{ route('products.create') }}">Create Product</a>
</div>


    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Pname</th>
                    <th scope="col">Pdesc</th>
                    <th scope="col">Pcode</th>
                    <th scope="col">Pprice</th>
                    <th scope="col">PQTY</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="">
                        <td scope="row">{{ $product['id'] }}</td>
                        <td scope="row">{{ $product['pname'] }}</td>
                        <td scope="row">{{ $product['desc'] }}</td>
                        <td scope="row">{{ $product['pcode'] }}</td>
                        <td scope="row">{{ $product['pprice'] }}</td>
                        <td scope="row">{{ $product['qty'] }}</td>
                        <td scope="row">
                            <a class="btn btn-primary" href="{{ route('products.edit',$product) }}">Update</a>
                            <form action="{{ route('products.destroy',$product) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
