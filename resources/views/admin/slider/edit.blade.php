@extends('admin.admin_master')
@include('admin.sidebar')
@section('admin')
   <div class="py-12">
      <div class="container">
         <div class="row">
            
            <div class="col-md-8">
               <div class="card">
                  <div class="card-header">Edit Slider</div>
                  <div class="card-body">
                     <form action="{{url('slider/update/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                     
                        @csrf
                        <input type="hidden" name="old_image" value="{{$slider->image}}">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Titlle</label>
                           <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"                 value="{{$slider->title}}">
                           @error('title')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="exampleInputEmail1">Description</label>
                           <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{$slider->description}}">
                           @error('description')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="exampleInputEmail1">Image</label>
                           <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{$slider->image}}">
                           @error('image')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="form-group">
                            <img src="{{asset($slider->image)}}" style="width: 200px; height: 200px;">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Category</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection