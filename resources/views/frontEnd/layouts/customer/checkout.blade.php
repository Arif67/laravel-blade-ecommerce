@extends('frontEnd.layouts.master') @section('title', 'Customer Checkout') @push('css')
<link rel="stylesheet" href="{{ asset('frontEnd/css/select2.min.css') }}" />
@endpush @section('content')
<section class="chheckout-section">
    @php
    $subtotal = Cart::instance('shopping')->subtotal();
    $subtotal = str_replace(',', '', $subtotal);
    $subtotal = str_replace('.00', '', $subtotal);
    $shipping = Session::get('shipping') ? Session::get('shipping') : 0;
    $coupon = Session::get('coupon_amount') ? Session::get('coupon_amount') : 0;
    $discount = Session::get('discount')?Session::get('discount'):0;
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-sm-5 cus-order-2">
                <div class="checkout-shipping">
                    <style>
                        .compact-form .form-label {
                            font-size: 14px;
                            line-height: 1.2;
                            margin-bottom: 4px;
                        }

                        .compact-form input,
                        .compact-form select {
                            padding: 6px 10px;
                            font-size: 14px;
                            height: 36px;
                        }

                        .compact-form .card-header h6 {
                            font-size: 14px;
                            line-height: 1.4;
                            margin-bottom: 0;
                        }

                        .compact-form button {
                            font-size: 14px;
                            padding: 6px 18px;
                        }

                        .compact-form .form-control,
                        .compact-form .form-select {
                            border-radius: 0.25rem;
                        }

                        .compact-form .card-body {
                            padding: 16px;
                        }

                        .compact-form .card-header {
                            padding: 12px 16px;
                        }

                        .compact-form .row {
                            --bs-gutter-y: 0.5rem;
                        }
                    </style>

                    <form action="{{ route('customer.ordersave') }}" method="POST" data-parsley-validate="" class="compact-form">
                        @csrf
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-light border-bottom">
                                <h6 class="text-danger fw-bold">
                                    প্রিয় গ্রাহক, নিচের তথ্যগুলো সঠিকভাবে পূরণ করে অর্ডার প্লেস করুন। অযথা অর্ডার করবেন না।
                                    কোনো কারণে প্রোডাক্ট রিটার্ন করলে ডেলিভারি চার্জ দিয়ে রিটার্ন করতে হবে।
                                </h6>
                            </div>

                            <div class="card-body">
                                <div class="row g-2">

                                    {{-- Name --}}
                                    <div class="col-md-12">
                                        <label for="name" class="form-label fw-semibold">আপনার নাম লিখুন *</label>
                                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                                            class="form-control @error('name') is-invalid @enderror" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Phone --}}
                                    <div class="col-md-12">
                                        <label for="phone" class="form-label fw-semibold">আপনার নাম্বার লিখুন *</label>
                                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                            minlength="11" maxlength="11" pattern="0[0-9]+"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            title="০ দিয়ে শুরু করে ১১ ডিজিটের নাম্বার দিন" required>
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Address --}}
                                    <div class="col-md-12">
                                        <label for="address" class="form-label fw-semibold">ঠিকানা লিখুন *</label>
                                        <input type="text" id="address" name="address" value="{{ old('address') }}"
                                            class="form-control @error('address') is-invalid @enderror" required>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Area --}}
                                    <div class="col-md-12">
                                        <label for="area" class="form-label fw-semibold">ডেলিভারি এরিয়া নিবার্চন করুন *</label>
                                        <select id="area" name="area" class="form-select @error('area') is-invalid @enderror" required>
                                            <option value="">এরিয়া নিবার্চন করুন</option>
                                            @foreach ($shippingcharge as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('area')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                               
                                    <div class="col-md-12 text-center mt-2">
                                        <button type="submit" class="btn btn-success orderNowBtn rounded-pill shadow-sm w-100">
                                            <i class="fa-solid fa-check-circle me-1 "></i> অর্ডার করুন
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- col end -->
            <div class="col-sm-7 cust-order-1">
                <div class="cart_details table-responsive-sm">
                    <div class="card">
                        <div class="card-header">
                            <h5>অর্ডারের তথ্য</h5>
                        </div>
                        <div class="card-body cartlist">
                            <style>
                                .cart_table img {
                                    width: 60px;
                                    height: 60px;
                                    object-fit: cover;
                                    border-radius: 6px;
                                    margin-right: 8px;
                                }

                                .cart_table .product-info {
                                    display: flex;
                                    align-items: center;
                                    gap: 10px;
                                }

                                .cart_table .quantity {
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    gap: 6px;
                                }

                                .cart_table .quantity input {
                                    width: 50px;
                                    text-align: center;
                                    border: 1px solid #ddd;
                                    border-radius: 4px;
                                }

                                .cart_table .quantity button {
                                    width: 30px;
                                    height: 30px;
                                    border: none;
                                    background-color: #f0f0f0;
                                    color: #000;
                                    font-weight: bold;
                                    border-radius: 4px;
                                }

                                .cart_table .quantity button:hover {
                                    background-color: #d3d3d3;
                                }

                                .cart_table tfoot th,
                                .cart_table tfoot td {
                                    background-color: #f8f9fa;
                                    font-weight: bold;
                                }

                                .cart_table tr:hover {
                                    background-color: #f1f1f1;
                                }

                                .alinur {
                                    color: #198754;
                                    font-weight: 600;
                                }

                                .cart_remove {
                                    cursor: pointer;
                                    font-size: 18px;
                                }

                                .cart_remove:hover {
                                    color: #dc3545;
                                }
                            </style>

            <table class="cart_table table table-bordered table-striped text-center mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 10%;">ডিলিট</th>
                        <th style="width: 45%;">প্রোডাক্ট</th>
                        <th style="width: 15%;">পরিমাণ</th>
                        <th style="width: 15%;">মূল্য</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (Cart::instance('shopping')->content() as $value)
                        <tr>
                            <td>
                                <a class="cart_remove text-danger" data-id="{{ $value->rowId }}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                            <td class="text-start">
                                <a href="{{ route('product', $value->options->slug) }}" class="text-dark text-decoration-none">
                                    <div class="product-info">
                                        <img src="{{ asset($value->options->image) }}" alt="{{ $value->name }}">
                                        <div>
                                            <div class="fw-semibold">{{ Str::limit($value->name, 35) }}</div>
                                            <div class="small text-muted">
                                                @if ($value->options->product_size)
                                                    <span>Size: {{ $value->options->product_size }} | </span>
                                                @endif
                                                @if ($value->options->product_color)
                                                    <span>Color: {{ $value->options->product_color }} | </span>
                                                @endif
                                                @if ($value->options->product_model)
                                                    <span>Model: {{ $value->options->product_model }} | </span>
                                                @endif
                                                @if ($value->options->product_weight)
                                                    <span>Weight: {{ $value->options->product_weight }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </td>

                            <td>
                                <div class="quantity">
                                    <button class="cart_decrement" data-id="{{ $value->rowId }}">−</button>
                                    <input type="text" value="{{ $value->qty }}" readonly />
                                    <button class="cart_increment" data-id="{{ $value->rowId }}">+</button>
                                </div>
                            </td>

                            <td>
                                <span class="alinur">৳</span>
                                <strong>{{ $value->price }}</strong>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end px-4">মোট</th>
                        <td class="px-4">
                            <span class="alinur">৳</span>
                            <strong>{{ $subtotal }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3" class="text-end px-4">ডেলিভারি চার্জ</th>
                        <td class="px-4">
                            <span class="alinur">৳</span>
                            <strong>{{ $shipping }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3" class="text-end px-4">ডিসকাউন্ট</th>
                        <td class="px-4">
                            <span class="alinur">৳</span>
                            <strong>{{ $discount + $coupon }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3" class="text-end px-4">সর্বমোট</th>
                        <td class="px-4">
                            <span class="alinur">৳</span>
                            <strong>{{ $subtotal + $shipping - ($discount + $coupon) }}</strong>
                        </td>
                    </tr>
                </tfoot>
            </table>

                            <form action="@if(Session::get('coupon_used')) {{ route('customer.coupon_remove') }} @else {{ route('customer.coupon') }} @endif" class="checkout-coupon-form" method="POST">
                                @csrf
                                <div class="coupon">
                                    <input type="text" name="coupon_code" placeholder=" @if(Session::get('coupon_used')) {{Session::get('coupon_used')}} @else Apply Coupon @endif" class="border-0 shadow-none form-control" />
                                    <input type="submit" value="@if(Session::get('coupon_used')) remove @else apply  @endif " class="border-0 shadow-none btn btn-theme" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->
        </div>
    </div>
</section>
@php 
//dd(Cart::instance('shopping')->content());

@endphp
@endsection @push('script')
<script src="{{ asset('frontEnd/') }}/js/parsley.min.js"></script>
<script src="{{ asset('frontEnd/') }}/js/form-validation.init.js"></script>
<script src="{{ asset('frontEnd/') }}/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $(".select2").select2();
    });
</script>
<script>
    $("#area").on("change", function() {
        var id = $(this).val();
        $.ajax({
            type: "GET",
            data: {
                id: id
            },
            url: "{{ route('shipping.charge') }}",
            dataType: "html",
            success: function(response) {
                $(".cartlist").html(response);
            },
        });
    });
</script>

   <script>
document.addEventListener('DOMContentLoaded', function () {
    const items = [
        @foreach(Cart::instance('shopping')->content() as $cartInfo)
        {
            id: "{{ $cartInfo->id }}",
            name: {!! json_encode($cartInfo->name) !!},
            price: {{ $cartInfo->price }},
            size: {!! json_encode($cartInfo->options->product_size ?? '') !!},
            color: {!! json_encode($cartInfo->options->product_color ?? '') !!},
            model: {!! json_encode($cartInfo->options->product_model ?? '') !!},
            weight: {!! json_encode($cartInfo->options->product_weight ?? '') !!},
            quantity: {{ $cartInfo->qty ?? 0 }}
        }@if(!$loop->last),@endif
        @endforeach
    ];

    console.log(items);

    const totalValue = items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const contentIds = items.map(item => item.id);

    // Unique Event ID for deduplication
    const eventId = `begincheckout_{{ session()->getId() }}_${Date.now()}`;

    // --- Capture fbp & fbc cookies for deduplication ---
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }
    const fbp = getCookie('_fbp');
    const fbc = getCookie('_fbc');

    console.log('🛒 BeginCheckout triggered:', items, 'Total:', totalValue, 'EventID:', eventId, 'fbp:', fbp, 'fbc:', fbc);

    // --- Facebook Pixel (browser-side) ---
    fbq('track', 'InitiateCheckout', {
        currency: "BDT",
        value: totalValue,
        content_ids: contentIds,
        content_type: "product",
        contents: items.map(item => ({
            id: item.id,
            quantity: item.quantity,
            item_price: item.price
        }))
    }, {
        eventID: eventId
    });

    // --- Facebook Conversion API (server-side) ---
    fetch('{{ route("facebook.begin_checkout_capi") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            event_id: eventId,
            currency: "BDT",
            value: totalValue,
            items: items,
            content_ids: contentIds,
            content_type: "product",
            client_user_agent: navigator.userAgent,
            client_ip_address: "{{ request()->ip() }}",
            fbp: fbp,
            fbc: fbc
        })
    })
    .then(async res => {
        const text = await res.text();
        try {
            const data = JSON.parse(text);
            console.log('✅ CAPI BeginCheckout success response:', data);
        } catch (err) {
            console.error('❌ CAPI BeginCheckout error. Raw response:', text);
        }
    })
    .catch(err => console.error('❌ CAPI BeginCheckout fetch error:', err));
});
</script>










@endpush