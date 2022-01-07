@extends('Admin.master')
@section('title', 'مذودي الخدمة')
@section('content')

<div class="container-fluid py-4">
    <div class="row users-page">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3 t-header">عرض بيانات مزود الخدمة</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0 ">
                        <table class="sericeProviderTable">
                        <tr>
                            <th>الاسم بالكامل</th>
                            <td>{{$user->full_name}}</td>
                          </tr>
                          <tr>
                            <th>البريد</th>
                            <td>{{$user->email}}</td>
                          </tr>
                          <tr>
                            <th>الموبايل</th>
                            <td>{{$user->phone}}</td>
                          </tr>
                          <tr>
                            <th>النوع</th>
                            <td>{{$user->type}}</td>
                          </tr>
                          <tr>
                            <th>الدولة</th>
                            <td>{{$user->country}}</td>
                          </tr>
                          <tr>
                            <th>المدينة</th>
                            <td>{{$user->city}}</td>
                          </tr>
                          <tr>
                            <th>الصورة</th>
                            <td>
                               <img src="{{asset('storage/drivers/'.$user->photo)}}" alt="" width="80" style="padding: 5px">
                            </td>
                          </tr>
                          <tr>
                            <th>الرقم القومي</th>
                            <td>{{$user->NationID}}</td>
                          </tr>
                          <tr>
                            <th>رخصة القيادة</th>
                            <td>{{$user->D_licence}}</td>
                          </tr>
                          <tr>
                            <th>السجل التجاري</th>
                            <td>{{$user->com_reg}}</td>
                          </tr>
                          <tr>
                            <th>العنوان</th>
                            <td>{{$user->address}}</td>
                          </tr>
                          <tr>
                            <th>الرقم الضريبي</th>
                            <td>{{$user->tax_no}}</td>
                          </tr>
                          <tr>
                            <th>الحالة</th>
                            <td>
                                @if ($user->status == 1)
                                <span class="badge badge-sm bg-gradient-success">مفعل</span>
                                @else
                                <span class="badge badge-sm bg-gradient-warning">غير مفعل</span>
                                @endif
                                <button style="margin-top: 10px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    @if ($user->status == 1)
                                    الغاء التفعيل ؟
                                    @else
                                    تفعيل ؟
                                    @endif
                                  </button>
                                  
                            </td>
                          </tr>
                        </table>        
                    </div>
                </div>
                
            </div>
            <h4 class="text-center" style="padding: 30px 0">السيارات التابعة له</h4>
                @if ($user->car->count() > 0)
                <div class="table-responsive p-0 ">
                    <table class="table mycarstable align-items-center mb-0 ">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    نوع السيارة
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    رقم السيارة 
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    السنة 
                                </th>
                                <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    اجراء
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->car as $mycar)
                            <tr>
                                <td style="padding-right: 20px">
                                    {{$mycar->type}}
                                </td>
                                <td style="padding-right: 20px">
                                    {{$mycar->car_no}}
                                </td>
                                <td style="padding-right: 20px">
                                    {{$mycar->year}}
                                </td>
                                <td>
                                    <a href="{{route('admin.car.show', $mycar->id)}}">
                                        <button class="btn btn-success" >عرض تفاصيل السيارة</button>   
                                    </a>                                         
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">تفعيل مزود الخدمة</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.driver.update', $user->id)}}" method="post">
            @method('put')
            @csrf
            <select class="form-select" aria-label="Default select example" name="status">
                <option value="1" <?php if($user->status == 0) echo "selected"; ?> >تفعيل</option>
                <option value="0" <?php if($user->status == 1) echo "selected"; ?>>الغاء التفعيل</option>
              </select>
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  

@endsection
@push('myscripts')
@endpush