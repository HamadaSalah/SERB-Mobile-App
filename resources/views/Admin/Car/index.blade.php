@extends('Admin.master')
@section('title', $title)
@section('content')

<div class="container-fluid py-4">
    <div class="row users-page">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3 t-header">عرض بيانات السيارة</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0 ">
                        <table class="sericeProviderTable">
                            <tr>
                                <th>النوع</th>
                                <td>{{$car->type}}</td>
                            </tr>
                            <tr>
                                <th>الموديل</th>
                                <td>{{$car->model}}</td>
                            </tr>
                            <tr>
                                <th>السنة</th>
                                <td>{{$car->year}}</td>
                            </tr>
                            <tr>
                                <th>رقم السيارة</th>
                                <td>{{$car->car_no}}</td>
                            </tr>
                            <tr>
                                <th>الدولة</th>
                                <td>{{$car->country}}</td>
                            </tr>
                            <tr>
                                <th>المدينة</th>
                                <td>{{$car->city}}</td>
                            </tr>
                            <tr>
                                <th>صورة من الامام</th>
                                <td>
                                    <a href="{{asset('storage/cars/'.$car->img_front)}}" download><button class="btn btn-outline-success mt-3"><i class="fas fa-download"></i> تحميل</button></a>
                                </td>
                            </tr>
                            <tr>
                                <th>صورة من الخلف</th>
                                <td>
                                    <a href="{{asset('storage/cars/'.$car->img_back)}}" download><button class="btn btn-outline-success mt-3"><i class="fas fa-download"></i> تحميل</button></a>    
                                </td>
                            </tr>
                            <tr>
                                <th>صورة من الجانب الايسر</th>
                                <td><a href="{{asset('storage/cars/'.$car->img_left)}}" download><button class="btn btn-outline-success mt-3"><i class="fas fa-download"></i> تحميل</button></a></td>
                            </tr>
                            <tr>
                                <th>صورة من الايمن</th>
                                <td><a href="{{asset('storage/cars/'.$car->img_right)}}" download><button class="btn btn-outline-success mt-3"><i class="fas fa-download"></i> تحميل</button></a></td>
                            </tr>
                            <tr>
                                <th>الاستمارة</th>
                                <td><a href="{{asset('storage/cars/'.$car->form)}}" download><button class="btn btn-outline-success mt-3"><i class="fas fa-download"></i> تحميل</button></a></td>
                            </tr>
                            <tr>
                                <th>وثقية التامين</th>
                                <td><a href="{{asset('storage/cars/'.$car->policy)}}" download><button class="btn btn-outline-success mt-3"><i class="fas fa-download"></i> تحميل</button></a></td>
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