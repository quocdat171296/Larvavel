<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::<method>('<URI>', <callback function>)
Route::get('KhoaHoc', function () {
    return "Hello World!!!";
});
Route::get('DatNguyen/laravel', function () {
    echo "<h1 style=". "color:blue" . ">Nguyễn Quốc Đạt!!!</h1>";
});
Route::get('HoTen/{ten}', function ($ten) {
    echo "<h1 style=". "color:blue" . ">Ho ten: " . $ten . "!!!</h1>";
});
Route::get('Ngay/{ngay}', function ($ngay) {
    echo "<h1 style=". "color:blue" . ">Ngày: " . $ngay . "!!!</h1>";
})->where(['ngay'=> '[a-zA-Z]+']);

// Định danh nhóm route

Route::get('Route1', ['as'=>'MyRoute',function(){
	echo "Hello!!";
}]);

Route::get('Route2',function(){
	echo "Day la Route2";
})->name('MyRoute2');

Route::get('GoiTen',function(){
	return redirect()->route('MyRoute2');
});

// Group

Route::group(['prefix'=>'MyGroup'],function(){
	Route::get('User1',function(){
		echo "User1";
	});
	Route::get('User2',function(){
		echo "User2";
	});
	Route::get('User3',function(){
		echo "User3";
	});
});

// Gọi controller

Route::get('GoiController', [MyController::class, 'HelloWorld']);
// Truyền tham số cho controller
Route::get('GoiController/{truyenvao}', [MyController::class, 'KhoaHoc']);
// echo "Laravel Framework 8.15.0 </br>" . 

// URL

Route::get('MyRequest',[MyController::class, 'GetURL']);
// Gửi nhận dữ liệu với request

Route::get('getForm',function(){
	return view('postForm');
});

Route::get('postForm',[MyController::class, 'postFormAction'])->name('postFormAlias');


//Cookie

Route::get('setCookie',[MyController::class,'setCookie']);
Route::get('getCookie',[MyController::class,'getCookie']);

// File upload
Route::get('uploadFile',function(){
	return view('postFile');
});
Route::post('postFile',[MyController::class,'postFile'])->name('postFile');

// Json
Route::get('getJson',[MyController::class,'getJson']);

// View
Route::get('myView',[MyController::class,'myView']);

// Param View
Route::get('Time/{t}',[MyController::class,'Time']);

// View Share
View::share('KhoaHoc','Laravel');

// Blade template
Route::get('blade',function(){
	return view('pages.php');
});

Route::get('bladeTemplate/{string}',[MyController::class,'blade']);

/**
 * Database
 */
// Tạo bảng
Route::get('database',function(){
	// Schema::create('loaisanpham',function($table){
	// 	$table->increments('id');
	// 	$table->string('ten',200);
	// });
	Schema::create('theloai',function($table){
		$table->increments('id');
		$table->string('ten',200)->nullable();
		$table->string('nsx')->default('Nha san xuat');
	});
	echo "Đã thực hiện lệnh tạo bảng";
});

// Liên kết bảng

Route::get('lienketbang',function(){
	Schema::create('sanpham',function($table){
		$table->increments('id');
		$table->string('ten');
		$table->float('gia');
		$table->integer('soluong')->default(0);
		$table->integer('id_loaisanpham')->unsigned();
		$table->foreign('id_loaisanpham')->references('id')->on('loaisanpham');
	});
});

//Sửa bảng
Route::get('suabang',function(){
	Schema::table('theloai',function($table){
		$table->dropColumn('nsx');

	});
});

// Thêm cột
Route::get('themcot',function(){
	Schema::table('theloai',function($table){
		$table->string('email');
	});
});

// Đổi tên
Route::get('doiten',function(){
	Schema::rename('theloai', 'nguoidung');
});

// Xóa bảng
Route::get('xoabang',function(){
	Schema::dropIfExists('nguoidung');
});

// Tạo bảng
Route::get('taobang',function(){
	Schema::create('nguoidung',function($table){
		$table->increments('id');
		$table->string('ten',255);
	});
});

//queryBuilder
Route::get('qb/get',function(){
	$data = DB::table('users')->get();
	foreach($data as $row)
	{
		foreach($row as $key=>$value)
		{
			echo $key.":".$value."</br>";
		}
		echo '<hr>';
	}
});

Route::get('qb/where',function(){
	$data = DB::table('users')->where('id','=',2)->get();
	foreach($data as $row)
	{
		foreach($row as $key=>$value)
		{
			echo $key.":".$value."</br>";
		}
		echo '<hr>';
	}
});

Route::get('qb/select',function(){
	$data = DB::table('users')->select(['id','name','email'])->where('id',2)->get();
	foreach($data as $row)
	{
		foreach($row as $key=>$value)
		{
			echo $key.":".$value."</br>";
		}
		echo '<hr>';
	}
});

Route::get('qb/raw',function(){
	$data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->where('id',2)->get();
	foreach($data as $row)
	{
		foreach($row as $key=>$value)
		{
			echo $key.":".$value."</br>";
		}
		echo '<hr>';
	}
});
Route::get('qb/orderby',function(){
	$data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->orderBy('id','desc')->get();
	// var_dump($data->count());
	foreach($data as $row)
	{
		foreach($row as $key=>$value)
		{
			echo $key.":".$value."</br>";
		}
		echo '<hr>';
	}
});

// Query builder update
Route::get('qb/update',function(){
	DB::table('users')->where('id',1)->update(['name'=>'NguyenQuocDat']);
	echo "Updated";
});

// Query builder delete
Route::get('qb/delete',function(){
	DB::table('users')->truncate();
	echo "Deleted";
});

// Model
Route::get('model/save',function(){
	$user = new App\Models\User();
	$user->name = "Mai1";
	$user->email = "Mai2@email.com";
	$user->password = "Mat Khau";
	$user->save();

	echo "Đã thực hiện save()";
});

Route::get('model/query',function(){
	$user = App\Models\User::find(4);
	echo $user->name;
});

Route::get('model/sanpham/save/{ten}',function($ten){
	$sanpham = new App\Models\SanPham();
	$sanpham->ten = $ten;
	$sanpham->soluong = 100;
	$sanpham->save();

	echo "San Pham đã save()";
});

Route::get('model/sanpham/all',function(){
	$sanpham = App\Models\SanPham::all()->toArray();
	var_dump($sanpham);
});

Route::get('model/sanpham/ten',function(){
	$sanpham = App\Models\SanPham::where('ten','Laptop')->get()->toArray();
	var_dump($sanpham);
});

Route::get('model/sanpham/delete',function(){
	App\Models\SanPham::destroy(4);
});

Route::get('taocot',function(){
	Schema::table('sanpham',function($table){
		$table->integer('id_loaisanpham')->unsigned();
	});
});

Route::get('lienket',function(){
	$data = App\Models\SanPham::find(3)->loaisanpham->toArray();
	var_dump($data);
});
Route::get('lienketloaisanpham',function(){
	$data = App\Models\LoaiSanPham::find(1)->sanpham->toArray();
	var_dump($data);
});