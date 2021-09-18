@extends('admin.admin_master')
@include('admin.sidebar')
@section('admin')
<div class="col-lg-12">
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Edit About</h2>
										</div>
										<div class="card-body">
											<form action="{{url('update/homeabout/'.$homeabout->id)}}" 
                                            method="post">
                                            @csrf
												<div class="form-group">
													<label for="exampleFormControlInput1">About Title</label>
													<input type="text" class="form-control" name="title" id="exampleFormControlInput1" value="{{$homeabout->title}}" >
													
												</div>
												
												
											
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Short Description</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" name="short_desc" rows="3"> {{$homeabout->short_desc}}</textarea>
												</div>
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Long Description</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3" >{{$homeabout->desc}}</textarea>
												</div>
												<div class="form-footer pt-4 pt-5 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-default">Submit</button>
													
												</div>
											</form>
										</div>
									</div>

									
								</div>
@endsection