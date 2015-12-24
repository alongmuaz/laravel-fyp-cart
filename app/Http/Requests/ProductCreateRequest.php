<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductCreateRequest extends Request {

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
			'category_id' => 'required',
			'title' => 'required|min:2|unique:products',
			'price'=> 'required|numeric',
			'description' => 'required|min:10',
			'image'		=> 'required|image|mimes:jpeg,jpg,png,bmp,gif',
			'profit' => 'required',
			'type'	=> 'required',
		];
	}
	public function messages()
	{
		return [
			'title.required' 		=> 'The product title is required',
			'name.min' 				=> 'The product title must be minimum 5 characters',
			'image.required' 		=> 'Product image required',
			'image.image'			=> 'Please upload an image , only image',
			'image.mimes'			=> 'Only image with format jpeg, jpg, png, bmp, gif were accepted',
			'title.unique'			=> 'The product name is unique , please add another product name',
			'type.required'			=> 'Please select product type',
			'category_id.required'		=> 'Please select product category'
		];
	}

}
