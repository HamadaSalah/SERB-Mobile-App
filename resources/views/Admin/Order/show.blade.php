@extends('Admin.master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">
    <div class="row users-page">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3 t-header">{{$title}}</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0 ">
                        <table class="sericeProviderTable">
                        <tr>
                            <th>نوع السيارة</th>
                            <td>{{$order->type}}</td>
                          </tr>
                          <tr>
                            <th>السعر المبدئ</th>
                            <td>{{$order->init_price}}</td>
                          </tr>
                          <tr>
                            <th>الوقت</th>
                            <td>{{$order->time}}</td>
                          </tr>
                          <tr>
                            <th>المسافة</th>
                            <td>{{$order->distance}}</td>
                          </tr>
                          <tr>
                            <th>مكان الانطلاق</th>
                            <td>{{$order->start_loc}}</td>
                          </tr>
                          <tr>
                            <th>مكان التوصيل</th>
                            <td>{{$order->end_loc}}</td>
                          </tr>
                          <tr>
                            <th>التفاصيل</th>
                            <td>
                                {{$order->details}}
                            </td>
                          </tr>
                          <tr>
                            <th>صور</th>
                            <td>
                                @if($order->img)
                                @foreach($order->img as $img) 
                                <img src="{{asset('storage/orders/'.$img)}} "  style="width:100px"/>
                                @endforeach
                                @endif
                            </td>
                          </tr>
                          <tr>
                            <th>الحالة</th>
                            <td>{{$order->status}}</td>
                          </tr>
                          <tr>
                            <th>المستخدم</th>
                            <td>{{$order->user_id}}</td>
                          </tr>
                          <tr>
                            <th>السائق</th>
                            <td>
                                @if ($order->driver)
                                 {{$order->driver->full_name}}
                                @endif
                            </td>
                          </tr>
                          <tr>
                            <th>وقت الطلب</th>
                            <td>{{$order->created_at}}</td>
                          </tr>
                        </table>        
                    </div>
                </div>
                
            </div>
           

        </div>
    </div>
</div>
@endsection
@push('myscripts')
@endpush