<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(){
        // lấy data từ DB
        $dsbooks = DB::select("select id, name, title, author, price, publish, is_active from book2 where is_active=?",[1]);
        // xử lý logic nghiệp vụ
        
        
        //return "<h1>Trang index</h1>";
        // trả về view để hiển thị ( file book\index.blade.php)
        return view("book.index", compact("dsbooks"));
        // trả về route để điều hướng sang 1 chức năng mới
        // điều hướng theo đường dẫn
        //return redirect("/t2005e/gioi-thieu");
        // điều hướng thông qua tên của route
        //return  Redirect::route("get-book");
        //return redirect()->route("get-book");
    }
    public function create(){
        //trả về view
        return view("book.create");
    }
    // method khác get -> có 1 tham số có sẵn $request
    public function insert (Request $request){
        
    }
    public function getDetail(){
        
    }
}
