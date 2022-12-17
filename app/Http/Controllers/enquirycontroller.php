<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Enquiry;

class enquirycontroller extends Controller
{
    //

    public function addEnquiry(Request $request){

        $request->validate([
                    'enquiry' => 'required',
                    'product_id' => 'required'
                ]);
        $data = $request->all();

        $enquiry = new Enquiry();
        $enquiry->product_id = $data['product_id'];
        $enquiry->enquiry = $data['enquiry'];
        $enquiry->user_email = $data['user_email'];
        $enquiry->save();
        return redirect('/products/view');
    }
}
