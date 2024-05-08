<div class="col-12">
    <div class="product-tabs mt-3">
        <div class="title-product-tabs d-flex">
            <div class="item-title-tab active">
                Mô tả
            </div>
        </div>
        <div class="content-product-tabs my-4 p-3">
            <div class="item-content-tab active">
                {!! $product->content !!}
            </div>
            <div class="item-content-tab">
                <ul>
                    <li><textarea type="text" placeholder="Nội dung tùy chỉnh viết ở đây"></textarea></li>
                </ul>
            </div>
            <div class="item-content-tab">
                <ul>
                    <li class="d-flex align-items-center justify-content-center flex-column py-3 px-2 evaluate">
                        <p>

                            Hiện tại sản phẩm chưa có đánh giá nào, bạn hãy trở thành người đầu tiên đánh giá cho sản phẩm này
                        </p>
                        <button>Gửi đánh giá của bạn</button>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
