<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Student, Status, Course};

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
            "id", "full_name", "email", "contact", "region", "status_id"
        ];

        $rows = Student::latest()->get($selectedFields);
        $rows = $this->changeValue($rows);

        $courses = Course::orderBy('name', 'asc')->get([
            'id', 'name'
        ]);

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
            'column' => $columnDefs,
            'courses' => $courses
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
        // return $request->all();
        $validator = $this->validator($request);
        $validator['status_id'] = 2;
        $validator['created_by'] = $this->safeInputs($request->input('id'));
        $validator['created_at'] = now();

        $create = Student::create($validator);

        if($create){
            return array(
                "is_success" => true,
                "message" => "Student created successfully"
            );
        }else{
            return array(
                "is_success" => false,
                "message" => "Failed to create a new student"
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // return $request->all();
        $data = Student::findOrFail($request->input('id'));
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $findStudent = Student::findOrFail($request->input('student_id'));
        if(!empty($findStudent)){
            $validator = $this->validator($request);
            $validator['upated_by'] = $this->safeInputs($request->input('id'));
            $validator['updated_at'] = now();

            $update = $findStudent->update($validator);

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
    public function destroy(Request $request)
    {
        $findStudent = Student::find($request->input('id'));
        if(!empty($findStudent)){
            $findStudent->delete();

            return array(
                "is_success" => true,
                "message" => "Student deleted successfully"
            );
        }else{
            return array(
                "is_success" => false,
                "message" => "Failed to delete student"
            );
        }
    }

    public function validator(Request $request)
    {
        $input = [
            'full_name' => $this->safeInputs($request->input('full_name')),
            'email' => $this->safeInputs($request->input('email')),
            'contact' => $this->safeInputs($request->input('contact')),
            'region' => $this->safeInputs($request->input('region')),
            'course_id' => $this->safeInputs($request->input('course_id')),
            'section' => $this->safeInputs($request->input('section')),
            // 'status_id' => $this->safeInputs($request->input('status_id'))
        ];

        $rules = [
            'full_name' => 'required|string',
            'email' => 'required|string', // |unique:students,email,'.$this->safeInputs($request->input('id'))
            'contact' => 'required|string', // |unique:students,contact,'.$this->safeInputs($request->input('id'))
            'region' => 'required|string',
            'course_id' => 'required|numeric',
            'section' => 'required|string',
            // 'status_id' => 'required|numeric'
        ];

        $messages = [];

        $customAttributes = [
            'full_name' => 'full name',
            'email' => 'email address',
            'contact' => 'contact',
            'course_id' => 'course',
            'section' => 'section',
            // 'status_id' => 'status'
        ];

        $validator = Validator::make($input, $rules, $messages,$customAttributes);
        return $validator->validate();
    }

    public function changeValue($rows){
        foreach($rows as $key => $val){
            if(Arr::exists($val, 'status_id')){
                $val['status'] = Status::find($val['status_id']);
            }

            unset($val['status_id']);
        }

        return $rows;
    }
}
