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

//$to = Carbon::now();
//$from = Carbon::parse($session->end_date);
//$no_of_months = $to->diffInMonths($from);
//$date = date('y').'-'.date('m').'-'.'10';
//for($i = 0; $i <= $no_of_months; $i++){
//Fees::create([
//'admission_id' => $admission->id,
//'__session_id' => $session->id,
//'student_id' => $student->id,
//'fee_type' => $type,
//'fee_amount' => $fee,
//'due_date' => Carbon::parse( $date )->addMonths($i),
//]);
//}

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
                "is_trans" => $data['is_trans'],
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
                        'month_of' => Carbon::now(),
                        'due_date' => Carbon::now()->addDays(10),
                    ]);
                }
                if ($type == 'tuition') {
                    $fee = $data['tuition_fees'];
                    Fees::create([
                        'admission_id' => $admission->id,
                        '__session_id' => $session->id,
                        'student_id' => $student->id,
                        'fee_type' => $type,
                        'fee_amount' => $fee,
                        'month_of' => Carbon::now(),
                        'due_date' => Carbon::now()->addDays(10),
                    ]);
                }
                if ($type == 'transportation') {
                    if ($data['is_trans'] == 1){
                        $fee = $data['transportation_fees'];
                        Fees::create([
                            'admission_id' => $admission->id,
                            '__session_id' => $session->id,
                            'student_id' => $student->id,
                            'fee_type' => $type,
                            'fee_amount' => $fee,
                            'month_of' => Carbon::now(),
                            'due_date' => Carbon::now()->addDays(10),
                        ]);
                    }
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

    public function update($data, $id, $img)
    {
        DB::beginTransaction();
        try {
            $session = _Session::where('status', 1)->first();

            if ($session == null){
                DB::rollBack();
                return [ 'status' => false, 'error' => "No session created. please create session first." ];
            }

            $admission = Admission::findOrFail($id);
            $admission->student_name = $data['student_name'];
            $admission->gender = $data['gender'];
            $admission->dob = $data['dob'];
            $admission->religion = $data['religion'];
            $admission->cast = $data['cast'];
            $admission->blood_group = $data['blood_group'];
            $admission->address = $data['address'];
            $admission->state = $data['state'];
            $admission->city = $data['city'];
            $admission->country = $data['country'];
            $admission->phone = $data['phone'];
            $admission->email = $data['email'];
            $admission->extra_note = $data['extra_note'];
            $admission->gr_no = $data['gr_no'];
            $admission->father_name = $data['father_name'];
            $admission->father_phone = $data['father_phone'];
            $admission->father_occ = $data['father_occ'];
            $admission->mother_name = $data['mother_name'];
            $admission->mother_phone = $data['mother_phone'];
            $admission->mother_occ = $data['mother_occ'];
            if ($img != null){
                $admission->student_pic = $img;
            }
            $admission->is_trans = $data['is_trans'];
            $admission->transport_id = $data['transportation'];
            $admission->__class_id = $data['selected_class'];
            $admission->__session_id = $session->id;
            $admission->user_id = Auth::user()->id;
            $admission->status = 'admitted';
            $admission->update();

            $student = Student::where('admission_id', $id)->update([
                '__class_id' => $data['selected_class'],
                '__session_id' => $session->id,
                'name' => $data['student_name'],
            ]);

            Fees::where('admission_id', $id)->where('fee_type', 'admission')->where('status', 'pending')
                ->update([ 'fee_amount' => $data['admission_fees'] ]);

            Fees::where('admission_id', $id)->where('fee_type', 'tuition')->where('status', 'pending')
                ->update([ 'fee_amount' => $data['tuition_fees'] ]);

            if ($admission->is_trans == 1 && $data['is_trans'] == 1){
                Fees::where('admission_id', $id)->where('fee_type', 'transportation')->where('status', 'pending')
                    ->update([ 'fee_amount' => $data['transportation_fees'] ]);
            }

            if ($admission->is_trans == 0 && $data['is_trans'] == 1){
                $fee = $data['transportation_fees'];
                Fees::create([
                    'admission_id' => $admission->id,
                    '__session_id' => $session->id,
                    'student_id' => $student,
                    'fee_type' => 'transportation',
                    'fee_amount' => $fee,
                    'due_date' => Carbon::now()->addDays(10),
                ]);
            }

            if ($admission->is_trans == 1 && $data['is_trans'] == 0){
                Fees::where('admission_id', $id)->where('fee_type', 'transportation')->where('status', 'pending')
                    ->delete();
            }

            DB::commit();
            return [ 'status' => true, 'success' => 'Record updated...', 'ad_id' => $admission->id ];
        }
        catch (\Exception $exception){
            DB::rollBack();
            return [ 'status' => false, 'error' => $exception->getMessage() ];
        }
    }
}
