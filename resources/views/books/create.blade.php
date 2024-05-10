@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Book</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
            </div>
        </div>
    </div>


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


    <form action="{{ route('books.store') }}" method="POST">
        @method('POST')
    	@csrf

         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Author:</strong>
		            <input type="text" name="author" class="form-control" placeholder="Author">
		        </div>
		    </div>
            
		    <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Year:</strong>
		            <input type="number" name="year" class="form-control" placeholder="Year">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sub Category:</strong>
                    <select  name="sub_category_id" class="form-control" >
                        @foreach($sub_categories as $sub_category)
                           <option value=""></option>
                           <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                        @endforeach
                    </select>    
                </div>
            </div> 
        <!--  -->
             
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection