<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function add($id, Request $request)
    {
        $id = is_numeric($id) ? $id : 0;
        // lay thong chi tiet cua san pham
        $infoPd = DB::table('products')->where('id',$id)->first();
        if(isset($infoPd->id) && $infoPd->id > 0){
            // add thong tin san pham do vao gio hang
            // su dung thu vien shopping cart cua laravel
            $dataAdd = [
                'id' => $id,
                'name' => $infoPd->name,
                'qty' => 1,
                'price' => $infoPd->price,
                'options' => [
                    'image' => $infoPd->image,
                    'description' => $infoPd->description
                ]
            ];
            if(Cart::add($dataAdd)){
                return redirect()->route('show.cart');
            } else {
                return redirect()->route('show.cart',['state'=>'fail']);
            }
        } else {
            // dieu huong ve cac trang not found page
        }
    }

    public function showCart()
    {
        // can lay dc thong tin tu trong gio hang khi nguoi dung da them san pham vao
        $data = [];
        $data['cart'] = Cart::content();
        return view('cart.index',$data);
    }

    public function delete($id)
    {
        // delere row id nam trong gio hang
        Cart::remove($id);
        return redirect()->route('show.cart');
    }

    public function remove()
    {
        // xoa tat ca san pham nam trong gio hang
        Cart::destroy();
        return redirect()->route('show.cart');
    }

    public function update(Request $request)
    {
        $catId = $request->rowCat;
        $qty = $request->qtyPd;
        // can kiem tra san pham co row id nay co nam trong gio hang ko?
        // neu co moi update
        $cartContent = Cart::content();
        $flagCheck = false;
        foreach ($cartContent as $key => $cat) {
            if($key == $catId){
                $flagCheck = true;
            }
        }
        $data = [];
        $data['money'] = 0;
        $data['totalmoney'] = 0;
        if($flagCheck){
            // update cart
            Cart::update($catId, $qty);
            // lay ra thong tin
            $infoCart = Cart::get($catId);
            $data['money'] = number_format(($infoCart->price * $qty));
            $data['totalmoney'] = Cart::subtotal();
        }
        echo json_encode($data);
    }
}
