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
                                        الاسم والصورة</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        الموبايل</th>
                                        <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        تاريخ التسجيل</th>
                                        <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        الحالة</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        اجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/team-2.jpg"
                                                    class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$user->full_name}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{$user->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$user->phone}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">{{$user->created_at}}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if ($user->status == 1)
                                        <span class="badge badge-sm bg-gradient-success">مفعل</span>
                                        @else
                                        <span class="badge badge-sm bg-gradient-warning">غير مفعل</span>
                                        @endif
                                        
                                    </td>
                                    <td class="align-middle text-center">
                                                                                <button class="btn btn-outline-primary"><a href="{{route('admin.driver.show', $user->id)}}">عرض البيانات</a></button>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  

@endsection
@push('myscripts')
@endpush