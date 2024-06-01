<?php

namespace App\Http\Controllers;
use App\Models\UploadImage;
use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function display(){
        $AllImages=UploadImage::all();
        $AllImages=$AllImages->toArray();
        $data=compact('AllImages');
        return view('display')->with($data);
    }
    public function insertForm(){
        return view('insert');
    }

    public function uploadImage(Request $r){
        $r->validate(
            [
                'userImage'=>'required|image: png,jpg,jpeg |unique:upload_images,userImage'
            ]
            );
        $ext=$r->file('userImage')->getClientOriginalExtension();
        $newImageName='mch'.time().'.'.$ext;
        $r->file('userImage')->move(public_path().'/uploads/',$newImageName);
        if(!empty($newImageName)){
            $upload= new UploadImage;
            $upload->userImage=$newImageName;
            $upload->save();
            return redirect(route('uploadImage.display'));
        }
    }

    public function ImageDelete($id){
        $selectRecord=uploadImage::find($id);
        $uploadedImageName=$selectRecord['userImage'];
        unlink(public_path().'/uploads/'.$uploadedImageName);
        $selectRecord->delete();
        return redirect(route('uploadImage.display'));
    }

    public function ImageEdit($id){
        $data=compact('id');
        return view('edit')->with($data);
    }

    public function ImageUpdate(Request $r){
        $r->validate(
            [
                'userImage'=>'required',
                'id'=>'required'
            ]
            );
        $ext=$r->file('userImage')->getClientOriginalExtension();
        $newImageName='mch'.time().'.'.$ext;
        $r->file('userImage')->move(public_path().'/uploads/',$newImageName);
        $id=$r['id'];
        $selectRecord=uploadImage::find($id);
        $uploadedImageName=$selectRecord['userImage'];
        unlink(public_path().'/uploads/'.$uploadedImageName);
        $selectRecord->userImage=$newImageName;
        $selectRecord->save();
        return redirect(route('uploadImage.display'));
    }
}
