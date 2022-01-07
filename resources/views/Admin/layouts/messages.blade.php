@if ($errors->any())
<div class="row">
    <div class="col-12">
        <div class="alert alert-success align-items-center">
            <div>
                @foreach ($errors->all() as $error)
                <li>
                    {{$error}}                
                </li>
            @endforeach
            </div>
        </div>
    </div>

</div>
@endif

@if (session('success'))
<div id="notifications"></div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success align-items-center">
                <div>
                    {{session('success')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if (session('error'))
<div class="row">
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="fa fa-close" class="myclose"></i>
    </button>
    <span>
        <b> Danger - </b> {{session('error')}}</span>
</div>
</div>
@endif
