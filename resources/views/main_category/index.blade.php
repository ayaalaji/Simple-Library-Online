@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Main Category</h2>
            </div>
            <div class="pull-right">
                @can('main-category-create')
                <a class="btn btn-success" href="{{ route('main-categories.create') }}"> Create New Main Category</a>
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
            <th width="280px">Action</th>
        </tr>
	    @foreach ($main_categories as $main_category)
	    <tr>
	        <td>{{ $loop->iteration }}</td>
	        <td>{{ $main_category->name }}</td>
	        <td>
                <form action="{{ route('main-categories.destroy',$main_category->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('main-categories.show',$main_category->id) }}">Show</a>
                    @can('main-category-edit')
                    <a class="btn btn-primary" href="{{ route('main-categories.edit',$main_category->id) }}">Edit</a>
                    @endcan


                    @method('DELETE')
                    @csrf
                    @can('main-category-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $main_categories->links() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection