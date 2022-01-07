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
                    </div>
                </div>
                <form action="{{route('admin.saveAbout', $about->id)}}" method="post">
                    @csrf
                    @method('post')
                    <div class="suronder"  style="margin: 20px">
                        <textarea type="text" name="about" id="" style="width: 100%;height: 300px;">{{$about->about}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary text-center" style="float: none;;text-align: center;display: block;margin: auto;margin-bottom: 20px;">Save</button>
                </form>
                </div>
            
            </div>
        </div>
    </div>
</div>
@endsection
