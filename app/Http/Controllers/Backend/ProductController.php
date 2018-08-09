<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Size;
use App\Models\Product;
use App\Http\Requests\StoreProductPost;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['status'] = $request->session()->get('status');
        $keyword = $request->keyword;

        //$data['lstPd'] = Product::all();
        $data['lstPd'] = DB::table('products')
                            ->where('name','LIKE',"%{$keyword}%")
                            ->orWhere('price','LIKE',"%{$keyword}%")
                            ->paginate(2);
        $data['key'] = $keyword;
        return view('admin.product.product',$data);
    }

    public function add()
    {
        $data = [];
        $data['categories'] = Categorie::all();
        $data['sizes'] = Size::all();
        return view('admin.product.add',$data);
    }

    public function handleadd(StoreProductPost $request)
    {
        //dd($request->all());
        $namepd = $request->name; // $request->input('name');
        $cat = $request->cat_id;
        $size = $request->size_id;
        $price = $request->price;
        $sale = $request->sale;
        $qty = $request->qty;
        $description = $request->description;

        // xu ly upload file - larvel
        $checkUpload = false;
        $namefile = '';
        if($request->hasFile('image')){
            $file = $request->file('image');
            // lay ten file
            $namefile = $file->getClientOriginalName();
            if($file->getError() == 0){
                // upload
                if($file->move("uploads/images",$namefile)){
                    $checkUpload = true;
                }
            }
        }

        if(!$checkUpload && $namefile == ''){
            $request->session()->flash('errUpload', 'Vui long chon file upload');
            return redirect()->route('admin.addproduct',['state'=>'fail']);
        } else {
            // insert data
            $dataInsert = [
                'cat_id' => $cat,
                'size_id' => $size,
                'name' => $namepd,
                'image' => $namefile,
                'price' => $price,
                'sale' => $sale,
                'status' => 1,
                'qty' => $qty,
                'description' => $description,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ];
            if(DB::table('products')->insert($dataInsert)){
                $request->session()->flash('status','Success');
                return redirect()->route('admin.product');
            } else {
                $request->session()->flash('status','Fail');
                return redirect()->route('admin.addproduct',['state'=>'err']);
            }
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        if($id <= 0){
            echo 'ERR';
        } else {
            if(DB::table('products')->where('id',$id)->delete()){
                echo "OK";
            } else {
                echo "FAIL";
            }
        }
    }

    public function detail($id, Request $request){
        $id = is_numeric($id) ? $id : 0;
        $infoPd = Product::find($id);
        if(isset($infoPd->id)){
            $data = [];
            $data['info'] = $infoPd;
            $data['categories'] = Categorie::all();
            $data['sizes'] = Size::all();
            return view('admin.product.edit',$data);
        } else {
            // dieu huong ve cac trang not found page
        }
    }
}
