<?php namespace Bluschool\Students\Http\Requests;

use App\Http\Requests\Request;

class StudentsRequest extends Request {

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
            'admissionNo' => 'required',
            'admissionDate'= > 'required',
            'nameFirst' => 'required',
            'nameLast' => 'required',
            'dateOfBirth' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'addressLine1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pin' => 'required',
            'country' => 'required',
            'studentPhone' => 'required',
            'studentEmail' => 'required',
            'parentFirstName' => 'required',
            'parentLastName' => 'required',
            'relation' => 'required',
            'parentEmail' => 'required',
            'parentMobile' => 'required'
		];
	}
}