<div>
    <style>
        .image-card-index {
            height: 8rem;
            width: 10rem;
            margin-left: 2rem;
            transform: translateY(0);
            margin-bottom: 0.4rem;
            animation: moveUpDown 5s infinite;
        }

        .btn-custom {
            background-color: #e52a31;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .btn-custom i {
            font-size: 1.5rem;
        }

        .btn-custom span {
            font-size: 0.9rem;
        }

        @media (max-width: 580px) {
            .image-card-index {
                margin-right: 11rem;
                bottom: 0rem;
            }
        }

        @keyframes moveUpDown {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(20px);
            }
        }
    </style>
    <div class="row row-sm mt-5 mt-lg-3">
        <div class="col-sm-12 col-lg-12 col-xl-12">
            <div style="background-color:black" class="card custom-card card-box">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-sm-6 col-12 img-bg ">
                            <h4 class="d-flex  mb-3">
                                <span
                                    class="font-weight-bold text-white ">{{\Illuminate\Support\Facades\Auth::getUser()->name}}</span>
                            </h4>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3 col-6 col-sm-6">
                                        <span class="tx-white-7 mb-1">نام سطح: <b
                                                class="text-warning">{{$rating->name}}</b></span>
                                    </div>
                                    <div class="col-md-3  col-6 col-sm-6">
                                        <span class="tx-white-7 mb-1">تعداد سکه: <b class="text-warning">{{ $coins}}</b></span>
                                    </div>
                                    <div class="col-md-3  col-6 col-sm-6">
                                        <span class="tx-white-7 mb-1">تعداد محصول ثبت شده: <b
                                                class="text-warning">{{ $credits}}</b></span>
                                    </div>
                                    <div class="col-md-3  col-6 col-sm-6">
                                        <span class="tx-white-7 mb-1">تعداد هدیه دریافت شده: <b
                                                class="text-warning">0</b></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <img class="image-card-index" src="images/shopping-cart-removebg-preview.png"
                             alt="user-img">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-sm  mt-lg-2">

        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body h-100">
                    <div>
                        <h6 class="main-content-label mb-1">هدایا پیشنهادی</h6>
                        <p class="text-muted card-sub-title">در این بخش شما میتوانید هدایای قابل خرید مطابق سکه موجود را
                            خرید کنید
                        </p>
                    </div>
                    <div id="owl-demo2" class="owl-carousel owl-carousel-icons2">
                        @foreach($gifts as $gift)
                            <div class="item">
                                <div class="card">
                                    <div class="card-body user-card text-center">
                                        <div class="main-img-user avatar-lg online text-center">
                                            <img alt="آواتار" class="rounded-circle"
                                                 src="{{ url('storage/' . $gift->image) }}">
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-1">{{$gift->name}}</h5>
                                            <p class="mb-1">{{$gift->score}} سکه</p>
                                            <span class="text-muted"><i
                                                    class="far fa-check-circle text-success ml-1"></i>قابل خرید</span>

                                        </div>
                                        <a href="#" class="btn ripple btn-success btn-sm mt-3">انتخاب هدیه</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-sm mt-lg-2">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body h-100">
                    <div class="mb-3">
                        <h6 class="main-content-label mb-1">دسترسی سریع</h6>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-4 col-sm-4">
                                <a href="{{route("UserAddProduct")}}">
                                <button class="btn btn-block btn-custom">
                                    <i class="si si-basket-loaded mb-1"></i>
                                    <span class="d-block">ثبت محصول</span>
                                </button>
                                </a>
                            </div>
                            <div class="col-md-4 col-4 col-sm-4">
                                <a href="{{route("UserGifts")}}">
                                <button class="btn btn-block btn-custom">
                                    <i class="si si-present mb-1"></i>
                                  <span class="d-block">مشاهده هدایا</span>
                                </button>
                                </a>
                            </div>
                            <div class="col-md-4 col-4 col-sm-4"><a href="{{route("UserMyAccount")}}">
                                    <button class="btn btn-block btn-custom">
                                        <i class="si si-user mb-1"></i>
                                        <span class="d-block">حساب کاربری</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
