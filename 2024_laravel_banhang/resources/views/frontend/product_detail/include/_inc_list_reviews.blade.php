<div class="reviews content_text">
    <h4 class="reviews-title"><b>{{ $product->total_vote }}</b> đánh giá</h4>
    <div class="dashboards">
        <div class="item dashboards_sum">
            @php
                $age = 0;
                if ($product->total_vote)
                    $age = round($product->total_stars / $product->total_vote,2);
            @endphp
            <span> {{ $age }} <i class="fa fa-star"></i></span>
        </div>
        <div class="item dashboards_item">
            @foreach($ratingDefault as $key => $item)
                <div class="item_review">
                    <span class="item_review-name">{{ $key }} <i class="la la-star"></i></span>
                    <div class="item_review-process">
                        <div>
                            @php
                                $ageItem = 0;
                                if ($product->total_stars)
                                    $ageItem = ($item['count_number'] / $product->total_vote) * 100 ;
                            @endphp
                            <span style="width: {{ $ageItem }}%;"> </span>
                        </div>
                    </div>
                    <span class="item_review-count"><b>{{ $item['count_number']  }}</b> đánh giá</span>
                </div>
            @endforeach
        </div>
    </div>
{{--    @if (\Request::route()->getName() == 'get.product.rating_list')--}}
{{--        @include('frontend.product_detail.include._inc_filter')--}}
{{--    @endif--}}
    <div class="reviews_list">
        @foreach($ratings as $item)
            <div class="item">
                <p class="item_author">
                    <span>{{ $item->user->name ?? "[N\A]" }}</span>
                    <span class="item_success"><i class="fa fa-check-circle"></i> Đã mua tại cửa hàng</span>
                </p>
{{--                <div class="item_review">--}}
{{--                   --}}
{{--                </div>--}}
                <span class="item_review">
                        @for ($j = 1 ; $j <= 5 ; $j ++)
                        <i class="fa fa-star {{ $j <= $item->number_vote ? 'active' : '' }}"></i>
                    @endfor
                </span>
                {{ $item->content_vote }}

                <div class="item_footer">
                    <span class="item_time"><i class="fa fa-clock-o"></i> đánh giá {{  $item->created_at }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>