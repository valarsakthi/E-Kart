<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class categorycontroller extends Controller
{

    function viewCategory()
    {
        $data1 = Category::select('id','name')->get();
        return view('category',['data1'=>$data1]);
    }
    //create category
    function getCategory(Request $req)
    {
        $validated = $req->validate([
            'cname' => 'required',
            'cat_des' => 'required',
        ]);

        $category = new Category;
        $category->name = $req->cname;
        $category->description = $req->cat_des;
        $category->save();
        $data1 = Category::select('id','name')->get();
        return redirect('categorylist')->with('success','Added Successfully!')->with('data1',$data1);
    }

    function dropdownCategory()
    {
        $data = Category::select('id','name')->get();
        return view('product',['data'=>$data,'data1'=>$data1]);
    }

    //list category
    function showCategory(){
        $data = Category::select('id','name','description')->get();
        $data1 = Category::select('id','name')->get();
       return view('categoryList',['data'=>$data,'data1'=>$data1]);
    }

    function editCategory($id){
        $data = Category::find($id);
        $data1 = Category::select('id','name')->get();
        return view('categoryEdit',['data'=>$data,'data1'=>$data1]);
        //return $data;
    }

    function updateCategory(Request $req)
    {

        $validated = $req->validate([
            'cname' => 'required',
            'cat_des' => 'required',
        ]);

        $data = Category::find($req->cid);
        //return $req;
        $data->name = $req->cname;
        $data->description = $req->cat_des;
        $data->save();
        return redirect('categorylist')->with('success','Updated Successfully!');
    }

    function deleteCategory($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect('categorylist')->with('success','Entry Deleted!');
    }
    
    // //menu Category
    // function menuCategory()
    // {
    //     $data1 = Category::select('id','name')->get();
    //     return view('navbarLayout',['data1'=>$data1]);
    // }
}
