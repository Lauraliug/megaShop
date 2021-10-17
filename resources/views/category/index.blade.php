@extends('layouts.app')

@section('content')
<div class="container">

    @if(Auth::user() && Auth::user()->isAdmin())
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Admino panele
                </div>
                <div class="card-body">
                    @if ((count($chain) > 0))
                    <a href="{{route('item.create', $chain[count($chain)-1]->id )}}">ideti preke i "{{$chain[count($chain)-1]->name}}" kategoriją</a><br>
                    <?php $category = $chain[count($chain) - 1]; ?>
                    @else
                    <?php $category = 0; ?>
                    @endif
                    <a href="{{route('category.create', [$category])}}">sukurti kategorija cia</a>
                </div>
                <!-- <div class="card-body">
                    <form style="display: inline-block" action="{{route('category.store')}}" method="post">
                        @csrf
                        <input type="text" name="name">
                        @php
                        if(count($chain) == 0 ){
                        $categoryId = 0;
                        }else{
                        $categoryId = $chain[count($chain) -1]->id;
                        }
                        @endphp
                        <input type="hidden" name="category_id" value="{{$categoryId}}">
                        <button type="submit">pridėti</button>
                    </form>
                </div>-->
            </div>
        </div>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h1>{{(count($chain) > 0)?$chain[count($chain)-1]->name :""}}</h1>
                </div>
                <div class="card-header">
                    @if (count($chain)== 0)
                    HOME
                    @endif
                    @foreach ($chain as $item)
                    @if(next($chain))
                    <a class="chain" href="{{route('category.map', $item)}}"> {{$item->name}} ></a>
                    @else
                    <a class="chain chain-last" href="{{route('category.map', $item)}}"> {{$item->name}} </a>
                    @endif
                    @endforeach
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td class=""> <a href="{{route('category.map',$category)}}"> {{$category->name}}</a></td>
                                <td class="align-middle text-center">
                                    <a class="btn btn-primary" href="{{route('category.edit',[$category])}}">redaguoti</a>
                                    <form style="display: inline-block" method="post" action="{{route('category.destroy', $category)}}">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">trinti</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-body">
                    @if(isset($items))
                    @foreach ($items as $item)
                    <a href="{{route('item.show', $item->id)}}">
                        <div class="Item {{($item->status==0)?"disabled":"" }}">
                            <div style="text-align:center;">{{$item->name}}</div>
                            <div style=" margin-left:25px; width:200px;height:200px; position: relative;">
                                @if(count($item->photos) > 0)
                                <img style="max-height:200px;position:absolute;top:50%;left:50%; transform:translate(-50%,-50%);" src="{{asset("/images/items/small/".$item->photos[0]->name)}}" alt="">
                                @else
                                <img style="max-height:200px;position:absolute;top:50%;left:50%; transform:translate(-50%,-50%);" src="{{asset("/images/icons/itemDefault.png")}}" alt="">
                                @endif
                            </div>
                            @if($item->discount > 0)
                            <div style="margin-left:25px; text-decoration:line-through; text-decoration-thickness: 2px; font-weight:900; font-size:18px; position:relative">{{$item->price}}€
                                <div style="position:absolute; padding: 0 7px;  background-color:blue; color:yellow;  transform: rotate(-12deg); font-size:25px; bottom:35px; right:20px;">{{$item->discountPrice()}} </div>
                                @else
                                <div style="margin-left:25px; font-weight:900; font-size:18px;">{{$item->price}}€
                                    @endif
                                </div>
                                <div style="margin-left:25px;">gamintojas: {{$item->manufacturer}}</div>
                                <div style="margin-left:25px;">prekes likutis: {{$item->quantity}}</div>
                                <object><a style="margin-left:80px;" {{($item->status==0)?"avoid-clicks":""}} class="btn btn-primary" href="">Į krepšelį</a> </object>
                                <div class="heart">
                                    <a href="" class="fa fa-heart" style="color: blue;"></a>
                                </div>
                            </div>
                    </a>
                    @endforeach
                    @endif
                </div>

               

            </div>
        </div>
    </div>
</div>
@endsection