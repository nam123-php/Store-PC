@extends('frontend.layouts.master')
@section('content')
    <style>
        .post-content img {
            max-width: 100%;
            height: auto;
        }
    </style>
    <div class="wrapper-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-item py-3">
                        <a href="/">Trang chủ</a>
                        <span><i class="fa-solid fa-angle-right"></i></span>
                        <a href="{{ route('get.blog') }}" title="Bài viết">Bài viết</a>
                        <span><i class="fa-solid fa-angle-right"></i></span>
                        <span>{{ $article->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper-list-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar">
{{--                        <div class="wrapper-category">--}}
{{--                            <h3 class="category-title">--}}
{{--                                Danh mục--}}
{{--                            </h3>--}}
{{--                            <ul class="category-list">--}}
{{--                                <li class="category-item has-sub">--}}
{{--                                    <a href="#" class="category-link">--}}
{{--                                        <i class="fa-solid fa-circle-right"></i>--}}
{{--                                        Tất cả sản phẩm--}}
{{--                                    </a>--}}
{{--                                    <span class="category-item-icon">--}}
{{--                                <i class="fa-solid fa-angle-right"></i>--}}
{{--                                </span>--}}
{{--                                    <ul class="list-sub-category">--}}
{{--                                        <li class="item-sub-category">--}}
{{--                                            <a href="" class="link-sub-category">--}}
{{--                                                Bánh Tráng--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="item-sub-category">--}}
{{--                                            <a href="" class="link-sub-category">--}}
{{--                                                Bánh Tráng--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="wrapper-category mt-3">--}}
{{--                            <h3 class="category-title">--}}
{{--                                TAGS--}}
{{--                            </h3>--}}
{{--                            <ul class="category-list">--}}
{{--                                <li class="category-item">--}}
{{--                                    <p class="no-tag-news">Hiện chưa có tag nào, vui lòng thêm tag cho sản phẩm và thiết lập trong Thiết lập giao diện -&gt; Trang tin tức</p>--}}
{{--                                    <!-- <span class="tag-news">--}}
{{--                                        Thủ thuật--}}
{{--                                        </span> -->--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <div class="wrapper-category mt-3">
                            <h3 class="category-title">
                                Bài viết mới
                            </h3>
                            <ul class="category-list pb-2">
                                @foreach($articleNew ?? [] as $item)
                                    <li class="category-item">
                                    <div class="item-blog">
                                        <div class="item-blog-avt">
                                            <a href="{{ route('get.article.detail', ['slug' => $item->slug,'id' => $item->id]) }}">
                                                <img src="{{ pare_url_file($item->avatar) }}" alt="">
                                            </a>
                                        </div>
                                        <div class="item-blog-content">
                                            <h3 class="item-blog-title">
                                                <a href="{{ route('get.article.detail', ['slug' => $item->slug,'id' => $item->id]) }}">{{ $item->name }}</a>
                                            </h3>
                                            <span class="item-blog-date">{{ $item->created_at }}</span>
                                        </div>
                                    </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="post-detail">
                        <h3 class="blog-title">
                            <a href="#" title="{{ $article->name }}">{{ $article->name }}</a>
                        </h3>
                        <span class="item-blog-date">{{ $article->created_at }}</span>
                        <div class="post-avt p-4">
                            <a href="#">
                                <img src="{{ pare_url_file($article->avatar) }}" alt="{{ $article->name }}" style="width: 100%;max-width: 100%;height: auto">
                            </a>
                        </div>
                        <div class="post-content p-4">{!! $article->content !!}</div>
                        @if(isset($article->tags) && !$article->tags->isEmpty())
                        <div class="share-media py-4">
                            <span class="font-weight-bold mr-1">Tags:</span>
                            @foreach($article->tags as $item)
                                <a href="{{ route('get.tag.detail',['id' => $item->id,'slug' => Str::slug($item->name)]) }}"><i class="fa fa-tags"></i> {{ $item->name }}</a>
                            @endforeach
                        </div>
                        @endif
                        <div class="share-media py-4">
                            <span class="font-weight-bold">Chia sẻ:</span>
                            <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                        </div>
                        <div class="comment-post">
                            <h5 class="title-comment mt-4">
                                Viết bình luận của bạn
                            </h5>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-comment-item">
                                        <input class="w-100 p-2" type="text" placeholder="Họ tên*">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-comment-item">
                                        <input class="w-100 p-2" type="text" placeholder="Email*">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-comment-item">
                                        <textarea class="w-100 p-2" type="text" placeholder="Nội dung*"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-comment-item">
                                        <button class="btn btn-primary">Gửi bình luận</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-other">
                            <h5 class="post-other-title">
                                Các tin khác
                            </h5>
                            <ul class="list-post-other">
                                <li class="item-post-other">
                                    <h3>
                                        <a href="#">
                                            <i class="fa-solid fa-caret-right mr-2"></i>
                                            Ý nghĩa hoa hồng trong ngày kỷ niệm, ngày lễ tình nhân 18/06/2021
                                        </a>
                                    </h3>
                                </li>
                                <li class="item-post-other">
                                    <h3>
                                        <a href="#">
                                            <i class="fa-solid fa-caret-right mr-2"></i>
                                            Ý nghĩa hoa hồng trong ngày kỷ niệm, ngày lễ tình nhân 18/06/2021
                                        </a>
                                    </h3>
                                </li>
                                <li class="item-post-other">
                                    <h3>
                                        <a href="#">
                                            <i class="fa-solid fa-caret-right mr-2"></i>
                                            Ý nghĩa hoa hồng trong ngày kỷ niệm, ngày lễ tình nhân 18/06/2021
                                        </a>
                                    </h3>
                                </li>
                                <li class="item-post-other">
                                    <h3>
                                        <a href="#">
                                            <i class="fa-solid fa-caret-right mr-2"></i>
                                            Ý nghĩa hoa hồng trong ngày kỷ niệm, ngày lễ tình nhân 18/06/2021
                                        </a>
                                    </h3>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
