@extends('backendtemplate')
@section('title','Items')

@section('content')

<div class="container-fluid">
	<h2>Item Edit Form</h2>
	{{-- Must show related input errors --}}
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<form method="post" action="{{route('items.update',$item->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="inpoutCodeno" class="col-sm-2 col-form-label">Code No:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inpoutCodeno" name="codeno" value="{{$item->codeno}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="inpoutName" class="col-sm-2 col-form-label">Name:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inpoutName" name="name" value="{{$item->name}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="inpoutPhoto" class="col-sm-2 col-form-label">Photo:</label>
			<div class="col-sm-10">
				<input type="file" class="form-control-file" id="inpoutPhoto" name="photo" >
				<img src="{{asset($item->photo)}}" width="100">
				<input type="hidden" name="old_photo_path" value="{{$item->photo}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="inpoutPrice" class="col-sm-2 col-form-label">Price:</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" id="inpoutPrice" name="price" value="{{$item->price}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="inpoutDiscount" class="col-sm-2 col-form-label">Discount:</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" id="inpoutDiscount" name="discount" value="{{$item->discount}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="inpoutDescription" class="col-sm-2 col-form-label">Description:</label>
			<div class="col-sm-10">
				<textarea class="form-control" id="inpoutDescription" name="description">{{$item->description}}</textarea>
			</div>
		</div>

		<div class="form-group row">
			<label for="inputBrand" class="col-sm-2 col-form-label">BrandID:</label>
			
				<div class="col-sm-10">
					<select name="brand" class="form-control">
						<optgroup label="Choose Brand">
							@foreach($brands as $brand)
							<option value="{{$brand->id}}" @if($brand->id==$item->brand_id){{'selected'}}@endif>{{$brand->name}}</option>
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
							<option value="{{$subcategory->id}}" @if($subcategory->id==$item->subcategory_id){{'selected'}}@endif>{{$subcategory->name}}</option>
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