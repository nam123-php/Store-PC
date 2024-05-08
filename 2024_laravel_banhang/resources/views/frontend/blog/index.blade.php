@extends('frontend.layouts.master')
@section('content')
    <div class="wrapper-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-item py-3">
                        <a href="/">Trang chủ</a>
                        <span><i class="fa-solid fa-angle-right"></i></span>
                        <span>Tin tức</span>
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
                        <div class="wrapper-category">
                            <h3 class="category-title">
                                Chuyên mục tin tức
                            </h3>
                            <ul class="category-list">
                                @foreach($menuGlobal as $item)
                                <li class="category-item has-sub">
                                    <a href="{{ route('get.menu.detail',['id' => $item->id,'slug' => Str::slug($item->name)]) }}" class="category-link">
                                        <i class="fa-solid fa-circle-right"></i>
                                        {{ $item->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="wrapper-category mt-3">
                            <h3 class="category-title">
                                TAGS
                            </h3>
                            <ul class="category-list">
                                <li class="category-item">
                                    @foreach($tags ?? [] as $item)
                                        <a href="{{ route('get.tag.detail',['id' => $item->id,'slug' => Str::slug($item->name)]) }}"
                                           style="color: #007bff;font-size: 14px;background: #f2f2f2;padding: 5px 10px;display: inline-block;margin: 5px 0;border-radius: 11px;">{{ $item->name }}</a>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <div class="wrapper-category mt-3">
                            <h3 class="category-title">
                                Danh mục
                            </h3>
                            <ul class="category-list pb-2">
                                @foreach($articlesNew ?? [] as $item)
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
                    <div class="blog-list">
                        <div class="row">
                            <div class="col-12">
                                <div class="item-blog align-items-baseline">
                                    <h3 class="title-item-blog mr-3">
                                        Tin tức
                                    </h3>
                                    <span> ( Có tất cả {{ $articles->total() ?? 0 }} bài viết ) </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @foreach($articles ?? [] as $item)
                                    <div class="blog-main-item">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="blog-item-thumbnail">
                                                    <a href="{{ route('get.article.detail', ['slug' => $item->slug,'id' => $item->id]) }}" title="{{ $item->name }}">
                                                        <img src="{{ pare_url_file($item->avatar) }}" alt="{{ $item->name }}" width="100%">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="blog-item-content">
                                                    <h3 class="blog-title mt-2 mt-sm-0">
                                                        <a href="#" title="{{ $item->name }}">{{ $item->name }}</a>
                                                    </h3>
                                                    <span class="item-blog-date">{{ $item->created_at }}</span>
                                                    <p class="">{{ $item->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
