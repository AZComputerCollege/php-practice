@extends('main')

@section('title', 'Products')

@section('content')
    <h1 class="text-center my-5 border border-black py-2">Bootstrap Product Form</h1>
  <form action="{{ route('products.store') }}" method="POST">
    @csrf

    <div class="container mt-4">
        <div class="card p-4 shadow">
            <h4 class="mb-3">Add Product</h4>

            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="pname" class="form-control" placeholder="Enter product name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Product Code</label>
                <input type="text" name="pcode" class="form-control" placeholder="Enter product code" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="desc" class="form-control" rows="3" placeholder="Enter description"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="pprice" class="form-control" placeholder="Enter price" step="0.01" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name="qty" class="form-control" placeholder="Enter quantity" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="is_active" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save Product</button>
        </div>
    </div>
</form>
@endsection