<?php

namespace App\Http\Controllers;
use App\Product;
use App\Cate;
use Illuminate\Http\Request;
use App\Http\Controllers\Input;

class Admin_Product_Controller extends Controller
{
    //
	public function __construct(){
			$product_list = Product::all();
            view()->share('product_list',$product_list);
    }
	
    public function admin_product_list()
    {
        $product_list = Product::all();
        return view('layouts.admin.product.list', ['product_list' => $product_list]);
    }
    
    public function admin_product_edit()
    {
        
    }
    
    public function admin_product_add()
    {
		$cat = Cate::all();
		
         return view('layouts.admin.product.add', ['cat'=>$cat]);
    }
    
     public function admin_product_add_post(Request $request)
    {
		// Custom Errors Message
		$messages = [
			'Product_Cat.required' => 'Vui lòng chọn chuyên mục.',
			'Product_Name.required' => 'Vui lòng chọn chuyên mục.',
			'Product_MID.max' => 'Mã sản phẩm dưới 255 ký tự.',
			'Product_Thumbnail.required' => 'Vui lòng thêm ảnh đại diện sản phẩm.',
			'Product_Description.required' => 'Vui lòng nhập mô tả sản phẩm.',
			'Product_Keywords.required' => 'Số lượng từ khóa quá giới hạn, vui lòng thử lại.',
			'Product_PriceMarket.required' => 'Vui lòng nhập giá thị trường.',
		];
		
		// Cài đặt ngày giờ hiện tại
		$request->Product_Datetime = date('Y-m-d H:i:s');
		//
		$this->validate($request, [
			'Product_Cat' => 'required|numeric',
			'Product_Name' => 'required|max:255',
			'Product_MID' => 'max:255',
		]);
        $imageName = time().'.'.$request->Product_Thumbnail->getClientOriginalExtension();
        $request->Product_Thumbnail->move(public_path('upload'), $imageName);
		
		
		$product = new Product;
		$post = $request->all();
		
		$post['Product_Thumbnail'] = 'upload/'.$imageName;
		
		unset($post['_token']);
		foreach($post as $k=>$v){
			$product->$k=$v;
		};
		$product->save();
		return view('layouts.admin.product.list');
    }
}
