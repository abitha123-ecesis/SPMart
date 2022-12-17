<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\enquiry;

class product extends Model
{
    use HasFactory;

    protected $fillable =[
        'productname',
        'picture',
        'description',
        'productquantity',
        'price',
        'email_id'
    ];

    public function enquiries()
    {
        return $this->hasMany(enquiry::class);
    }
}
