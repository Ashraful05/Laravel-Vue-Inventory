<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        return response()->json($supplier);
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
           'phone'=>'required|string|unique:suppliers',
            'address'=>'required|string'
        ]);
        if($request->photo)
        {
            $position = strpos($request->photo,';');
            $sub = substr($request->photo,0,$position);
            $image_exist = explode('/',$sub)[1];
            $name = time().".".$image_exist;

            $image = Image::make($request->photo)->resize(240,200);
            $uploadPath = 'images/supplier/';
            $imageUrl = $uploadPath.$name;
            $image->save($imageUrl);
            Supplier::create([
                'photo'=>$imageUrl,
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'shop_name'=>$request->shop_name,
            ]);
        }else{
            Supplier::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'shop_name'=>$request->shop_name,
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
//        $supplier = Supplier::findOrFail($id);
//        return response()->json($supplier);
//        $supplier = Supplier::where(['id'=>$id])->first();
        $supplier = Supplier::findOrFail($id);
        return response()->json($supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return response()->json($supplier);
    }

    public function update(Request $request,$id)
    {
        $data = array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['shop_name']=$request->shop_name;
        $data['address'] = $request->address;
        $newImage = $request->newphoto;

        if($newImage){
            $position = strpos($newImage,';');
            $sub = substr($newImage,0,$position);
            $ext = explode('/',$sub)[1];

            $name = time().".".$ext;
            $img = Image::make($newImage)->resize(240,200);
            $uploadPath = 'images/supplier/';
            $imageUrl = $uploadPath.$name;
            $success = $img->save($imageUrl);
            if($success){
                $data['photo'] = $imageUrl;
//                $employeeImage = DB::table('employees')->where('id',$id)->first();
                $supplierImage = Supplier::where('id',$id)->first();

                $imagePath = $supplierImage->photo;
                unlink($imagePath);

//                $employee = DB::table('employees')->where('id',$id)->update($data);
                Supplier::where('id',$id)->update($data);
            }
        }else{
            $oldImage = $request->photo;
            $data['photo'] = $oldImage;

//            $employee = DB::table('employees')->where('id',$id)->update($data);
            Supplier::where('id',$id)->update($data);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $photo = $supplier->photo;
        if($photo){
            unlink($photo);
            $supplier->delete();
        }
        $supplier->delete();
    }
}
