@extends('Admin.master')
@section('title', $title)
@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <h3 class="text-center mb-5">This Is Dummy Chart and Will work after project Completed</h3>
      <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">weekend</i>
            </div>
            <div class="text-start pt-1">
              <p class="text-sm mb-0 text-capitalize">أموال اليوم</p>
              <h4 class="mb-0">$53k</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0 text-start"><span class="text-success text-sm font-weight-bolder ms-1">+55% </span>من الأسبوع الماضي</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">leaderboard</i>
            </div>
            <div class="text-start pt-1">
              <p class="text-sm mb-0 text-capitalize">مستخدمو اليوم</p>
              <h4 class="mb-0">2,300</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0 text-start"><span class="text-success text-sm font-weight-bolder ms-1">+33% </span>من الأسبوع الماضي</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">store</i>
            </div>
            <div class="text-start pt-1">
              <p class="text-sm mb-0 text-capitalize">عملاء جدد</p>
              <h4 class="mb-0">
                <span class="text-danger text-sm font-weight-bolder ms-1">-2%</span>
                +3,462
              </h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0 text-start"><span class="text-success text-sm font-weight-bolder ms-1">+5% </span>من الشهر الماضي</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person_add</i>
            </div>
            <div class="text-start pt-1">
              <p class="text-sm mb-0 text-capitalize">مبيعات</p>
              <h4 class="mb-0">$103,430</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0 text-start"><span class="text-success text-sm font-weight-bolder ms-1">+7% </span>مقارنة بيوم أمس</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2 ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
              <div class="chart">
                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 ">مشاهدات الموقع</h6>
            <p class="text-sm ">آخر أداء للحملة</p>
            <hr class="dark horizontal">
            <div class="d-flex ">
              <i class="material-icons text-sm my-auto ms-1">schedule</i>
              <p class="mb-0 text-sm"> الحملة أرسلت قبل يومين </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2  ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 "> المبيعات اليومية </h6>
            <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) زيادة في مبيعات اليوم. </p>
            <hr class="dark horizontal">
            <div class="d-flex ">
              <i class="material-icons text-sm my-auto ms-1">schedule</i>
              <p class="mb-0 text-sm"> تم التحديث منذ 4 دقائق </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mt-4 mb-3">
        <div class="card z-index-2 ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
              <div class="chart">
                <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 ">المهام المكتملة</h6>
            <p class="text-sm ">آخر أداء للحملة</p>
            <hr class="dark horizontal">
            <div class="d-flex ">
              <i class="material-icons text-sm my-auto me-1">schedule</i>
              <p class="mb-0 text-sm">تم تحديثه للتو</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
