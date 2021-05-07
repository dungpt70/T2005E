<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\eloquen\Product;
use App\Models\eloquen\ProductDetail;

class ProductController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderByDesc('created_at')->paginate(10);
        $i = ($products->currentpage()-1)* $products->perpage();
        return view("admin.product.index", compact('products', 'i'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.product.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:500',
            'price'=>'required|numeric|min:0',
            'avatar'=>'required|image|max:2048',
        ], [
            'name.required'=>'Tên không được để trống',
            'price.required'=>'Giá không được để trống',
        ]
            );
        $product = new Product();
        $product->name = $request->name;
        $res = $product->save();
        
        $imageName = time().'.'.$request->avatar->extension();
        $request->avatar->move(public_path('image/product'), $imageName);
        $path = 'image/product'.'/'.$imageName;
        $product_detail = new ProductDetail();
        $product_detail->description = $request->description;
        $product_detail->price = $request->price;
        $product_detail->avatar = $path;
        $product_detail->product_id = $product->id;
        $product_detail->save();
        return redirect()->route('product.index')->with("success","Thêm mới thành công");
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
        //lấy sản phẩm theo id
        $product = Product::find($id);
        if($product){
            return view("admin.product.edit", compact('product'));
        } else {
            return redirect()->route("product.index");
        }
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
        //dd($request->avatar);
        // cập nhật bản ghi vào db
        $product = Product::find($id);
        if($product){
            $validated = $request->validate([
                'name' => 'required|max:255',
                'description' => 'required|max:500',
                'price'=>'required|numeric|min:0',
                'avatar'=>'image|max:2048',
            ], [
                'name.required'=>'Tên không được để trống',
                'price.required'=>'Giá không được để trống',
                'description.required'=>'Mô tả không được để trống',
                'avatar.mimes'=>'Ảnh đại diện phải là file jpeg,png,jpg,gif,svg',
                'avatar.max'=>'Ảnh đại diện không được quá 2M',
            ]
            );
            $product->name = $request->name;
            $product->save();
            
            
            $product_detail = $product->ProductDetail;
            $product_detail->description = $request->description;
            $product_detail->price = $request->price;
            if (!empty($request->avatar)){
                $imageName = time().'.'.$request->avatar->extension();
                $request->avatar->move(public_path('image/product'), $imageName);
                $path = 'image/product'.'/'.$imageName;
                $product_detail->avatar = $path;
            }
            $product_detail->product_id = $product->id;
            $product_detail->save();
            return redirect()->route('product.index')->with("success","Cập nhật thành công");
        } else {
            return redirect()->route("product.index")->with("error","Không tìm thấy bản ghi phù hợp");;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // xóa bản ghi
        $product = Product::destroy($id);
        return Response::json($product);
    }
}
