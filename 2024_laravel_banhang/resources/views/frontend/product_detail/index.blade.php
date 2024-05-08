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
                <div class="col-lg-9">
                    <div class="detail-product">

                        <div class="row">
                            <div class="col-md-5">
                                @include('frontend.product_detail.include._inc_album')
                            </div>

                            <div class="col-md-7">
                                <div class="detail-product-info">
                                    <h3 class="detail-product-name">
                                        <a href="" title="{{ $product->name }}">{{ $product->name }}</a>
                                    </h3>

                                    <div class="detail-product-write-evaluate">
                                        <span class="write-evaluate-icon">
                                            @php  $age = renderAgeVote($product) @endphp
                                            @for($i = 1 ; $i <= 5 ; $i ++)
                                                <span class="{{ $age >= $i  ? 'active' : '' }}"><i class="fa-regular fa-star"></i></span>
                                            @endfor
                                        </span>
{{--                                        <span class="write-evaluate-text">--}}
{{--                                            Viết đánh giá của bạn--}}
{{--                                        </span>--}}
                                    </div>
                                    <div class="detail-product-status">
                                        <span>Trạng thái: </span>
                                        <span class="status">
                                            {{ $product->number <= 0 ? "Hết hàng" : "Còn hàng"}}
                                        </span>
                                    </div>
                                    <div class="detail-product-price">
                                        <span class="detail-product-price-special">{{ number_format($product->price,0,',','.') }}đ</span>
{{--                                        <span class="detail-product-price-old">150.000đ</span>--}}
                                    </div>
                                    <div class="detail-product-des">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                    @if($productValues && !$productValues->isEmpty())
                                    <div class="detail-product-selector">
                                        <style>
                                            .parameter__list.active {
                                                display: block;
                                                margin-bottom: 15px;
                                            }
                                            .parameter__list li {
                                                align-items: flex-start;
                                                display: flex;
                                                padding: 10px;
                                            }
                                            .parameter__list li:nth-child(odd) {
                                                background-color: #f5f5f5;
                                            }
                                            .parameter__list .lileft {
                                                width: 140px;
                                                margin-bottom: 0;
                                            }
                                            .parameter__list .liright {
                                                width: calc(100% - 140px);
                                                padding: 0 5px 0 25px !important;
                                            }
                                        </style>
                                        <ul class="parameter__list 306530 active">
                                            @foreach($productValues as $item)
                                            <li data-index="0" data-prop="0">
                                                <p class="lileft">{{ $item->productOption->option_name ?? "" }}:</p>
                                                <div class="liright">
                                                    <span class="comma">{{ $item->name_value }}</span>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <div class="detail-product-buy">
{{--                                        <span>Số lượng</span>--}}
{{--                                        <input type="number" value="1">--}}
                                        <a href="{{ route('get.shopping.add', $product->id) }}">Mua hàng</a>
                                        @if (isset($user->is_wholesale) && $user->is_wholesale == 1 && $product->is_wholesale)
                                            <a class="js-add-wholesale" href="">Tạo đơn sỉ</a>
                                        @endif
                                    </div>
                                    <div class="detail-product-other">
                                        <span>Chia sẻ: </span>
                                        <span>
                                            <a href="#" class="text-dark"><i class="fa-brands fa-square-facebook"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @include('frontend.product_detail.include._inc_content')

                            <div class="col-md-12">
                                <div class="product-tabs mt-3 mb-3">
                                    <div class="title-product-tabs d-flex">
                                        <div class="item-title-tab active">
                                            Đánh giá
                                        </div>
                                    </div>
                                </div>
                                <div class="reviews_list">
                                    @include('frontend.product_detail.include._inc_list_reviews',['ratings' => $ratings])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="wrapper-category">
                            <h3 class="category-title">
                                Danh mục
                            </h3>
                            <ul class="category-list">
                                @foreach($categories ?? [] as $item)
                                    <li class="category-item">
                                        <a href="{{ route('get.category.item', $item->slug) }}" title="{{ $item->name }}" class="category-link">
                                            {{ $item->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrapper-title-section">

                        <h3 class="title-section">
                            <a href="#">Sản phẩm liên quan</a>
                        </h3>
                    </div>
                </div>
                <div class="row">
                    @foreach($productsSuggest ?? [] as $item)
                        <div class="col-md-3 col-4">
                            <div class="product-item d-flex flex-column align-items-center ">
                                <div class="product-item-avt position-relative">
                                    <a href="{{ route('get.product.item',['slug' => 'san-pham','id' => $item['id']]) }}">
                                        <img src="{{ pare_url_file($item['avatar']) }}" onerror="this.src='https://123code.net/images/preloader.png'"  alt="{{ $item['name'] }}">
                                    </a>
                                </div>
                                <div class="product-item-info d-flex flex-column align-items-center">

                                    <h3 class="product-item-title m-0">
                                        <a href="{{ route('get.product.item',['id' => $item['id'], 'slug' => $item['slug']]) }}" title="{{ $item['name'] }}">{{ $item['name'] }}</a>
                                    </h3>
                                    <div class="product-item-price d-flex ">
                                        <h4 class="m-0 price">{{ number_format($item['price'],0,',','.') }}đ</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('frontend.product_detail.include._inc_wholesale')
@stop
@section('script')
    <script>
        $(function (){
            $(".js-add-wholesale").click(function (event){
                event.preventDefault();
                $(".popup-quickview").addClass('active');
            })
        })
    </script>
@stop
