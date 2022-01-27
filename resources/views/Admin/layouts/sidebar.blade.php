<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-3 rotate-caret  bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute start-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" # " target="_blank">
        <img src="{{asset('assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span style="font-size: 20px" class="me-1 font-weight-bold text-white">لوحة تحكم سرب</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse px-0 w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.index')}}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text me-1">لوحة القيادة</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.driver.index')}}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-briefcase"></i>
            </div>
            <span class="nav-link-text me-1">مذودي الخدمة</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.cartypes.index')}}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-truck-moving"></i>
            </div>
            <span class="nav-link-text me-1">انواع الشاحنات</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.users.index')}}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-user me-sm-1"></i>
            </div>
            <span class="nav-link-text me-1">المستخدمين</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.order.index')}}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-hourglass-end me-sm-1"></i>
            </div>
            <span class="nav-link-text me-1">كل الطلبات</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.work-method.index')}}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-question-circle me-sm-1"></i>
            </div>
            <span class="nav-link-text me-1">طريقة العمل</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.terms.index')}}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-question-circle me-sm-1"></i>
            </div>
            <span class="nav-link-text me-1">الشروط والاحكام</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.popular.index')}}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-question-circle me-sm-1"></i>
            </div>
            <span class="nav-link-text me-1">الاسئلة الشائعة</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.help.index')}}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-question-circle me-sm-1"></i>
            </div>
            <span class="nav-link-text me-1">المساعدة</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.about')}}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-question-circle me-sm-1"></i>
            </div>
            <span class="nav-link-text me-1">عن سرب</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.OrdersReports')}}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-file-alt me-sm-1"></i>
            </div>
            <span class="nav-link-text me-1">تقارير الطلبات</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
