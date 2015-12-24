<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Request;
use App\Setting;

class SettingController extends BaseController {

    public function __construct(){
        parent::__construct();
        $this->middleware('auth');
    }

    public function getIndex()
    {
        return view('a.settings')->with('settings',Setting::find(1));
    }

    public function postUpdate($id)
    {
        $settingupdate = Request::all();
        $setting = Setting::find($id);
        $setting->update($settingupdate);
        return redirect('admin/settings/')->with('flash_message','Settings Save');
    }

}
