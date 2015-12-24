<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model {

    protected $fillable = [
        'img','name','product_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }




}
