@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">redaguoti</div>

            <div class="card-body">
               <form method="POST" action="{{route('parameter.update',[$parameter])}}">
               <div class="form-group">
                  <label>parametras</label>
                  <input type="text" name="title" value="{{$parameter->title}}" class="form-control">

                  <br>
                  <label>matavimo vienetas</label>
                  <input type="text" name="data_type" value="{{$parameter->data_type}}" class="form-control">
                  <br>
                  <input type="hidden" name="id" value="{{$parameter->id}}">
            </div>

            @csrf
            <button class="btn btn-success" type="submit">redaguoti</button>
            </form>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection