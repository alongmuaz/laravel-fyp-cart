<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $fillable = [
        'category_id','title','info','description','price','status','image','profit'
    ];

    public function image()
    {
        return $this->hasMany('App\Gambar');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }

}
