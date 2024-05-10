@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Books</h2>
            </div>
            <div class="pull-right">
                @can('book-create')
                <a class="btn btn-success" href="{{ route('books.create') }}"> Create New Book</a>
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
            <th>Author</th>
            <th>Year</th>
            <th>Sub Category</th> 
            <th width="280px">Action</th>
        </tr>
	    @foreach ($books as $book)
	    <tr>
	        <td>{{ $loop->iteration }}</td>
	        <td>{{ $book->name }}</td>
	        <td>{{ $book->author }}</td>
	        <td>{{ $book->year }}</td>
	        <td>{{ $book->subCategory->name }}</td>
	        <td>
                <form action="{{ route('books.destroy',$book->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('books.show',$book->id) }}">Show</a>
                    @can('book-edit')
                    <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
                    @endcan


                    @method('DELETE')
                    @csrf
                    @can('book-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $books->links() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection