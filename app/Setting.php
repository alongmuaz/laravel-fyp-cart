<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

	protected $fillable = [
        'about_title','about','site_title','site_keyword','site_description','address','company_name','company_regno'
    ];

}
