<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Student, Status};

use Validator, Auth, Arr;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selectedFields = [
            "full_name", "email", "contact", "region", "status_id"
        ];

        $rows = Student::get($selectedFields);
        $rows = $this->changeValue($rows);

        $columnDefs = array(            
            array('headerName'=>'Name', 'field'=>'full_name', 
                "headerCheckboxSelection" => true,
                "headerCheckboxSelectionFilteredOnly" => true, 
                "checkboxSelection" => true),
            array('headerName'=>'Contact','field'=>'contact'),
            array('headerName'=>'Region','field'=>'region'),
            array('headerName' => 'Status', 'field' => 'status'),
        );

        $data = json_encode(array(
            'rows' => $rows,
            'column' => $columnDefs
        ));
        
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request)->validate();
        $validator['created_by'] = Auth::id();
        $validator['created_at'] = now();

        $create = Student::create($validator);
        if($create){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Student::findOrFail($id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $findStudent = Student::findOrFail($id);
        if(!empty($findStudent)){
            $validator = $this->validator($request)->validate();
            $validator['upated_by'] = Auth::id();
            $validator['updated_at'] = now();

            $update = Student::update($validator);
            if($update){
                return array(
                    "is_success" => true,
                    "message" => "Student updated successfully"
                );
            }else{
                return array(
                    "is_success" => false,
                    "message" => "Failed to update student"
                );
            }
        }else{
            return array(
                "is_success" => false,
                "message" => "Student ID not found"
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findStudent = Student::find($id);
        if(!empty($findStudent)){
            $findStudent->delete();

            return array(
                "is_success" => true,
                "message" => "Student deleted successfully"
            );
        }
    }

    public function validator(Request $request)
    {
        $input = [
            'full_name' => $this->safeInputs($request->input('full_name')),
            'contact' => $this->safeInputs($request->input('contact')),
            'region' => $this->safeInputs($request->input('region')),
            'course_id' => $this->safeInputs($request->input('course_id')),
            'section' => $this->safeInputs($request->input('section')),
            'status_id' => $this->safeInputs($request->input('status_id'))
        ];

        $rules = [
            'full_name' => 'required|string',
            'contact' => 'nullable|string|unique:studens,contact,'.$this->safeInputs($request->input('id')),
            'course_id' => 'required|numeric',
            'section' => 'required|string',
            'status_id' => 'required|numeric'
        ];

        $messages = [];

        $customAttributes = [
            'full_name' => 'full name',
            'contact' => 'contact',
            'course_id' => 'course',
            'section' => 'section',
            'status_id' => 'status'
        ];

        $validator = Validator::make($input, $rules, $messages,$customAttributes);
        return $validator;
    }

    public function changeValue($rows){
        foreach($rows as $key => $val){
            if(Arr::exists($val, 'status_id')){
                $rows[$key]['status'] = Status::find($val['status_id'])->name;
            }

            unset($val['status_id']);
        }

        return $rows;
    }
}
