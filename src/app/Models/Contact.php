<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
        protected $fillable = [
            'lastname',
            'firstname',
            'gender',
            'email',
            'tel',
            'address',
            'category_id',
            'building',
            'detail'
        ];

        public function category()
        {
            return $this->belongsTo(Category::class);
        }
}
