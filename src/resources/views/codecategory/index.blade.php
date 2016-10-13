@extends('layouts.app')

@section('content')

	<div class="container">
		<h3>Categories</h3>
		<br>
		<a href="{{ route('admin.categories.create') }}">Create Category</a>

		<table class="table">
			<thead>
				<th>ID</th>
				<th>Name</th>
				<th>Status</th>
				<th>Action</th>
			</thead>
			<tbody>
				@foreach($categories as $category)
				<tr>
					<td>{{$category->id}}</td>
					<td>{{$category->name}}</td>
					<td>{{$category->active}}</td>
					<td>
						<a href="{{ route('admin.categories.edit', ['id'=>$category->id]) }}" class="btn btn-primary">Edit</a>
						<a href="{{ route('admin.categories.destroy', ['id'=>$category->id]) }}" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection