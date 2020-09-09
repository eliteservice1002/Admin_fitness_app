@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Recipe</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Recipe List</h3>
                <div class="block-options">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('recipes.create') }}" data-toggle="tooltip" title="Create">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="block-content">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p style="margin-bottom:0;">{{ $message }}</p>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10%;">No</th>
                                <th class="d-none d-sm-table-cell" style="width: 10%;">Image</th>
                                <th class="d-none d-sm-table-cell" style="width: 20%;">Title</th>
                                <th class="d-none d-sm-table-cell" style="width: 20%;">Category</th>
                                <th class="d-none d-sm-table-cell" style="width: 20%;">Description</th>
                                <th class="d-none d-md-table-cell text-center" style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recipes as $recipe)
                            <tr>
                                <td class="text-center">{{ ++$i }}</td>
                                <td class="d-none d-sm-table-cell">
                                    <img src="data:image/png;base64, {{ $recipe->image }}" width="100" height="100" alt="Recipe" />
                                </td>
                                <td class="d-none d-sm-table-cell">{{ $recipe->title }}</td>
                                <td class="d-none d-sm-table-cell">{{ $recipe->category->name }}</td>
                                <td class="d-none d-sm-table-cell">{!! $recipe->description !!}</td>
                                <td class="text-center">
                                    <form action="{{ route('recipes.destroy',$recipe->id) }}" method="POST">
                                        <div class="btn-group">
                                            <a class="btn btn-success" href="{{ route('recipes.show',$recipe->id) }}" data-toggle="tooltip" title="Show">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-primary" href="{{ route('recipes.edit',$recipe->id) }}"  data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">{!! $recipes->links() !!}</div>
                </div>
            </div>
        </div>
        <!-- END Your Block -->
    </div>
    <!-- END Page Content -->
@endsection
