<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class admincontroller extends Controller
{
    //

    public function adminshowallproducts()
    {
        // return all products

        $adminshowallproducts = Product::all();

        return view('admin.adminview')->with('adminshowallproducts', $adminshowallproducts);  //product folder-> index.blade.php
        // the $product is carried to view  

    }

    public function adminshowproduct($id)
    {
        // get single product

        $adminshowproduct = Product::find($id);
        return view('admin.adminshow')->with('adminshowproduct', $adminshowproduct);
    }

    public function admindeleteproduct($id) {
        Product::find($id)->delete();
        return redirect('/admin/products/view');
    }
}
