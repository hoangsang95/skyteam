<?php

namespace App\Http\Controllers;
use App\Cate;
use Illuminate\Http\Request;
use DB;
class CateController extends Controller
{
    //
    public function danhsach()
    {
        $cate = Cate::all();
        return view('layouts.admin.cate.danhsach', ['cate' => $cate]);
    }
    
    public function them()
    {
         return view('layouts.admin.cate.them');
    }
    
     public function postthem(Request $request)
    {
        
         $this->validate($request, 
                 ['Cat_Thumbnail' =>'','Cat_Keywords' =>'','Cat_Parent' =>'','Cat_Order' =>'','Cat_Hot' =>''],
                 ['Cat_Name' => 'required'],
                 ['Cat_Name.required' => 'Chưa nhập tên category'
                 ],
                    ['Cat_Thumbnail' => 'nullable',
                       'Cat_Keywords' => 'nullable',
                        'Cat_Parent' => 'nullable',
                        'Cat_Order' => 'nullable',
                        'Cat_Hot' => 'nullable']);
         $cate = new Cate;
         
        if($request->Cat_Thumbnail == null)
         {
              $cate->Cat_Thumbnail = "";           
         }
         if($request->Cat_Keywords == null)
         {
              $cate->Cat_Keywords = "";           
         }
         if($request->Cat_Parent == null)
         {
              $cate->Cat_Parent = "";           
         }
         if($request->Cat_Order == null)
         {
              $cate->Cat_Order = "";           
         }
         if($request->Cat_Hot == null)
         {
              $cate->Cat_Hot = "";           
         }
         /*
         $cate->Cat_Name = $request->Cat_Name;
         $cate->Cat_Thumbnail = $request->Cat_Thumbnail;
         $cate->Cat_Keywords = $request->Cat_Keywords;
         $cate->Cat_Parent = $request->Cat_Parent;
         $cate->Cat_Order = $request->Cat_Order;
         $cate->Cat_Hot = $request->Cat_Hot;*/
         $cate->save();
         return redirect('admin/cate/them')->with('thongbao','Thêm thành công');
    }
    
     public function sua($id)
    {
         $cate = Cate::where('Cat_ID',$id)->get();
          return view('layouts.admin.cate.sua', ['cate' => $cate]);
    }
    
     public function postsua(Request $request,$id)
    {
         $cate = Cate::where('Cat_ID','=',$id)->first();
        
          $this->validate($request, [
             ['Cat_Order' => 'numeric','Cat_Parent' => 'numeric', 'Cat_Hot' => 'numeric']
          ],[
              
          ]);
         
          $cate->Cat_Name = $request->Cat_Name;
          $cate->Cat_Thumbnail = $request->Cat_Thumbnail;
          $cate->Cat_Keywords = $request->Cat_Keywords;
          $cate->Cat_Parent = $request->Cat_Parent;
          $cate->Cat_Order = $request->Cat_Order;
          $cate->Cat_Hot = $request->Cat_Hot;
          $cate->save();
          return redirect('admin/cate/sua/'.$cate->Cat_ID)->with('thongbao','Sửa thành công');
    }
    
      public function xoa($id)
    {
       $cate = Cate::where('Cat_ID','=',$id);
       $cate->delete();
        return redirect('admin/cate/danhsach')->with('thongbao','Xóa thành công');
          
    }
}
