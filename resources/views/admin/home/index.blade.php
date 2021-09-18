@extends('admin.admin_master')
@include('admin.sidebar')
@section('admin')
<div class="py-12">
<div class="container">
<div class="row">
    <h3>Home about</h3>
    <a href="{{route('add.about')}}"><button type="submit" class="btn btn-primary">Add About</button></a>
<div class="col-md-12">
<div class="card">
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
</div>
@endif

<div class="card-header">Home About</div>
<table class="table">
<thead>
<tr>
<th scope="col"width="20%">SL No.</th>
<th scope="col" width="20%">Home Title</th>
<th scope="col"width="20%">Short Description</th>
<th scope="col"width="20%">Description</th>
<th scope="col"width="20%">Actions</th>
</tr>
</thead>
<tbody>
    @php($i=1)

<tr>
<th scope="row">{{$i++}}</th>
<td>{{$homeabout->title}}</td>
<td>{{$homeabout->short_desc}}</td>
<td>{{$homeabout->desc}}</td>
<td>{{$homeabout->created_at->diffforHumans()}}</td>
<td><a class="btn btn-info" href=" {{url('about/edit/'.$homeabout->id)}} ">Edit</a>
<a class="btn btn-danger" onclick="return confirm('Are your sure to delete')" href="{{url('about/delete/'.$homeabout->id)}}">Delete</a>
</td>
</tr>

</tbody>
</table>
<!-- categories links use for pagination -->

</div>
    </div>  
    
            </div>
        </div>
    </div>



 
    </div>
@endsection