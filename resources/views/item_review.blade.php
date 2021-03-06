@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">レビュー一覧</h1>
           <div class="">
               
               <div class="d-flex flex-row flex-wrap">
                   
                </div>
                <div class="text-center" style="width: 200px;margin: 20px auto;">
                </div>

                {{-- {{dd($items)}} --}}
                {{-- 商品詳細 --}}
                {{$items->name}}
                {{$items->detail}}
                {{$items->fee}}円
                <img src="/image/{{$items->imgpath}}" alt="" class="incart" >
                

                {{-- オブジェクトからコレクションインスタンスをとってそれを回す --}}
               @foreach ($items->reviews as $review)
                    <table>
                        <tr><th>評価</th><td>星{{$review->evaluation}}</td></tr>
                        <tr><th>レビュータイトル</th><td>{{$review->review_title}}</td></tr>
                        <tr><th>コメント</th><td>{{$review->comment}}</td></tr>
                    </table>
                    <br>
                @endforeach

                {{-- <a href="{{ url('/post_review/?id='.$reviews->id) }}">この商品のレビューを書く</a> --}}
                <a href="{{ Route('post_review',['id' => $items->id]) }}">この商品のレビューを書く</a>
            </div>
            </div>
       </div>
   </div>
</div>
@endsection