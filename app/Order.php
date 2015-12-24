<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $fillable = [
        'id','customer_id','order_date','total_tax','total_purchase','order_status'
    ];

    protected $dates = ['order_date'];

    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function payment_proof()
    {
        return $this->hasOne('App\PaymentProof');
    }

}
