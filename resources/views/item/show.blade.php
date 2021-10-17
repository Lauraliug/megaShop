@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Prekės pavadinimas</label>
                        {{$item->name}}
                    </div>
                    <div class="form-group">
                        <label>Prekės kaina</label>
                        {{$item->price}}
                    </div>
                    <div class="form-group">
                        <label>Prekės aprasymas</label>
                        {{$item->description}}
                    </div>
                    <div class="form-group">
                        <label>Gamintojas</label>
                        {{$item->manufacturer}}
                    </div>
                    <div class="form-group">
                        <label>Prekės likutis</label>
                        {{$item->quantity}}
                    </div>
                    <div class="form-group">
                        <label>Rodyti prekę</label>
                        <input type="checkbox" name="show" id="">
                    </div>
                    <div class="form-group">
                        <label>Nuolaida</label>
                        {{$item->discount}}
                    </div>
                    @foreach ($item->parameters as $param)
                    {{$param->title}} {{$param->pivot->data}} {{$param->data_type}} <br>
                    @endforeach
                    <form action="{{route('item.softDelete',$item)}}" method="post">
                        @csrf
                        @if ($item->status == 10)
                        <button class="btn btn-primary" type="submit" name="softDelete" value=1>nerodyti</button>
                        @else
                        <button class="btn btn-success" type="submit" name="softDelete" value=0>rodyti</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection