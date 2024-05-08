@php
    $wholesale = $product->wholesale ?? []
@endphp
<div class="popup-quickview">
    <div class="wrapper-detail-product position-relative">
        <div class="detail-product">
            <div class="row">
                <div class="col-12">
                    <div class="detail-product-info">
                        <h3 class="detail-product-name">
                            <a href="#">Bánh sùng nhí tuổi thơ</a>
                        </h3>
                        <div class="detail-product-des">
                            <ul class="w-100 pb-2">
                                @foreach($wholesale ?? [] as $key => $whole)
                                    <li class="wholesale product-item-price d-flex justify-content-between mb-0" style="font-size: 13px;">
                                        <span>{{ $whole->form }} - {{ $whole->to }} sp</span>
                                        <span class="price" style="color: #F1486F">{{ number_format($whole->price,0,',','.') }} vnđ / 1sp</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="detail-product-buy">
                            <form action="{{ route('post.order.wholesale', $product->id) }}" method="POST">
                                @csrf
                                <span>Số lượng</span>
                                <input style="width: 150px" type="number" name="qty" value="1">
                                <button type="submit" class="btn btn-success">Xác nhận</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="close-popup">
            <span><i class="fa-solid fa-xmark"></i></span>
        </div>
    </div>
</div>
