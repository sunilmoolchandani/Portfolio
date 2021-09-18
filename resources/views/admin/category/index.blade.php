<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
        </h2>
    </x-slot>
<div class="py-12">
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="card">
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
</div>
@endif
<div class="card-header">All Category</div>
<table class="table">
<thead>
<tr>
<th scope="col">SL No.</th>
<th scope="col">Category Name</th>
<th scope="col">User</th>
<th scope="col">Created at</th>
<th scope="col">Actions</th>
</tr>
</thead>
<tbody>
    <!-- @php($i=1) -->
@foreach($categories as $row)
<tr>
<th scope="row">{{$categories->firstItem()+$loop->index}}</th>
<td>{{$row->category_name}}</td>
<td>{{$row->user->name}}</td>
<td>{{$row->created_at->diffforHumans()}}</td>
<td><a class="btn btn-info" href=" {{url('category/edit/'.$row->id)}} ">Edit</a>
<a class="btn btn-danger" href="{{url('softdelete/category/'.$row->id)}}">Delete</a></td>
</tr>
@endforeach
</tbody>
</table>
<!-- categories links use for pagination -->
{{$categories->links()}}
</div>
    </div>  
    <div class="col-md-4">
<div class="card">
<div class="card-header">Add Category</div>
<div class="card-body">
<form action="{{Route('store.category')}}" method="POST">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category">
   @error('category_name')

<span class="text-danger">{{$message}}</span>
   @enderror
   </div>
  
  <button type="submit" class="btn btn-primary">Add Category</button>
</form>
</div>
</div>
</div>

            </div>
        </div>
    </div>



    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Trash Data
        </h2>
    </x-slot>
<div class="py-12">
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="card">
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
</div>
@endif
<div class="card-header">Trash Data</div>
<table class="table">
<thead>
<tr>
<th scope="col">SL No.</th>
<th scope="col">Category Name</th>
<th scope="col">User</th>
<th scope="col">Created at</th>
<th scope="col">Actions</th>
</tr>
</thead>
<tbody>
    <!-- @php($i=1) -->
@foreach($trashdata as $row)
<tr>
<th scope="row">{{$trashdata->firstItem()+$loop->index}}</th>
<td>{{$row->category_name}}</td>
<td>{{$row->user->name}}</td>
<td>{{$row->created_at->diffforHumans()}}</td>
<td><a class="btn btn-info" href="{{url('category/restore/'.$row->id)}}">Restore</a>
<a class="btn btn-danger" href="{{url('category/delete/'.$row->id)}}">Permanent Delete</a></td>
</tr>
@endforeach
</tbody>
</table>
<!-- categories links use for pagination -->
{{$trashdata->links()}}
</div>
    </div>  
        </div>
    </div>
</x-app-layout>





