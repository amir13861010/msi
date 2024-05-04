<div>

    <div class="main-sidebar main-sidebar-sticky side-menu" style="background:black;">
        <div class="sidemenu-logo">
            <a class="main-logo" href="https://www.mirrogene.com" target="_blank">
                <img style="width: 152px" src="{{asset("images/MSI-logo-white.png")}}"
                     class="header-brand-img desktop-logo" alt="لوگو">
                <img style="width:40px;" src="{{asset("images/MSI-logo.png")}}" class="header-brand-img icon-logo"
                     alt="لوگو">
                <img src="assets/img/brand/logo.png" class="header-brand-img desktop-logo theme-logo" alt="لوگو">
                <img src="assets/img/brand/icon.png" class="header-brand-img icon-logo theme-logo" alt="لوگو">
            </a>
        </div>
        <div class="main-sidebar-body">
            <ul class="nav">
                @can("user-panel")

                    <li class="nav-item">
                        <a class="nav-link" href="{{route("UserPanel")}}"><span class="shape1"></span><span
                                class="shape2"></span><i
                                class="ti-home sidemenu-icon"></i><span class="sidemenu-label">داشبورد</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i
                                class="si si-basket sidemenu-icon"></i><span
                                class="sidemenu-label">ثبت محصول</span><i
                                class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route("UserAddProduct")}}">افزودن محصول جدید</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route("UserProducts")}}">لیست محصولات ثبت شده </a>
                            </li>


                        </ul>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("UserGifts")}}"><span class="shape1"></span><span
                                class="shape2"></span><i
                                class="si si-present sidemenu-icon"></i><span class="sidemenu-label">مشاهده هدایا</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("UserOrders")}}"><span class="shape1"></span><span
                                class="shape2"></span><i
                                class="fe fe-credit-card sidemenu-icon"></i><span
                                class="sidemenu-label">سفارشات من</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i
                                class="si si-speech sidemenu-icon"></i><span
                                class="sidemenu-label">تیکت</span><i
                                class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route("UserAddTicket")}}">افزودن تیکت جدید</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route("UserMyTicket")}}">تیکت های من </a>
                            </li>


                        </ul>

                @endcan
                @can("admin-panel")
                    <li class="nav-item">
                        <a class="nav-link" href="/admin-panel"><span class="shape1"></span><span class="shape2"></span><i
                                class="ti-home sidemenu-icon"></i><span class="sidemenu-label">داشبورد</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("AdminRating")}}"><span class="shape1"></span><span
                                class="shape2"></span><i
                                class="si si-diamond sidemenu-icon"></i><span
                                class="sidemenu-label"> سطح بندی کاربر</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i
                                class="si si-basket sidemenu-icon"></i><span
                                class="sidemenu-label">محصولات</span><i
                                class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route("AdminCategory")}}">دسته بندی محصولات </a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route("AdminProduct")}}">لیست محصولات MSI</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route("AdminSelledProducts")}}">محصولات ثبت شده کاربر</a>
                            </li>


                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i
                                class="si si-present sidemenu-icon"></i><span
                                class="sidemenu-label">هدایا و جوایز</span><i
                                class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route("AdminGifts")}}">افزودن و لیست هدایا </a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="">سفارشات </a>
                            </li>


                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i
                                class="si si-user sidemenu-icon"></i><span
                                class="sidemenu-label">کاربران</span><i
                                class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route("AdminUsers")}}">لیست کاربران</a>
                            </li>
                            <li class="nav-sub-item">

                                <a class="nav-sub-link" href="{{route("AdminAgents")}}">لیست نمایندگان </a>
                            </li>
                            <li class="nav-sub-item">

                                <a class="nav-sub-link" href="{{route("AdminUnverifiedAgents")}}">نمایندگان تایید
                                    نشده </a>
                            </li>

                        </ul>
                    </li>

                        <li class="nav-item">
                            <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i
                                    class="si si-notebook sidemenu-icon"></i><span
                                    class="sidemenu-label">گزارشات</span><i
                                    class="angle fe fe-chevron-left"></i></a>
                            <ul class="nav-sub">
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="{{route("AdminBuysAgents")}}">گزارشات خرید </a>
                                </li>
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="{{route("AdminSellsAgents")}}">گزراشات فروش</a>
                                </li>



                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route("AdminTickets")}}"><span class="shape1"></span><span class="shape2"></span><i
                                    class="si si-speech sidemenu-icon"></i><span class="sidemenu-label">تیکت ها</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route("AdminAccount")}}"><span class="shape1"></span><span
                                    class="shape2"></span><i
                                    class="mdi mdi-account-edit sidemenu-icon"></i><span
                                    class="sidemenu-label">حساب کاربری</span></a>
                        </li>
                @endcan

                    @can("agent-panel")

                        <li class="nav-item">
                            <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i
                                    class="mdi mdi-arrow-left-bold sidemenu-icon"></i><span
                                    class="sidemenu-label">خرید ماهانه</span><i
                                    class="angle fe fe-chevron-left"></i></a>
                            <ul class="nav-sub">
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="{{route('BuyOrder')}}">ثبت خرید ماهانه</a>
                                </li>
                                <li class="nav-sub-item">

                                    <a class="nav-sub-link" href="{{route("BuyList")}}">لیست خرید ماهانه </a>
                                </li>


                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i
                                    class="mdi mdi-arrow-left-bold sidemenu-icon"></i><span
                                    class="sidemenu-label">فروش ماهانه</span><i
                                    class="angle fe fe-chevron-left"></i></a>
                            <ul class="nav-sub">
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="{{route('SellOrder')}}">ثبت فروش ماهانه</a>
                                </li>
                                <li class="nav-sub-item">

                                    <a class="nav-sub-link" href="{{route("SellList")}}">لیست فروش ماهانه </a>
                                </li>


                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route("AgentAccount")}}"><span class="shape1"></span><span
                                    class="shape2"></span><i
                                    class="mdi mdi-account-edit sidemenu-icon"></i><span
                                    class="sidemenu-label">حساب کاربری</span></a>
                        </li>
                    @endcan

                <li class="nav-item">
                    <a class="nav-link" href="#" wire:click="logout"><span class="shape1"></span><span
                            class="shape2"></span><i
                            class="si si-logout sidemenu-icon"></i><span class="sidemenu-label">خروج</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-header side-header sticky">
        <div class="container-fluid">
            <div class="main-header-right">
                <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
            </div>
            <div class="main-header-center">
                <div class="responsive-logo">
                    <a href="index.html"><img src="{{asset("images/Logo-black.png")}}" height="40px" width="130px"
                                              class="mobile-logo" alt="لوگو"></a>
                    <a href="index.html"><img src="{{asset("images/Logo.png")}}" class="mobile-logo-dark"
                                              alt="لوگو"></a>
                </div>

            </div>
            <div class="main-header-right">
                <div class="dropdown header-search">
                    <a class="nav-link icon header-search">
                        <i class="fe fe-search header-icons"></i>
                    </a>
                    <div class="dropdown-menu">
                        <div class="main-form-search p-2">
                            <div class="input-group">
                                <div class="input-group-btn search-panel">
                                    <select class="form-control select2-no-search">
                                        <option label="دسته بندی ها">
                                        </option>
                                        <option value="IT Projects">
                                            پروژه های IT
                                        </option>
                                        <option value="Business Case">
                                            مورد تجاری
                                        </option>
                                        <option value="Microsoft Project">
                                            پروژه مایکروسافت
                                        </option>
                                        <option value="Risk Management">
                                            مدیریت ریسک
                                        </option>
                                        <option value="Team Building">
                                            تیم سازی
                                        </option>
                                    </select>
                                </div>
                                <input type="search" class="form-control" placeholder="هر چیزی را جستجو کنید ...">
                                <button class="btn search-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @if(\Illuminate\Support\Facades\Auth::getUser()->status ==1)

                    <a class="nav-link" style="color:black" href="{{route("UserBasket")}}">

                        <div class="dropdown d-md-flex">
                                           <span style="right: -0.5rem !important;top: -0.5rem !important;"
                                                 class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{$basket}}
    <span class="visually-hidden">unread messages</span>
  </span>
                            <i style="font-size: larger" class="si si-basket"></i>

                        </div>
                    </a>

                    <div class="dropdown d-md-flex">
                        <a class="nav-link icon full-screen-link" href="#">
                            <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                            <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                        </a>
                    </div>
                @endif
                @if(\Illuminate\Support\Facades\Auth::getUser()->status ==1)
                    <div class="dropdown d-md-flex" style="width: 100px;height: 36px">
                        @if($rating != null)
                            <div style="    top: -0.2rem;
    position: relative;
    margin-right: 7px;">
                                <h3 style="font-size: medium;font-weight: bolder">{{$rating->name}}</h3>
                                <h6 style="color: red">{{$coins}} سکه</h6>
                            </div>
                        @endif
                    </div>
                @endif
                <div class="dropdown main-profile-menu">
                    <a class="d-flex" href="#">
                                            <span class="main-img-user">    <img alt="آواتار"
                                                                                 src="{{ $this->CehckProfile()  }}">
                    </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="header-navheading">
                            <h6 class="main-notification-title">{{\Illuminate\Support\Facades\Auth::getUser()->name}}</h6>
                            <p class="main-notification-text"></p>
                        </div>
                        @if($coins)
                            <a class="dropdown-item">
                                <i class="fe fe-dollar-sign"></i> تعداد سکه: {{$coins}}
                            </a>
                        @endif
                        <a class="dropdown-item" href="" wire:click="logout">
                            <i class="fe fe-power"></i> خروج از سیستم
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="mb-2" wire:click="SendToEdit"
         style="display:{{$showRed ? 'flex' : 'none'}};top: 0rem;
    position: relative;cursor:pointer;background-color:#a70000;height: 30px;width: 100%;align-items: center;justify-content: center;">
        <span style="text-align: center;color:white;font-weight: 500">رمز عبور برای حساب شما تنظیم نشده. جهت تنظیم رمز عبور کلیک کنید</span>
    </div>
</div>
