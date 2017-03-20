<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Cate;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    //
    public function danhsach()
    {
        $slide = Slide::all();
        return view('layouts.admin.slide.danhsach', ['slide' => $slide]);
    }
    
    public function them()
    {
        $cate = Cate::all();
         return view('layouts.admin.slide.them', ['cate' => $cate]);
    }
    
     public function postthem(Request $request)
    {
        
         $this->validate($request, ['Slide_Order' => 'numeric']);
         $slide = new Slide;
        
         if($request->Slide_Title == null)
         {
              $request->Slide_Title = "";           
         }
         if($request->Slide_Description == null)
         {
              $request->Slide_Description = "";           
         }
         if($request->Slide_Image == null)
         {
              $request->Slide_Image = "";           
         }
         if($request->Slide_Link == null)
         {
              $request->Slide_Link = "";           
         }
         if($request->Slide_Target == null)
         {
              $request->Slide_Target = "";           
         }
          if($request->Slide_Order == null)
         {
              $request->Slide_Order = "";           
         }
          if($request->Slide_Cat == null)
         {
              $request->Slide_Cat = "";           
         }
         $slide->Slide_Title = $request->Slide_Title;
         $slide->Slide_Description = $request->Slide_Description;
         $slide->Slide_Image = $request->Slide_Image;
         $slide->Slide_Link = $request->Slide_Link;
         $slide->Slide_Target = $request->Slide_Target;
         $slide->Slide_Order = $request->Slide_Order;
         $slide->Slide_Cat = $request->Slide_Cat;
         
         $slide->save();
         return redirect('admin/slide/them')->with('thongbao','Thêm thành công');
    }
    
     public function sua($id)
    {
          $cate = Cate::all();  
          $slide = Slide::where('Slide_ID',$id)->get();
          return view('layouts.admin.slide.sua', ['slide' => $slide, 'cate' => $cate]);
    }
    
     public function postsua(Request $request,$id)
    {
         $slide = Slide::where('Slide_ID','=',$id)->first();
        
          $this->validate($request, [
             ['Slide_Order' => 'numeric']
          ]);
         
        $slide->Slide_Title = $request->Slide_Title;
         $slide->Slide_Description = $request->Slide_Description;
         $slide->Slide_Image = $request->Slide_Image;
         $slide->Slide_Link = $request->Slide_Link;
         $slide->Slide_Target = $request->Slide_Target;
         $slide->Slide_Order = $request->Slide_Order;
         $slide->Slide_Cat = $request->Slide_Cat;
         $slide->save();
          return redirect('admin/slide/sua/'.$slide->Slide_ID)->with('thongbao','Sửa thành công');
    }
    
      public function xoa($id)
    {
       $slide = Slide::where('Slide_ID','=',$id);
       $slide->delete();
        return redirect('admin/slide/danhsach')->with('thongbao','Xóa thành công');
          
    }
}
