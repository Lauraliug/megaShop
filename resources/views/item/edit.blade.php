@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">redaguoti</div>

            <div class="card-body">
               <form method="POST" action="{{route('item.update',[$item])}}" >

                  <div class="form-group">
                      <label>prekes pavadinimas</label>
                      <input type="text" name="name" value="{{$item->name}}" class="form-control">
                  </div>

                  <div class="form-group">
                      <label>prekes kaina</label>
                      <input type="text" name="price" value="{{$item->price}}" class="form-control">
                  </div>

                  <div class="form-group">
                      <label>prekes aprasymas</label>
                      <input type="text" name="description" value="{{$item->description}}" class="form-control">
                  </div> 

                  <div class="form-group">
                  <label>gamintojas</label>
                  <input type="text" name="manufacturer" value="{{$item->manufacturer}}" class="form-control">
               </div>

                  <div class="form-group">
                      <label>prekes kiekis</label>
                      <input type="text" name="quantity" value="{{$item->quantity}}" class="form-control">
                  </div>

                  <div class="form-group">
                      <label>prekes nuolaida</label>
                      <input type="text" name="discount" value="{{$item->discount}}" class="form-control">
                  </div>
                  <input type="hidden" name="item_id" value="{{$item->id}}">
                <input type="hidden" name="category_id" value="{{$category->id}}">
                  @foreach ($item->parameters as $parameter)
                  <div class="form-group">
                      <label>{{$parameter->title}}</label>
                      <input type="text" name="{{$parameter->id}}"  class="form-control" value="{{$parameter->pivot->data}}">
                  </div>
                  @endforeach
                  @csrf
                  <button class="btn btn-success" type="submit">redaguoti</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection