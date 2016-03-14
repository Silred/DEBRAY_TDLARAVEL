<?php namespace App\Http\Requests;
use App\Http\Requests\Request;
use App\User;
use Auth;
class ProjectFormRequest extends Request {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->user()->can_project())
        {
            return true;
        }
        return false;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:posts|max:255',
            'title' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'client_name' => 'required',
            'client_adresse' => 'required',
            'client_mail' => 'required',
            'client_phone' => 'required',
            'contact_name' => 'required',
            'contact_adresse' => 'required',
            'contact_mail' => 'required',
            'contact_phone' => 'required',
            'client_info' => 'required',
            'project_type' => 'required',
            'context' => 'required',
            'need' => 'required',
            'goals' => 'required',
            'more_infos' => 'required',
        ];
    }
}