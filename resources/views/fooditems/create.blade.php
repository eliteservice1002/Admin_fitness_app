@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Add New FoodItem</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Add New FoodItem</h3>
                <div class="block-options">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('fooditems.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <div class="block-content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('fooditems.store') }}" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-xs-10 col-sm-10 col-md-10">
                            <div class="form-group row">
                                <label for="food_categories_id" class="col-sm-4">Food Category:</label>
                                <div class="col-sm-8">
                                    <select name="food_categories_id" id="food_categories_id" class="form-control">
                                        @foreach($foodcategories as $foodcategory)
                                            <option value="{{$foodcategory->id}}">{{$foodcategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4">Food Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="food_name" name="food_name" placeholder="Enter Food Name...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4">Carbon:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="carbon" name="carbon" placeholder="Enter Carbon...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4">Protein:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="protein" name="protein" placeholder="Enter Protein...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4">Fat:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="fat" name="fat" placeholder="Enter Fat...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4">Portion In Grams:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="portion_in_grams" name="portion_in_grams" placeholder="Enter Portion In Grams...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-fw fa-check"></i> Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Your Block -->
    </div>
    <!-- END Page Content -->
@endsection
