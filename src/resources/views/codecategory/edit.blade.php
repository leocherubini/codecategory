@extends('layouts.app')

@section('content')

	<div class="container">
		<h1>Edit Category</h1>

		{!! Form::open(['method'=>'put', 'route'=>['admin.categories.update', $category->id]]) !!}

			<div class="form-group">
				{!! Form::label('Parent', 'Parent:') !!}
				<select name="parent_id" class="form-control">
					@if($category->parent == null)
					<option value="">-None-</option>
					@else
					<option value="{{ $category->id }}">{{ $category->parent->name }}</option>
					@endif
					@foreach($categories as $cat)
					@if(($category->parent == null) && ($cat->id != $category->id))
					<option value="{{ $cat->id }}">{{ $cat->name }}</option>
					@elseif(($category->parent != null) && ($cat->id != $category->parent->id))
					<option value="{{ $cat->id }}">{{ $cat->name }}</option>
					@endif
					@endforeach
				</select>
			</div>

			<div class="form-group">
				{!! Form::label('Name', 'Name:') !!}
				{!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('Active', 'Active:') !!}
				{!! Form::checkbox('active', null, ($category->active == 'on' ? true : false)) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}

	</div>

@endsection