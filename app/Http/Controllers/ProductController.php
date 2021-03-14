<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class ProductController extends Controller
{
    function viewProduct()
    {
        $data = Category::select('id','name')->get();
        //$data1 = Category::select('id','name')->get();
        return view('product',['data'=>$data,'data1'=>$data]);
        
        //return view('product',['data1'=>$data1]);
    }

    function getProduct(Request $req)
    {
        $validated = $req->validate([
            'prod_name' => 'required',
            'cat_id' => 'required',
            'prod_des' => 'required',
            'prod_img' => 'required|mimes:jpeg,jpg,png'
        ]);

       $newImgName = time().'-'.$req->prod_name.'.'.$req->prod_img->extension();
        $req->file('prod_img')->storeAs('public/product_img',$newImgName);
      //return $path;

       $product = new Product;
       $product->cid = $req->cat_id;
       $product->name = $req->prod_name;
       $product->description = $req->prod_des;
       $product->img_path = $newImgName;
       $product->save();
       return redirect('productlist')->with('success','Added Successfully!');
    }

    function showProducts()
    {
        $data = Product::all();
        $data1 = Category::select('id','name')->get();
        return view('productlist',['data'=>$data,'data1'=>$data1]);
    }

    function editProduct($id)
    {
        $data = Product::find($id);
        // return $data;
        $category = Category::all();
        $data1 = Category::select('id','name')->get();
        return view('productEdit',['data'=>$data,'category'=>$category,'data1'=>$data1]);
    }

    function deleteProduct($id)
    {
        $data = Product::find($id);
        $data->delete();
        $path = storage_path().'/app/public/product_img/'.$data->img_path;
        if(File::exists($path)){
            unlink($path);
        }
        return redirect('productlist')->with('success','Entry Deleted!');
    }

    function updateProduct(Request $req)
    {
        $validated = $req->validate([
            'prod_name' => 'required',
            'cat_id' => 'required',
            'prod_des' => 'required'
        ]);
        if($req->file('prod_img'))
        {
            $newImgName = time().'-'.$req->prod_name.'.'.$req->prod_img->extension();
            $req->file('prod_img')->storeAs('public/product_img',$newImgName);

            $data = Product::find($req->id);
            $data->cid = $req->cat_id;
            $data->name = $req->prod_name;
            $data->description = $req->prod_des;
            $data->img_path = $newImgName;
            $data->save();
            return redirect('productlist')->with('success','Updated Successfully!');
        }
        else{
            $data = Product::find($req->id);
            $data->cid = $req->cat_id;
            $data->name = $req->prod_name;
            $data->description = $req->prod_des;
            $data->save();
            return redirect('productlist')->with('success','Updated Successfully!');
        }
    }

    function listProducts($id)
    {
        $datalist = DB::table('products')->where('cid',$id)->paginate(10);
        $data1 = Category::select('id','name')->get();
        return view('productDisplay',['data1'=>$data1,'datalist'=>$datalist]);
    }

    function productDetail($id)
    {
        $proddata = Product::find($id);
        $catlist = Category::find($proddata->cid);
        $data1 = Category::select('id','name')->get();
        //return $proddata;
        return view('productDetail',['proddata'=>$proddata,'catlist'=>$catlist,'data1'=>$data1]);
    }

    function enquiryProd()
    {
        $data1 = Category::select('id','name')->get();
        return view('enquiryProduct',['data1'=>$data1]);
    }

    function send(Request $req)
    {
        $this->validate($req,[
            'name' => 'required',
            'email' => 'required|email',
            'mobno' => 'required',
            'message' => 'required'
        ]);

        $data = [
            'name' => $req->name,
            'mobno' => $req->mobno,
            'email' => $req->email,
            'message' => $req->message
        ];
            

        Mail::to('softtest0911@gmail.com')->send(new SendMail($data));
        //return "Email Sent";
        //return back()->with('success','Thanks for contacting us!');
        return redirect('home')->with('success','Thanks for contacting us!');
    }
}
