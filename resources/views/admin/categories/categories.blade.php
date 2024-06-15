@extends('adminlte::page')

@section('title', 'Categories')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card my-5 mx-3">
            <div class="card-header">
                <h3 class="card-title">List of Categories</h3>
                <div class="card-tools">
                    <a href="{{ route('categories.create') }}" class="btn btn-light btn-sm mr-2"><i class="fas fa-fw fa-plus"></i> Add New Category</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="categories">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>About</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Created On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->about }}</td>
                                <td>{{ optional($category->createdBy)->name }}</td>
                                <td>{{ optional($category->updatedby)->name }}</td>
                                <td>{{ $category->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', ['category' => $category->category_id]) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('category.destroy', ['category' => $category->category_id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">
                                            <i class="fas fa-trash"></i> <!-- Delete Icon -->
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(function () {
            $('#categories').DataTable();

            // Show Error Messages
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif

            // Show Success Message
            @if(session('success'))
                toastr.success('{{ session('success') }}');
            @endif
        });
    </script>
@stop
