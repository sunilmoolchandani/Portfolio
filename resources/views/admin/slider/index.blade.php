@extends('admin.admin_master')
@section('admin')
@include('admin.sidebar')
<div class="py-12">
<div class="container">
<div class="row">
    <h3>Home slider</h3>
    <a href="{{route('add.slider')}}"><button type="submit" class="btn btn-primary">Add Slider</button></a>
<div class="col-md-12">
<div class="card">
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
</div>
@endif

<div class="card-header">All Slider</div>
<table class="table">
<thead>
<tr>
<th scope="col"width="20%">SL No.</th>
<th scope="col" width="20%">Slider Title</th>
<th scope="col"width="20%">Slider Description</th>
<th scope="col"width="20%">Image</th>
<th scope="col"width="20%">Actions</th>
</tr>
</thead>
<tbody>
    @php($i=1)
@foreach($sliders as $slider)
<tr>
<th scope="row">{{$i++}}</th>
<td>{{$slider->title}}</td>
<td>{{$slider->description}}</td>
<td><img src="{{asset($slider->image)}}" style="height: 40px;" alt=""></td>
<td>{{$slider->created_at->diffforHumans()}}</td>
<td><a class="btn btn-info" href=" {{url('slider/edit/'.$slider->id)}} ">Edit</a>
<a class="btn btn-danger" onclick="return confirm('Are your sure to delete')" href="{{url('slider/delete/'.$slider->id)}}">Delete</a>
</td>
</tr>
@endforeach
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