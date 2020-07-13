<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Cart;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail; //追記
use App\Mail\Thanks;//追記

class ShopController extends Controller
{
    //
    public function index() //追加
   {    
       $stocks = Stock::Paginate(6); 
       return view('shop',compact('stocks'));
   }
   
// カート内の情報を表示
    public function myCart(Cart $cart) //追加
   {    
       $data = $cart->showCart();
       return view('mycart',$data);
   }
   
//    商品をカートに入れた後に、表示させる
   public function addMyCart(Request $request, Cart $cart)
   {
    $stock_id=$request->stock_id;
    $message = $cart->addCart($stock_id);
    
    $data = $cart->showCart();

    return view('mycart',$data)->with('message', $message);
   }

   public function deleteCart(Request $request, Cart $cart)
   {
    $stock_id=$request->stock_id;
    $message= $cart->deleteCart($stock_id);

    $data =$cart->showCart();
    return view('mycart',$data)->with('message', $message);
   }

   public function checkout(Cart $cart)
   {
    $user = Auth::user();
    $mail_data['user']=$user->name; //追記
    $mail_data['checkout_items']=$cart->checkoutCart(); //編集
    // $checkout_info = $cart->checkoutCart();
    Mail::to($user->email)->send(new Thanks($mail_data));
    return view('checkout');
   }

   public function item_info(Request $request)
   {
        $id=$request->stock_id;
        $item = Stock::where('id', $id)->first();
        // dd($item);
       return view('item_info',compact('item'));
   }


// 新商品投稿ページ始め
//    商品投稿ページに飛ばすだけ。なくてもよさそう？
   public function post_item(Request $request)
   {

    return view('post_item');
   }

//    新しく打ち込んだ商品をstocksテーブルに挿入する。
   public function update_item(Request $request)
   {
    $this->validate($request, Stock::$rules);
    $stock = new Stock;
    // $stock->imgpath = 'none';
    $form = $request->all();
    unset($form['_token']);
    $stock->fill($form)->save();
    return redirect('/',);
   }
// 新商品投稿ページここまで



// レビュー機能始め
   // 商品のレビューを表示する
   public function item_review(Request $request)
   {
      //DBクラス
      // $reviews = DB::table('reviews')->get();
      // return view('item_review',['reviews' => $reviews]);

      // モデルを使う
      $stock_id = $request->id;
      // dd($stock_id);
      $item = Stock::where('id', $stock_id)->first();
      $reviews = Review::where('stock_id',$stock_id)->get();
      // dd($reviews);
      return view('item_review',['reviews' => $reviews, 'item' => $item]);
   }
   // 商品のレビュー投稿ページへ
   public function post_review(Request $request)
   {
      $stock_id = $request->id;
      // dd($stock_id);

      return view('post_review',['stock_id' => $stock_id]);
   }

   // レビューを投稿する
 public function review(Request $request)
   {
      // DBクラス
      // $param = [
      // 'evaluation' => $request->evaluation,
      // 'review_title' => $request->review_title,
      // 'comment' => $request->comment,
      // ];
      // DB::table('reviews')->insert($param);
      // return redirect('/item_review');
      
      // モデルを使って挿入
      $review = new Review;
      $form = $request->all();
      unset($form[('_token')]);
      $review->fill($form)->save();

      $id = $request->stock_id;
      $item = Stock::where('id', $id)->first();

      //stock_idを突っ込む
      // $review = new Review;
      // $review->evaluation = $request->evaluation;
      // $review->review_title = $request->review_title;
      // $review->comment = $request->comment;
      // $review->stock_id = $request->stock_id;
      // $review->save();

      // return redirect('/item_review/?id='.$id);
      return redirect()->route('review',['id' => $id]);
      // 

   }
   

}
