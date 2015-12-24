<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request {

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
			'name'			=> 'required',
			'email'			=> 'required',
			'comment'		=> 'required',
			'g-recaptcha-response' => 'required|recaptcha',
		];
	}

	public function messages()
	{
		return [
			'name.required' 		=> 'Please write your name',
			'email.required' 		=> 'Please write your email',
			'comment.required' 		=> 'Please fill your comment',
			'g-recaptcha-response.required'		=> 'Please  verify the captcha',
		];
	}

}
