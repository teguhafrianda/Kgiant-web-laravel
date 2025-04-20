@extends('layouts.app')

@section('title', 'Category')

@section('content')
<div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Menu</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Category Management</a></li>
                                    <li class="breadcrumb-item active">Category Management</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Title -->

    <!-- Menampilkan Pesan Sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <!-- Kolom Kiri: Daftar Kategori -->
        <div class="col-md-8">
            <h3>All Categories</h3>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ ucfirst($category->type) }}</td>
                            <td>
                                <!-- Form Delete -->
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Kolom Kanan: Form Add New Category -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add New Category
                </div>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type">Category Type</label>
                            <select name="type" class="form-control" id="type" required>
                                <option value="drink">Drink</option>
                                <option value="food">Food</option>
                                <option value="playground">Playground</option>
                            </select>
                            @error('type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
