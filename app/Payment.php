<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {

	protected $fillable = [
        'name','bank','acc_holder','acc_no','acc_type'
    ];


}
