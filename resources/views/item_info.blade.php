@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品詳細</h1>
           <div class="">
               
               <div class="d-flex flex-row flex-wrap">
                   
                       
                   {{$item->name}}
                   {{$item->detail}}
                   {{$item->fee}}円
                   <img src="/image/{{$item->imgpath}}" alt="" class="incart" >
                </div>
                {{-- カートに入れる --}}
                <form action="/mycart" method="post">
                    @csrf
                    <input type="hidden" name="stock_id" value="{{ $item->id }}">
                    <input type="submit" value="カートに入れる">
                </form>
            </div>
       </div>
   </div>
</div>
@endsection