<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentProof extends Model {

	protected $fillable = [
        'order_id',
        'time',
        'date',
        'ref_no',
        'amount',
        'pref_bank',
        'method',
    ];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
