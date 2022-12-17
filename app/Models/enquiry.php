<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\product;

class enquiry extends Model
{
    use HasFactory;

    protected $fillable =[
        'product_id',
        'enquiry',
        'user_email'
    ];

    public function product() {
        return $this->belongsTo(product::class);
     }
}
