<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>'required|string|max:255',
           'email'=>'required|string|max:255|unique:employees',
           'phone'=>'required|string|max:255|unique:employees',
           'joining_date'=>'required',
        ]);
        if($request->photo){
            $position = strpos($request->photo,';');
            $sub = substr($request->photo,0,$position);
            $image_exist = explode('/',$sub)[1];
            $name = time().".".$image_exist;
            $image = Image::make($request->photo)->resize(240,200);
            $uploadPath = 'images/employee/';
            $imageUrl = $uploadPath.$name;
            $image->save($imageUrl);

            Employee::Create([
                'name'=> $request->name,
                'email'=> $request->email,
                'nid'=> $request->nid,
                'phone'=> $request->phone,
                'joining_date'=> $request->joining_date,
                'address'=> $request->address,
                'salary'=> $request->salary,
                'photo'=>$imageUrl
            ]);
//            $saveEmployee = new Employee();
//            $saveEmployee->name= $request->name;
//            $saveEmployee->email = $request->email;
//            $saveEmployee->phone = $request->phone;
//            $saveEmployee->nid = $request->nid;
//            $saveEmployee->joining_date = $request->joining_date;
//            $saveEmployee->address = $request->address;
//            $saveEmployee->salary = $request->salary;
//            $saveEmployee->photo = $imageUrl;
//            $saveEmployee->save();

        }else{
            Employee::Create([
                'name'=> $request->name,
                'email'=> $request->email,
                'nid'=> $request->nid,
                'phone'=> $request->phone,
                'joining_date'=> $request->joining_date,
                'address'=> $request->address,
                'salary'=> $request->salary,
            ]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
