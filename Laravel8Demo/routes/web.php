<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Models\eloquen\Product;
use App\Http\Controllers\ProductController;

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
/*
 * Uri trả về trang view ( resources/views file welcome.php hoặc welcome.blade.php )
 * */
Route::get('/', function () {
    return "Hello word";
})->middleware('auth');
/*
 * Uri trả về trang view ( resources/views file home.php hoặc home.blade.php )
 * */
Route::get('/home', function () {
    $name = "T2005E";
    $school = "FPT";
    $languages = array("C", "C#", "Java", "PHP", "HTML");
    return view('home', compact('name', 'school', 'languages'));
    // truyền 2 biến tên name và school ra ngoài view
    //return view('home', compact('name', 'school'));
    //return view('home',["name"=>$name, "school"=>$school]);
    //return view('home')->with("name", $name)->with("school", $school);
});
    // thêm tham số trên uri thì dùng {<tên biến>}
    Route::get('/ngon-ngu/{language}', function ($language) {
        return "Xin chào $language";
    })->name("ngon-ngu-detail");

    /*
     uri trả về 1 chuỗi
     * */
    // đặt tên cho route bằng hàm name()
    Route::get("/t2005e/gioi-thieu", function(){
        $classname = "T2005E";
        return "<h1>Lơp 2005 e trang giới thiệu $classname</h1>";
    })->name("gioi-thieu");
    
Route::get('/book', function () {
    $book = array([
        "id"=>1,
        "name"=>"Cuốn theo chiều gió",
        "title"=>"Cuốn theo chiều gió"
    ], [
        "id"=>1,
        "name"=>"Cuốn theo chiều gió 2",
        "title"=>"Cuốn theo chiều gió 2"
    ], [
        "id"=>2,
        "name"=>"Cuốn theo chiều gió 2",
        "title"=>"Cuốn theo chiều gió 2"
    ], [
        "id"=>4,
        "name"=>"Cuốn theo chiều gió 3",
        "title"=>"Cuốn theo chiều gió 3"
    ]);
    var_dump($book);
    //return view('book', compact('book'));
    // truyền 2 biến tên name và school ra ngoài view
    //return view('home', compact('name', 'school'));
    //return view('home',["name"=>$name, "school"=>$school]);
    //return view('home')->with("name", $name)->with("school", $school);
})->name("get-book");
/*
// route điều hướng tới controller thực hiện action
// với đường dấn http://localhost:8000/getbooks thì nơi xử lý logic là hàm index trong class BookController
// trả về view (book\index.blade.php)
Route::get("/getbooks", [BookController::class, "index"]);

// tạo route điều hướng tới BookController để thực hiện action hiển thị giao diện thêm mới 1 sách ( book\create.blade.php)
// http://localhost:8000/book/create
Route::get("/book/create", [BookController::class, "create"]);

// tạo route điều hướng cho method post thực hiện lưu thông tin 1 sách vào db
// http://localhost:8000/book
Route::post("/book", [BookController::class, 'insert']);

// tạo route điều hướng cho method get để thực hiện điều hướng sang route name get-book
// http://localhost:8000/book/get-detail
Route::get("/book/get-detail", [BookController::class, 'getDetail']);

// gọi tới chức crud
Route::resource("categories", CategoryController::class);
*/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/test', [App\Http\Controllers\TestController::class, 'index'])->name('test');

