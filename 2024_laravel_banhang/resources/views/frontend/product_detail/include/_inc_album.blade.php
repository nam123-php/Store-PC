<div class="detail-product-thumbnail">
    <div class="thumbnail-main">
        <img src="{{ pare_url_file($product->avatar) }}" onerror="this.src='https://123code.net/images/preloader.png'" alt="{{ $product->name }}" width="100%">
    </div>
    @if(isset($product->images) && !$product->images->isEmpty())
        <div class="list-thumbnail owl-carousel owl-loaded owl-drag">
            <div class="owl-stage-outer">
                <div class="owl-stage">
                    {{--                                                <div class="owl-stage" style="transform: translate3d(-83px, 0px, 0px); transition: all 0.25s ease 0s; width: 420px;">--}}
                    @foreach($product->images ?? [] as $img)
                        <div class="owl-item">
                            <div class="item-thumbnail">
                                <img src="{{ pare_url_file($img->path) }}" onerror="this.src='https://123code.net/images/preloader.png'" alt="{{ $img->name }}" width="100%">
                            </div>
                        </div>
                    @endforeach

                    {{--                                                    <div class="owl-item active" style="width: 83.906px;">--}}
                    {{--                                                        <div class="item-thumbnail">--}}
                    {{--                                                            <img src="/assets/img/262350785-3103872226524092-2769146742188999091-n.webp" alt="" width="100%">--}}
                    {{--                                                        </div>--}}
                    {{--                                                    </div>--}}
                    {{--                                                    <div class="owl-item active" style="width: 83.906px;">--}}
                    {{--                                                        <div class="item-thumbnail">--}}
                    {{--                                                            <img src="/assets/img/261013288-3103872196524095-8268213394365804321-n.webp" alt="" width="100%">--}}
                    {{--                                                        </div>--}}
                    {{--                                                    </div>--}}
                    {{--                                                    <div class="owl-item active" style="width: 83.906px;">--}}
                    {{--                                                        <div class="item-thumbnail">--}}
                    {{--                                                            <img src="/assets/img/261013288-3103872196524095-8268213394365804321-n.webp" alt="" width="100%">--}}
                    {{--                                                        </div>--}}
                    {{--                                                    </div>--}}
                    {{--                                                    <div class="owl-item active" style="width: 83.906px;">--}}
                    {{--                                                        <div class="item-thumbnail">--}}
                    {{--                                                            <img src="/assets/img/261013288-3103872196524095-8268213394365804321-n.webp" alt="" width="100%">--}}
                    {{--                                                        </div>--}}
                    {{--                                                    </div>--}}
                </div>
            </div>
            {{--                                            <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>--}}
            {{--                                            <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot active"><span></span></button></div>--}}
        </div>
    @endif
</div>
