@extends('partials.index')

@section('script-head')
@endsection

@section('content')
    {{-- carousel --}}
    <div class="row justify-content-start">
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Popular</h4>
                    <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel"
                        id="owl-carousel-basic">
                        <div class="item">
                            <img src="/assets/images/dashboard/Rectangle.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="/assets/images/dashboard/Img_5.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="/assets/images/dashboard/img_6.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- items --}}
    <div class="row">
        <div class="col-md-3 mb-2">
            <div class="card" style="width: 18rem;">
                <img src="/assets/images/dashboard/Img_5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-text"><a href="#" class="text-decoration-none text-light">Title vidio</a></h5>
                    <a href="#" class="text-decoration-none card-text text-light">name of author</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="card" style="width: 18rem;">
                <img src="/assets/images/dashboard/Img_5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-text"><a href="#" class="text-decoration-none text-light">Title vidio</a></h5>
                    <a href="#" class="text-decoration-none card-text text-light">name of author</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="card" style="width: 18rem;">
                <img src="/assets/images/dashboard/Img_5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-text"><a href="#" class="text-decoration-none text-light">Title vidio</a></h5>
                    <a href="#" class="text-decoration-none card-text text-light">name of author</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="card" style="width: 18rem;">
                <img src="/assets/images/dashboard/Img_5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-text"><a href="#" class="text-decoration-none text-light">Title vidio</a></h5>
                    <a href="#" class="text-decoration-none card-text text-light">name of author</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="card" style="width: 18rem;">
                <img src="/assets/images/dashboard/Img_5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-text"><a href="#" class="text-decoration-none text-light">Title vidio</a></h5>
                    <a href="#" class="text-decoration-none card-text text-light">name of author</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="card" style="width: 18rem;">
                <img src="/assets/images/dashboard/Img_5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-text"><a href="#" class="text-decoration-none text-light">Title vidio</a></h5>
                    <a href="#" class="text-decoration-none card-text text-light">name of author</a>
                </div>
            </div>
        </div>
    </div>
@endsection
