<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

    protected $fillable = [
        'product_id',
        'order_id',
        'gambar_id',
        'category_id',
        'form_id',
        'qty',
        'total_price',
        'color',
        'size',
        'month'
    ];

    public function order ()
    {
        return $this->belongsTo('App\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
