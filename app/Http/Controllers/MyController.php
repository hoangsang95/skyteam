<?php

namespace App\Http\Controllers;
use App\Product;
use App\Cate;
use Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Mail;
class MyController extends Controller
{
    // Danh sách chuyên mục (menu)
    public function __construct(){
                $listCat = Cate::get();
                view()->share('listCat',$listCat);
    }
    public function index()
    {
        $slide = DB::table('slide')->where('Slide_Cat','=',0)
                ->get();
        return view('layouts.index', ['slide' => $slide]);
        
    }
    // Tìm kiếm với từ khóa
    public function search(Request $request) {
        $tukhoa = $request->get('tukhoa');
        $product = Product::where('Product_Name','like','%'.$tukhoa.'%')->orWhere('Product_Description','like',"%$tukhoa%")->paginate(3)->appends(['tukhoa' =>$tukhoa]);
      
        return view('layouts.search', ['product' => $product , 'tukhoa'=>$tukhoa]);
           
    }
    // Danh sách sản phẩm của chuyên mục
    public function product_list($id)
    {
        $cate = DB::table('cat')
                ->where('Cat_ID', $id)
                ->get()
                ->toArray();
        $product = DB::table('product')
                ->select('product.*','cat.*')
                ->join('cat','Product_Cat','=','cat.CAT_ID')
                ->where('Product_Cat', $id)
                ->paginate(3);
        // Tag/ Từ khóa cho chuyên mục
        $keywords = explode(',',$cate[0]->Cat_Keywords);
        return view('layouts.product_list',['cate'=>$cate, 'product'=>$product, 'keywords'=>$keywords]);
        
    }
    // Chi tiết sản phẩm
    public function detail($id)
    {
        // Lấy thông tin sản phẩm
        $product = DB::table('product')
                ->join('cat','Product_Cat','=','cat.CAT_ID')
                ->where('product.Product_ID',$id)
                ->select('product.*','cat.*')->get();
        // Danh sách sản phẩm cùng chuyên mục
        $relate_product = DB::table('Product')
                         ->where('Product_Cat', $product[0]->Product_Cat)
                         ->where('Product_ID','!=', $product[0]->Product_ID)
                          ->get();
        // Xử lý, lấy ra danh sách hình ảnh sản phẩm
        $product_image = $product[0]->Product_Image;
        $product_image = explode(',', $product_image);
        
        // Lấy danh sách kích thước sản phẩm
        $product_size = $product[0]->Product_Size;
        $product_size = explode(',', $product_size);
        
        // Cập nhật lượt xem
        $countView = $product[0]->Product_CountView+1;
        Product::where('Product_ID', $id)
                ->update(['Product_CountView'=> $countView]);
        // Lấy ngẫu nhiên sản phẩm
       $random = Product::orderBy(DB::raw('RAND()'))->take(5)->get();
        return view('layouts.product',[
            'product'=>$product[0],
            'product_image'=>$product_image,
            'product_size'=>$product_size,
            'relate_product'=> $relate_product
        ]);
        
    }
    
    
     // Liên hê
    public function get_lienhe()
    {
        return view('layouts.contact');
    }
     public function post_lienhe(Request $request)
    {
        
         
         $data =['title' =>Request::input('title'), 'email' =>Request::input('email'), 'phone' =>Request::input('phone'), 'mess' =>Request::input('mess') ];
         Mail::send('layouts.sendMail', $data, function($msg){
             $msg->from('buheo1231995@gmail.com','Khách hàng');
             $msg->to('buheo1231995@gmail','SSS')->subject("Liên hệ");
             
         });
         echo "<script> 
             alert('Gửi thành công');
             window.location ='".url('/lien-he')."'
         </script>";
      
    }
    
    
}
