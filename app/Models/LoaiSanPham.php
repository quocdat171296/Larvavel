<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;
        // Tên bảng
    protected $table = "loaisanpham";
    // Tắt/bật chế độ tự động quản lý 'create_at' và 'update_at'
    public $timestamps = false;
    public function sanpham()
    {
    	return $this->hasMany('App\Models\SanPham','id_loaisanpham','id');
    }
}
