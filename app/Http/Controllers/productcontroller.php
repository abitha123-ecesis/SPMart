<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class productcontroller extends Controller
{
    //

    public function create()
    {

        // create page
        return view('product.create');
    }

    public function store(Request $request) //when createpage button clicked
    {

        // validate and store data
        $request->validate([
            'productname' => 'required',
            'productdescription' => 'required',
            'productquantity' => 'required',
            'price' => 'required',
            'picture' => 'required'
        ]);

        $data = $request->all();
        //image upload
        if($image = $request->file('picture')) { //if the input type of request is 'file' with field name 'picture' in view
            $name = time(). '.' .$image->getClientOriginalName();
            $image->move(public_path('images'), $name); //go to public-->images folder and store the $name
            $data['picture'] = "$name";
        }
        

        Product::insert([
            'email_id' => $data['email_id'],
            'productname' => $data['productname'],
            'productdescription' => $data['productdescription'],
            'productquantity' => $data['productquantity'],
            'price' => $data['price'],
            'picture' => $data['picture'],
            'userid' => $data['userid']
        ]);

        return redirect('/home');
    }


    public function showallproducts()
    {
        // return all products

        $showallproducts = Product::all();

        return view('product.view')->with('showallproducts', $showallproducts);  //product folder-> index.blade.php
        // the $product is carried to view  

    }

    public function showproduct($id)
    {
        // get single product

        $showproduct = Product::find($id);
        return view('product.show')->with('showproduct', $showproduct);
    }

    public function showallmyproducts(){
        $productemail = Auth::user()->email;//freddythomas@gmail.com
        // echo $productemail;
        $showallmyproducts = Product::where('email_id', $productemail)->get();
        // echo($showallmyproducts);
        return view('product.myview')->with('showallmyproducts', $showallmyproducts);


    }

    public function deletemyproduct($id) {
        Product::find($id)->delete();
        return redirect('/products/myview');
    }

    public function edit($id)
    {
        //edit single product
        $product = Product::find($id);
        return view('product.edit')->with('product', $product);
    }

    public function updatedata(Request $request, $id)
    {

        // validate and store data
        $request->validate([
            'productname' => 'required',
            'productdescription' => 'required',
            'productquantity' => 'required',
            'price' => 'required',
            'picture' => 'required'
        ]);

        //image upload

        $data = $request->all();

        if($image = $request->file('picture')) {
            $name = time(). '.' .$image->getClientOriginalName();
            $image->move(public_path('images'), $name);
            $data['picture'] = "$name";
        }

        Product::where('id',$id)->update([
            'email_id' => $data['email_id'],
            'productname' => $data['productname'],
            'productdescription' => $data['productdescription'],
            'productquantity' => $data['productquantity'],
            'price' => $data['price'],
            'picture' => $data['picture'],
            'userid' => $data['userid']
        ]);

        return redirect('/products/myview');

    }

    public function searchproduct(Request $request){
        if($request->search){

            $searchproduct = Product::where('productname', 'LIKE', '%'.$request->search.'%')->latest()->paginate(15);
            return view('product.viewsearch', compact('searchproduct'));

        }else{
            return redirect('/products/view');
        }
        
    }

    public function mysearchproduct(Request $request){
        if($request->mysearch){

            $productemail = Auth::user()->email;//freddythomas@gmail.com
            $showallmyproducts = Product::where('email_id', $productemail)->get();

            $mysearchproduct = Product::where('productname', 'LIKE', '%'.$request->mysearch.'%')->latest()->paginate(15);
            return view('product.myviewsearch', compact('mysearchproduct'));

        }else{
            return redirect('/products/myview');
        }
        
    }
}
