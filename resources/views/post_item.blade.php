@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品投稿ページ</h1>
           <div class="">
                <div class="d-flex flex-row flex-wrap">
                    {{-- @if (count($errors > 0))
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $eroor }}</li>   
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <form action="/" method="post">
                        @csrf
                        <p>商品名</p>
                        <input type="text" name="name" value="{{old('name')}}">
                        <p>商品の詳細文</p>
                        <input type="text" name="detail" value="{{old('detail')}}">
                        <p>値段</p>
                        <input type="text" name="fee" value="{{old('fee')}}">
                        {{-- <input type="text" name="stock_id" value="{{ $item->id }}"> --}}
                        <p>商品画像</p>
                        <input type="file" name="imgpath">
                        <p>
                            <input type="submit" value="商品一覧に追加する">
                        </p>
                    </form>
                </div>
            </div>
   </div>
</div>
@endsection