<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Picture;
use Illuminate\Support\Facades\DB;
use Image;

class ImageController extends Controller
{

    public function loadImage()
    {
        return view('welcome');
    }
    public function croppedImage(Request  $request)
    {

        $img = Image::make(request()->file('uploaded_file')->getRealPath())->resize(300,200);
        $imgName = $request->file('uploaded_file')->getClientOriginalName();
        $img->save('images/'.$imgName.'.jpg');


        $img1 = $img;

        $img = Image::make(request()->file('uploaded_file')->getRealPath())->resize(300,200);
        $img2 = $img;

        $img = Image::make(request()->file('uploaded_file')->getRealPath())->resize(300,200);
        $img3 = $img;

         $img = Image::make(request()->file('uploaded_file')->getRealPath())->resize(300,200);
         $img4 = $img;
         $img1->crop(150, 100, 0, 0)->save('images/'.$imgName.'1.jpg');
         $img2 ->crop(150, 100, 150, 0)->save('images/'.$imgName.'2.jpg');
         $img3->crop(150, 100, 0, 100)->save('images/'.$imgName.'3.jpg');
         $img4->crop(150, 100, 150, 100)->save('images/'.$imgName.'4.jpg');

         $pict = new Picture();

         $pict->image = (string)$imgName;

         $pict->slice1 = $imgName.'1';
         $pict->slice2 = $imgName.'2';
         $pict->slice3 = $imgName.'3';
         $pict->slice4 = $imgName.'4';

         $pict->save();
        $id = DB::getPdo()->lastInsertId();

         return redirect()->route('show', ['pictId' => $id,]);
    }
    public function show($id){


        $result =  DB::table('pictures')->where('id', $id)->get();

        return view('showImage', compact('result'));

    }
    public function imageSlice($one, $two)
    {
        return view('slice',['pic'=>$two,]);
    }
}
