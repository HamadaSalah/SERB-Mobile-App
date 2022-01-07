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
                <form action="{{route('admin.terms.edit', $terms->id)}}" method="PUT">
                    @csrf
                    @method('PUT')
                <div class="suronder"  style="margin: 20px">
                <textarea id="editor" name="text">
                    {!! $terms->text !!}
                </textarea>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#editor' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
                </div>
                <button class="btn btn-primary text-center" style="float: none;;text-align: center;display: block;margin: auto;margin-bottom: 20px;">Save</button>
                </form>
                </div>
            
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
          <form action="{{route('admin.WorkDestroy')}}" method="post">
              @csrf
              <input type=hidden id="id" name=id>
              <h5 id="exampleModalLabel" style="padding: 30px 0">هل تريد الحذف ؟</h5>
             <button type=button data-bs-dismiss="modal" class="btn btn-danger">لا</button>
             <button type=submit class="btn btn-success">نعم</button>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="AddNewWork" tabindex="-1" aria-labelledby="AddNewWorkLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddNewWorkLabel">أضافة حقل جديد</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" action="{{route('admin.work-method.store')}}"> 
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">طريق العمل </label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="quest">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">الاجابة</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="ans">
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">خروج</button>
        <button type="submit" class="btn btn-primary">أضافة</button>
      </div>
          </form>
    </div>
  </div>
</div>
@endsection
@push('custom-css')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
@endpush
@push('myscripts')
<script>
    $('.addAttr').click(function() {
        var id = $(this).data('id');      
        $('#id').val(id);  
    } );
 </script>

@endpush