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
            'client_name' => 'required|max:255',
            'client_adresse' => 'required|max:255',
            'client_mail' => 'required|max:255',
            'client_phone' => 'required|max:255',
            'contact_name' => 'required|max:255',
            'contact_adresse' => 'required|max:255',
            'contact_mail' => 'required|max:255',
            'contact_phone' => 'required|max:255',
            'client_info' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'project_type' => 'required|max:255',
            'context' => 'required|max:255',
            'need' => 'required|max:255',
            'goals' => 'required|max:255',
            'more_infos' => array('Regex:/^[A-Za-z0-9 ]+$/'),
        ];
    }
}