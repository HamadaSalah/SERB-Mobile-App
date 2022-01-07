@extends('Admin.master')
@section('title', $title)
@section('content')

<div class="container-fluid py-4">
    <div class="row users-page">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3 t-header" style="display: inline-block;">جدول {{ $title }}</h6>
                        <button class="btn btn-primary addNew" data-bs-toggle="modal" data-bs-target="#AddNewWork">اضافة <i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    @if ($works->count() > 0)
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 ">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        اسم المستخدم
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        الاستفسار والاجاية
                                    </th>
                                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        اجراء
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($works as $work)
                                <tr>
                                    <td style="padding-right: 20px">
                                        {{$work->user->name}}
                                    </td>
                                    <td>
                                        <div><span class="qu">الاستفسار : </span> {{$work->message}}<br/></div>
                                        <div class="clearfix"></div>
                                        <div><span class="qu">الرد : </span> {{$work->replay}}</div>
                                        
                                    </td>
                                    <td>
                                        @if ($work->replay)
                                            <button class="btn btn-primary">تم الرد</button>
                                        @else
                                            <button class="btn btn-success addAttr"   data-bs-toggle="modal" data-bs-target="#ReplayHelp" data-id='{{$work->id}}' >الرد علية</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <p class="text-center text-bold" style="font-size: 16px">لا توجد بيانات</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="ReplayHelp" tabindex="-1" aria-labelledby="ReplayHelpLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center">
            <form action="{{route('admin.HelpReplay')}}" method="post">
                @csrf
                <input type=hidden id="id" name=id>
                <h5 id="exampleModalLabel" style="padding: 30px 0">الرد علي المساعدة</h5>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">الرد </label>
                    <textarea type="text" class="form-control" id="exampleInputEmail1" name="replay"></textarea>
                  </div>
    
               <button type=button data-bs-dismiss="modal" class="btn btn-danger">الغاء</button>
               <button type=submit class="btn btn-success">حفظ</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  
@endsection
@push('myscripts')
<script>
    $('.addAttr').click(function() {
        var id = $(this).data('id');      
        $('#id').val(id);  
    } );
 </script>

@endpush