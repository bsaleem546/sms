<?php

namespace App\Http\Resources;

use App\Models\_Session;
use App\Models\Admission;
use App\Models\Fees;
use App\Models\Student;
use Illuminate\Http\Resources\Json\JsonResource;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdmissionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function save($data)
    {

        DB::beginTransaction();
        try {
            $session = _Session::where('status', 1)->first();

            if ($session == null){
                DB::rollBack();
                return [ 'status' => false, 'error' => "No session created. please create session first." ];
            }

            $img = time().'.' . $data['id_proof']->getClientOriginalExtension();
            \Image::make($data['id_proof'])->save(public_path('uploads/students/').$img);

            $admission = Admission::create([
                "student_name" => $data['student_name'],
                "gender" => $data['gender'],
                "dob" => $data['dob'],
                "religion" => $data['religion'],
                "cast" => $data['cast'],
                "blood_group" => $data['blood_group'],
                "address" => $data['address'],
                "state" => $data['state'],
                "city" => $data['city'],
                "country" => $data['country'],
                "phone" => $data['phone'],
                "email" => $data['email'],
                "extra_note" => $data['extra_note'],
                "gr_no" => $data['gr_no'],
                "father_name" => $data['father_name'],
                "father_phone" => $data['father_phone'],
                "father_occ" => $data['father_occ'],
                "mother_name" => $data['mother_name'],
                "mother_phone" => $data['mother_phone'],
                "mother_occ" => $data['mother_occ'],
                "student_pic" => $img,
                "transport_id" => $data['transportation'],
                "__class_id" => $data['selected_class'],
                "__session_id" => $session->id,
                "user_id" => Auth::user()->id,
                "status" => 'admitted'
            ]);

            $student = Student::create([
                'admission_id' => $admission->id,
                '__class_id' => $data['selected_class'],
                '__session_id' => $session->id,
                'roll_no' => $data['roll_no'],
                'name' => $data['student_name'],
            ]);

            $fee_types = ['admission', 'tuition', 'transportation'];
            foreach ($fee_types as $type){
                if ($type == 'admission') {
                    $fee = $data['admission_fees'];
                    Fees::create([
                        'admission_id' => $admission->id,
                        '__session_id' => $session->id,
                        'student_id' => $student->id,
                        'fee_type' => $type,
                        'fee_amount' => $fee,
                        'due_date' => Carbon::now()->addDays(10),
                    ]);
                }
                if ($type == 'tuition') {
                    $fee = $data['tuition_fees'];
                    $to = Carbon::now();
                    $from = Carbon::parse($session->end_date);
                    $no_of_months = $to->diffInMonths($from);
                    $date = date('y').'-'.date('m').'-'.'10';
                    for($i = 0; $i <= $no_of_months; $i++){
                        Fees::create([
                            'admission_id' => $admission->id,
                            '__session_id' => $session->id,
                            'student_id' => $student->id,
                            'fee_type' => $type,
                            'fee_amount' => $fee,
                            'due_date' => Carbon::parse( $date )->addMonths($i),
                        ]);
                    }
                }
                if ($type == 'transportation') {
                    $fee = $data['transportation_fees'];
                    Fees::create([
                        'admission_id' => $admission->id,
                        '__session_id' => $session->id,
                        'student_id' => $student->id,
                        'fee_type' => $type,
                        'fee_amount' => $fee,
                        'due_date' => Carbon::now()->addDays(10),
                    ]);
                }

            }

            DB::commit();
            return [ 'status' => true, 'success' => 'Record saved...', 'ad_id' => $admission->id ];
        }
        catch (\Exception $exception){
            DB::rollBack();
            return [ 'status' => false, 'error' => $exception->getMessage() ];
        }
    }
}
