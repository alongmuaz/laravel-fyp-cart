<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

    protected $fillable = [
        'name','email','no_tel','address','city','poscode','state'
    ];
    public function order()
    {
        return $this->hasMany('App\Order');
    }

    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }


}
