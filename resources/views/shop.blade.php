@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
           <div class="">
               
               <div class="d-flex flex-row flex-wrap">
                    @foreach($stocks as $stock)
                        <div class="col-xs-6 col-sm-4 col-md-4 ">
                            <div class="mycart_box">
                                    {{$stock->name}} <br>
                                    {{$stock->fee}}円<br>
                                    <img src="/image/{{$stock->imgpath}}" alt="" class="incart" >
                                    <br>
                                    {{$stock->detail}} <br>

                                    {{-- 商品詳細ページへ --}}
                                <form action="/item_info" method="post">
                                    @csrf
                                    <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                                    <input type="submit" value="商品の詳細へ">
                                </form>

                                    {{-- カートへ入れる --}}
                                <form action="/mycart" method="post">
                                    @csrf
                                    <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                                    <input type="submit" value="カートに入れる">
                                </form>
                                <form action="/item_review" method="post">
                                    @csrf
                                    <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                                </form>
                                {{-- <a href="{{ url('/item_review/?id='.$stock->id) }}">この商品のレビューを見る</a> --}}
                                <a href="{{ route('review', ['id' => $stock->id]) }}">この商品のレビューを見る</a>
                                
                                {{-- <input type="submit" value="この商品のレビューを見る"> --}}
                            </div>
                        </div>

                    @endforeach
                    
                </div>
                {{-- <a class="text-center" href="/">商品一覧へ</a> --}}
                <div class="text-center" style="width: 200px;margin: 20px auto;">
                {{$stocks->links()}} 
                </div>
                <a href="{{ url('/post_item') }}">商品を追加する</a>
            </div>
       </div>
   </div>
</div>
@endsection