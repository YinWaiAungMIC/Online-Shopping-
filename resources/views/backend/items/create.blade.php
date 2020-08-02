@extends('backendtemplate')
@section('title','Items')

@section('content')

<div class="container-fluid">
	<h2>Item Create Form</h2>
	

	<form method="post" action="{{route('items.store')}}" enctype="multipart/form-data">
		@csrf
		<div class="form-group row">
			<label for="inpoutCodeno" class="col-sm-2 col-form-label">Code No:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inpoutCodeno" name="codeno">
				@error('codeno')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>

		</div>
		<div class="form-group row">
			<label for="inpoutName" class="col-sm-2 col-form-label">Name:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inpoutName" name="name">
				@error('name')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
		</div>
		<div class="form-group row">
			<label for="inpoutPhoto" class="col-sm-2 col-form-label">Photo:</label>
			<div class="col-sm-10">
				<input type="file" class="form-control-file" id="inpoutPhoto" name="photo">
				@error('photo')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
		</div>
		<div class="form-group row">
			<label for="inpoutPrice" class="col-sm-2 col-form-label">Price:</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" id="inpoutPrice" name="price">
				@error('price')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
		</div>
		<div class="form-group row">
			<label for="inpoutDiscount" class="col-sm-2 col-form-label">Discount:</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" id="inpoutDiscount" name="discount" value="0">
				@error('discount')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
		</div>
		<div class="form-group row">
			<label for="inpoutDescription" class="col-sm-2 col-form-label">Description:</label>
			<div class="col-sm-10">
				<textarea class="form-control" id="inpoutDescription" name="description"></textarea>
				@error('description')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="inputBrand" class="col-sm-2 col-form-label">BrandID:</label>
			
				<div class="col-sm-10">
					<select name="brand" class="form-control">
						<optgroup label="Choose Brand">
							@foreach($brands as $brand)
							<option value="{{$brand->id}}">{{$brand->name}}</option>
							@endforeach
						</optgroup>


					</select>
				</div>
			
		</div>
		<div class="form-group row">
				<label for="inputSubcategory" class="col-sm-2 col-form-label">Subcategory:</label>
				<div class="col-sm-10">
					<select name="subcategory" class="form-control">
						<optgroup label="Choose Subcategory">
							@foreach($subcategories as $subcategory)
							<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
							@endforeach
						</optgroup>


					</select>
				</div>
		</div>

		<div class="form-group row">
			<input type="submit" name="btnsubmit" value="Save" class="btn btn-primary">
		</div>

		</form>
	</div>



@endsection