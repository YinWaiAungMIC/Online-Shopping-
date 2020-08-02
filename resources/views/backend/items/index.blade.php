@extends('backendtemplate')
@section('title','Items')
@section('css')
  <link href="{{ asset('backend_template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container-fluid">
	<h2 class="d-inline-block">Items List</h2>
	<a href="{{route('items.create')}}" class="btn btn-success float-right btn-sm">Add New</a>
	<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">CodeNo</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($items as $item)
    <tr>
      <input type="hidden" name="" id="deleteser" value="{{$item->id}}" >
      <td>{{$item->id}}</td><!-- table's column name -->
      <td>{{$item->codeno}}
      	<a href="" class="d-block"><span class="badge badge-success badge-pill">More</span></a></td>
      <td>{{$item->name}}</td>
      <td>{{$item->price}}</td>
      <td>
      	<a href="{{route('items.edit',$item->id)}}" class="btn btn-warning ">Edit</a>
       <form method="post" action="{{route('items.destroy',$item->id)}}" class="d-inline-block" id="delete-item{{ $item->id }}">
      		@csrf
      		@method('DELETE')
      	
        <button class="btn btn-danger btn-flat btn-sm " onclick="confirmDelete('delete-item'+{{ $item->id }})"> Delete</button>
      	
      	</form>  
        
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>

@endsection

@section('script')
<script src="{{ asset('backendtemplate/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backendtemplate/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backendtemplate/js/demo/datatables-demo.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  
    function comfirmDelete(item_id) {
      swal({
        title: "Are you sure to Delete?",
        text: "The data will be permanently deleted.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#'+item_id).submit();
        }
      });
    }
  </script>

@endsection




