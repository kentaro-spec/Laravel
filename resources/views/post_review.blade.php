@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">レビュー投稿ページ</h1>
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
                    <form action="/item_review" method="post">
                        @csrf
                        <p>総合評価</p>
                        <input type="radio" name="evaluation" value="1">星1
                        <input type="radio" name="evaluation" value="2">星2
                        <input type="radio" name="evaluation" value="3">星3
                        <input type="radio" name="evaluation" value="4">星4
                        <input type="radio" name="evaluation" value="5">星5
                        <p>レビュータイトル</p>
                        <input type="text" name="review_title">
                        <p>ここにレビューを記入してください</p>
                        <textarea name="comment" id="" cols="30" rows="10"></textarea>
                            <input type="submit" value="レビューを投稿する">
                        </p>
                    <input type="hidden" name="stock_id" value="{{ $stock_id }}">
                    </form>
                </div>
            </div>
   </div>
</div>
@endsection