@extends('frontend.layouts.master')
@section('content')
    <div class="wrapper-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-item py-3">
                        <a href="#">Trang chủ</a>
                        <span><i class="fa-solid fa-angle-right"></i></span>
                        <span>Sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper-list-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.component._inc_sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <h3 class="detail-product-name col-8">
                            <a href="" title="Tất cả sản phẩm">Tất cả sản phẩm</a>
                        </h3>
                    </div>
                    <div class="row">
                        @foreach($products ?? [] as $item)
                            @include('frontend.component._inc_item_product')
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12">
                            {!! $products->appends($query ?? [])->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
