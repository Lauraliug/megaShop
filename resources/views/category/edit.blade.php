@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">atnaujinti</div>

            <div class="card-body">
               <form method="post" action="{{route('category.update',[$category])}}" enctype="multipart/form-data">
                  <div class="form-group">
                      <label>kategorijos pavadinimas</label>
                      <input type="text" name="name" value="{{$category->name}}" class="form-control">
                     
                  </div>
                  <div class="form-group">
                     <label >pagrindine kategorija</label>
                     <select class="custom-select" name="category_id">
                       <option value=""></option>
                        @foreach ($categories as $categoriesOne)
                            <option  <?php echo $categoriesOne->id === $category->category_id ? 'selected':''?>  value="{{$categoriesOne->id}}">{{$categoriesOne->name}}</option>
                        @endforeach
                     </select>
                    
                 </div>

                 <div class="form-group">
                    <label>parametrai</label>
                    <select class="custom-select" name="parameters[]" multiple>
                       
                       @foreach ($parameters as $parameter)
                           <option<?php echo in_array($parameter->id, $catParams) == $category->parameters ? 'selected':''?>  value="{{$parameter->id}}">{{$parameter->title}} {{$parameter->data_type}}</option>
                       @endforeach
                    </select>

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