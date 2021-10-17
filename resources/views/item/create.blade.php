@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">Sukurti {{$category->name}} kategorijoje</div>

            <div class="card-body">
               <form method="POST" action="{{route('item.store')}}"  enctype="multipart/form-data">

                  <div class="form-group">
                      <label>prekes pavadinimas</label>
                      <input type="text" name="name"  class="form-control">
                  </div>

                  <div class="form-group">
                      <label>prekes kaina</label>
                      <input type="text" name="price"  class="form-control">
                  </div>

                  <div class="form-group">
                      <label>prekes aprasymas</label>
                      <input type="text" name="description"  class="form-control">
                  </div> 

                  <div class="form-group">
                  <label>gamintojas</label>
                  <input type="text" name="manufacturer"  class="form-control">
               </div>

                  <div class="form-group">
                      <label>prekes kiekis</label>
                      <input type="text" name="quantity"  class="form-control">
                  </div>

                  <div class="form-group">
            <label>Rodyti prekę</label>
            <input type="checkbox" name="show" id="">
        </div>

                  <div class="form-group">
                      <label>prekes nuolaida</label>
                      <input type="text" name="discount"  class="form-control">
                  </div>
                <input type="hidden" name="category_id" value="{{$category->id}}">
                  @foreach ($category->parameters as $parameter)
                  <div class="form-group">
                      <label>{{$parameter->title}}</label>
                      <input type="text" name="{{$parameter->id}}"  class="form-control" placeholder="{{$parameter->data_type}}">
                  </div>
                  @endforeach
                  <input type="file" name="photos[]" id="" multiple>
                  @csrf
                  <button class="btn btn-success" type="submit">prideti</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection