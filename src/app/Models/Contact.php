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

  public function category(){
    return $this->belongsTo(Category::class);
  }

  public function scopeKeywordSearch($query, $keyword)
  {
    if (!empty($keyword)) {
      $query->where('lastname','like','%'.$keyword.'%');
      $query->orWhere('firstname','like','%'.$keyword.'%');
      $query->orWhere('email','like','%'.$keyword.'%');
    }
  }

  public function scopeCategorySearch($query, $category_id)
  {
    if (!empty($category_id)) {
      $query->where('category_id', $category_id);
    }
  }

  public function scopeGenderSearch($query, $gender)
  {
    if (!empty($gender)) {
      $query->where('gender',$gender);
    }
  }


}
