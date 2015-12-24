<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CheckoutPaymentRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'time'			=> 'required',
			'date'			=> 'required',
			'ref_no'		=> 'required',
			'amount'		=> 'required',
			'pref_bank'		=> 'required',
			'method'		=> 'required',
		];
	}

}
