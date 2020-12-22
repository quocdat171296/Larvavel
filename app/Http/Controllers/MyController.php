<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends Controller
{
    public function HelloWorld()
    {
    	echo "Hello ~ World!!!";
    }
    //
    public function KhoaHoc($ten)
    {
    	echo "Laravel Framework 8.15.0 </br>Khoa ~ Hoc: ". $ten;
    	return redirect()->route('MyRoute2');
    }
    // URL
    public function GetURL(Request $request)
    {
    	echo "Laravel Framework 8.15.0 </br>";
    	// if ($request->isMethod('POST'))
    	// 	echo "Method POST";
    	// else 
    		// echo "Method GET";
    	if ($request->is('MyRe*'))
    		echo "Có MyRe";
    	else
			echo "Không có MyRe";
    }
    // Gửi nhận dữ liệu
    public function postFormAction(Request $request)
    {
    	echo "Laravel Framework 8.15.0 </br>";
    	echo $request->input('HoTen');
    	if ($request->has('Tuoi')){
    		echo $request->input('Tuoi');
    	}
    }
    //Cookie
    public function setCookie()
    {
    	$response = new Response();
    	$response->withCookie(
			'KhoaHoc',
			'Laravel - DatNguyen',
			0.1
    	);
    	echo "Laravel Framework 8.15.0 </br>";
    	return $response;
    }
    public function getCookie(Request $request)
    {
    	return $request->cookie('KhoaHoc');
    }

    //Upload file
    public function postFile(Request $request)
    {
    	echo "Laravel Framework 8.15.0 </br>";
    	if($request->hasfile('myFile')){
    		echo "Da co File";
    		$file = $request->file('myFile');
    		if($file->getClientOriginalExtension('myFile') == 'jpg'){
	    		$fileName = $file->getClientOriginalName('myFile');
	    		$file->move('img',$fileName);
	    		echo "Đã lưu file: ".$fileName;
    		}else {
    			echo "Không lưu được file";
    		}

    	}
    	else {
    		echo "Chua co File";
    	}
    }

    // Json
    public function getJson()
    {
    	$array = ['KhoaHoc'=>'Laravel Framework 8.15.0','PHP','Nguyen Quoc Dat'];
    	return response()->json($array);
    }

    // View
    public function myView()
    {
    	return view('view.DatNguyen');
    }

    // Param view
    public function Time($t)
    {
    	return view('myView',['t'=>$t]);
    }

    // View css
    public function blade($str)
    {
    	if($str == 'laravel')
    	{
            $array = ['KhoaHoc'=>'Laravel','Ten'=>'Nguyễn Quốc Đạt'];
    		return view('pages.laravel',$array);
    	}else {
            $array = ['KhoaHoc'=>'Hypertext Preprocessorl','Ten'=>'Nguyễn Quốc Đạt'];      
    		return view('pages.php',$array);
    	}
    }
}