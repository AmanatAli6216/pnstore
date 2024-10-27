@extends('front.layout.layout')
@section('slider')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown text-centre"></h1>
                                    <a href="{{route('shop')}}" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>

                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown">Naturals Purity Is Always Healthy</h1>
                                    <a href="{{route('shop')}}" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown">Our Objective Is To Provide Organic Products </h1>
                                    <a href="{{route('shop')}}" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown">Prime Quality Rich in Taste   </h1>
                                    <a href="{{route('shop')}}" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->
@endsection

@section('content')
    <!-- Blog Start -->

    <div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <i><h1 class="display-5 mb-3">Featured Brands</h1></i>
        </div>
        
        @foreach($products->chunk(4) as $productChunk)
            <div class="row g-4 mb-4">
                @foreach($productChunk as $value)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="{{ asset('productView') }}"><img class="img-fluid" src="{{ asset('uploads/'.$value->image) }}" alt="" style="width: 100%; height: 200px; object-fit: cover;"
                            >
                        <div class="bg-light p-4">
                            <a class="d-block h5 lh-base mb-4" href="">{{ $value->name }}</a>
                                <i class="fa fa-tag text-primary me-2"></i><small>Rs. {{ $value->price }}</small>
                                <i class="fa fa-calendar text-primary me-2"></i><small>{{ $value->updated_at->format('d M Y') }}</small>
                            <div class="text-muted border-top pt-4">

                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href=""><i class="fa fa-eye text-secondary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href=""><i class="fa fa-shopping-bag text-secondary me-2"></i>Add to cart</a>
                                    </small>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach    
            </div>
            
        @endforeach

        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
            <a class="btn btn-primary rounded-pill py-3 px-5" href="">Load More</a>
        </div>
    </div>
</div>

    <!-- Blog End -->
@endsection