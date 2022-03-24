<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdmissionRequest extends FormRequest
{
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
            "reg_id" => "required", "id_proof" => "required", "student_name" => "required",
            "gender" => "required", "dob" => "required", "religion" => "required",
            "cast" => "required", "blood_group" => "nullable", "address" => "required",
            "state" => "required", "city" => "required", "country" => "required",
            "phone" => "required", "email" => "required", "extra_note" => "nullable",
            "selected_class" => "required", "gr_no" => "required", "roll_no" => "required",
            "admission_fees" => "required", "tuition_fees" => "required",
            "father_name" => "required", "father_phone" => "nullable", "father_occ" => "nullable",
            "mother_name" => "required", "mother_phone" => "nullable", "mother_occ" => "nullable",
            "transportation" => "nullable", "transportation_fees" => "nullable",
            "is_login" => "required", "is_trans" => "required"
        ];
    }
}
