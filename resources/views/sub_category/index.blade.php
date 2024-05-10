@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sub Category</h2>
            </div>
            <div class="pull-right">
                @can('sub-category-create')
                <a class="btn btn-success" href="{{ route('sub-categories.create') }}"> Create New Sub Category</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Main Category</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($sub_categories as $sub_category)
	    <tr>
	        <td>{{ $loop->iteration  }}</td>
	        <td>{{ $sub_category->name }}</td>
            <td>{{ $sub_category->mainCategory->name }}</td>
	        <td>
                <form action="{{ route('sub-categories.destroy',$sub_category->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('sub-categories.show',$sub_category->id) }}">Show</a>
                    @can('sub-category-edit')
                    <a class="btn btn-primary" href="{{ route('sub-categories.edit',$sub_category->id) }}">Edit</a>
                    @endcan


                    @method('DELETE')
                    @csrf
                    @can('sub-category-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $sub_categories->links() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection