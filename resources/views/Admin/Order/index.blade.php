@extends('Admin.master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">
    <div class="row users-page">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3 t-header">جدول {{ $title }}</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 ">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        اسم المستخدم</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        النوع</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        الحاله</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        عرض التفاصيل</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$order->user_id}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$order->type}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-warning">{{$order->status}}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="{{route('admin.order.show', $order->id)}}">
                                           <button class="btn btn-outline-success">عرض البيانات</button>
                                        </a>

                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$orders->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
