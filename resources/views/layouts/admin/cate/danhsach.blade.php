@extends('layouts.admin.admin')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row" >
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể loại
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                     @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover " id="dataTables-example" >
                        <thead>
                            <tr align="center">
                                <th>Cat_ID</th>
                                <th>Cat_Name</th>
                                <th>Cat_Thumbnail</th>
                                <th>Cat_Keywords</th>
                                <th>Cat_Parent</th>
                                <th>Cat_Order</th>
                                <th>Cat_Hot</th>
                                 <th></th>
                                  <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cate as $r)
                            <tr class="odd gradeX" align="center">
       
                                <td>{{$r->Cat_ID}}</td>
                                <td>{{$r->Cat_Name}}</td>
                                <td>{{$r->Cat_Thumbnail}}</td>
                                <td>{{$r->Cat_Keywords}}</td>
                                <td>{{$r->Cat_Parent}}</td>
                                <td>{{$r->Cat_Order}}</td>
                                <td>{{$r->Cat_Hot}}</td>
                               
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/cate/xoa/{{$r->Cat_ID}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/cate/sua/{{$r->Cat_ID}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection