@extends('frontEnd.layouts.master') @section('title', 'Top Level Online Ecommerce Market in Bangladesh')
@push('seo')
<meta name="app-url" content="{{ route('home') }}" />
<meta name="robots" content="index, follow" />
<meta name="description" content="{{$generalsetting?->meta_description}}" />
<meta name="keywords" content="{{$generalsetting?->meta_tag}}" />

<!-- Open Graph data -->
<meta property="og:title" content="{{$generalsetting?->meta_title}}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ route('home') }}" />
<meta property="og:image" content="{{ asset($generalsetting?->white_logo) }}" />
<meta property="og:description" content="{{$generalsetting?->meta_description}}" />
@endpush @push('css')
<link rel="stylesheet" href="{{ asset('frontEnd/css/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('frontEnd/css/owl.theme.default.min.css') }}" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" rel="stylesheet" />
 @php
    $subtotal = Cart::instance('shopping')->subtotal();
    $subtotal = str_replace(',', '', $subtotal);
    $subtotal = str_replace('.00', '', $subtotal);
    $shipping = Session::get('shipping') ? Session::get('shipping') : 0;
    $coupon = Session::get('coupon_amount') ? Session::get('coupon_amount') : 0;
    $discount = Session::get('discount')?Session::get('discount'):0;
@endphp
<style>
    .newArrival {
        background: #F5F5F5;
        border-radius: 10px;
        padding: 10px;
    }

    .view-all-btn {
        background: linear-gradient(135deg, #ffe8e8, #ffffff);
        border: 1px solid #f0dede;
        transition: all 0.3s ease;
    }

    .view-all-btn:hover {
        background: linear-gradient(135deg, #ffd6d6, #fff);
        color: #c0392b;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .section-title-name {
        font-family: 'Poppins', sans-serif;
        letter-spacing: 0.5px;
        transition: 0.3s ease-in-out;
    }

    .section-title-name:hover {
        transform: scale(1.03);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .gradient-text {
        background: linear-gradient(90deg, #ff6a00, #ee0979);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
        font-family: 'Poppins', sans-serif;
        letter-spacing: 1px;
        transition: all 0.3s ease;
    }

    .gradient-text:hover {
        transform: scale(1.05);
    }

    .product_grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr); /* 5 columns on large screens */
    gap: 20px;
}

.product_item {
    background: #fff;
    border: 1px solid #eee;
    border-radius: 8px;
    overflow: hidden;
}

/* Tablet: 3 columns */
@media (max-width: 992px) {
    .product_grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* Mobile: 2 columns */
@media (max-width: 576px) {
    .product_grid {
        grid-template-columns: repeat(2, 1fr);
    }
}


</style>
@endpush @section('content')

      <script>
    // Function to save the scroll position
    function saveScrollPosition() {
        localStorage.setItem('scrollPosition', window.scrollY);
    }

    // Function to restore the scroll position
    function restoreScrollPosition() {
        const scrollPosition = localStorage.getItem('scrollPosition');
        if (scrollPosition) {
            window.scrollTo(0, parseInt(scrollPosition, 10));
            localStorage.removeItem('scrollPosition'); // Clean up after restoring
        }
    }

    // Save the scroll position before the page unloads
    window.addEventListener('beforeunload', saveScrollPosition);

    // Restore the scroll position when the page loads
    window.addEventListener('load', restoreScrollPosition);
</script>



<div class="container " style="margin-top:100px;>
    <div class="row">
        <div class="product_grid">
            @foreach ($products as $key => $value)
                <div class="product_item wist_item">
                    <div class="product_item_inner">
                        @if($value->variable_count > 0 && $value->type == 0)
                            @if($value->variable->old_price)
                                <div class="discount">
                                    <p>
                                        @php 
                                            $discount = ((($value->variable->old_price) - ($value->variable->new_price)) * 100) / ($value->variable->old_price);
                                        @endphp 
                                        -{{ number_format($discount, 0) }}%
                                    </p>
                                </div>
                            @endif
                        @else
                            @if($value->old_price)
                                <div class="discount">
                                    <p>
                                        @php 
                                            $discount = ((($value->old_price) - ($value->new_price)) * 100) / ($value->old_price);
                                        @endphp 
                                        -{{ number_format($discount, 0) }}%
                                    </p>
                                </div>
                            @endif
                        @endif

                        <div class="pro_img">
                            <a href="{{ route('product', $value->slug) }}">
                                <img src="{{ asset($value->image ? $value->image->image : '') }}" 
                                    alt="{{ $value->name }}" />
                            </a>
                        </div>

                        <div class="pro_des">
                            <div class="pro_name">
                                <a href="{{ route('product', $value->slug) }}">
                                    {{ Str::limit($value->name, 80) }}
                                </a>
                            </div>
                            <div class="pro_price">
                                @if($value->variable_count > 0 && $value->type == 0)
                                    <p>
                                        @if ($value->variable->old_price)
                                            <del>৳ {{ $value->variable->old_price }}</del>
                                        @endif
                                        ৳ {{ $value->variable->new_price }}
                                    </p>
                                @else
                                    <p>
                                        @if ($value->old_price)
                                            <del>৳ {{ $value->old_price }}</del>
                                        @endif
                                        ৳ {{ $value->new_price }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                 @php
                        $cartItem = Cart::instance('shopping')->content()->where('id', $value->id)->first();
                        @endphp

                        @if($value->variable_count > 0 && $value->type == 0)
                            {{-- Product has variations --}}
                            <div class="d-flex gap-2 mt-2">
                                @if($cartItem)
                                    <a href="{{ route('product', $value->slug) }}" class="btn btn-secondary w-50">
                                        নির্বাচিত
                                    </a>
                                    <a href="{{ route('product', $value->slug) }}" class="btn btn-secondary w-50">
                                        নির্বাচিত
                                    </a>
                                @else
                                    <a href="{{ route('product', $value->slug) }}" class="btn btn-success w-50">
                                        প্রোডাক্ট নির্বাচন করুন
                                    </a>
                                    <a href="{{ route('product', $value->slug) }}" class="btn btn-primary w-50">
                                        প্রোডাক্ট নির্বাচন করুন
                                    </a>
                                @endif
                            </div>
                        @else
                            {{-- Simple product --}}
                            <form action="{{ route('cart.store') }}" method="POST" class="mt-2">
                                @csrf
                                <input type="hidden" name="id" value="{{ $value->id }}" />
                                <input type="hidden" name="qty" value="1" />
                                <div class="d-flex gap-2">
                                    @if($cartItem)
                                        <button type="button" class="btn btn-secondary w-100 text-center">
                                            নির্বাচিত
                                        </button>
                                    @else
                                        <button type="submit" name="add_cart" class="btn btn-success w-100 text-center">
                                            প্রোডাক্ট নির্বাচন করুন
                                        </button>
                                    @endif
                                </div>
                            </form>
                        @endif
                </div>
            @endforeach
        </div>
    </div>
</div>

 <section   class="chheckout-section">
    @php
    $subtotal = Cart::instance('shopping')->subtotal();
    $subtotal = str_replace(',', '', $subtotal);
    $subtotal = str_replace('.00', '', $subtotal);
    $shipping = Session::get('shipping') ? Session::get('shipping') : 0;
    $coupon = Session::get('coupon_amount') ? Session::get('coupon_amount') : 0;
    $discount = Session::get('discount')?Session::get('discount'):0;
    @endphp
    <div class="container" id="order_form">
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
                 <div  style="margin-top:130px; ">

                 </div>
                    <form action="{{ route('customer.ordersave') }}" method="POST" data-parsley-validate="" class="compact-form">
                        @csrf
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-light border-bottom">
                                <h6 class="text-danger fw-bold">
                                     অযথা অর্ডার করবেন না।
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
                                   <div class="col-md-12 mb-3">
                                       <label for="note" 
                                            class="form-label" 
                                            style="color: red; font-weight: 900; background-color: yellow; padding: 5px;">
                                            আপনার বেবির বয়স এখানে লিখে দেবেন *
                                        </label>

                                        <input type="text" id="note" name="note" style="height:60px; border: 2px solid red;" 
                                            value="{{ old('note') }}"
                                            class="form-control @error('note') is-invalid @enderror" 
                                            placeholder="আপনার বেবির বয়স এখানে লিখে দেবেন" required>
                                        @error('note')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Area --}}
                                    <div class="col-md-12">
                                       <label for="area" class="form-label fw-bold text-danger">
                                            ডেলিভারি এরিয়া নিবার্চন করুন *
                                        </label>

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
 style="margin-top:100px;
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

                         
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->
        </div>
    </div>
</section>
@endsection @push('script')
<script src="{{ asset('frontEnd/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontEnd/js/jquery.syotimer.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".main_slider").owlCarousel({
            items: 1,
            loop: true,
            dots: false,
            autoplay: true,
            nav: false,
            autoplayHoverPause: false,
            margin: 0,
            mouseDrag: true,
            smartSpeed: 1000,
            autoplayTimeout: 4000

        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".hotdeals-slider").owlCarousel({
            margin: 15,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 3,
                    nav: true,
                },
                600: {
                    items: 3,
                    nav: false,
                },
                1000: {
                    items: 6,
                    nav: true,
                    loop: false,
                },
            },
        });
    });
    $(document).ready(function() {
        $(".hotdeals-slider1").owlCarousel({
            margin: 15,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    nav: true,
                },
                600: {
                    items: 3,
                    nav: false,
                },
                1000: {
                    items: 6,
                    nav: true,
                    loop: false,
                },
            },
        });
          $(".hotdeals-slider111").owlCarousel({
            margin: 15,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    nav: true,
                },
                600: {
                    items: 3,
                    nav: false,
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: false,
                },
            },
        });
    });
</script>

<script>
    $(document).ready(function() {


        $(".product_slider").owlCarousel({
            margin: 15,
            items: 6,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    nav: false,
                },
                600: {
                    items: 4,
                    nav: false,
                },
                1000: {
                    items: 6,
                    nav: false,
                },
            },
        });
        $(".product_slider2").owlCarousel({
            margin: 15,
            items: 6,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    nav: false,
                },
                600: {
                    items: 4,
                    nav: false,
                },
                1000: {
                    items: 4,
                    nav: false,
                },
            },
        });
        $(".product_sliders3").owlCarousel({
            margin: 15,
            items: 6,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    nav: false,
                },
                600: {
                    items: 4,
                    nav: false,
                },
                1000: {
                    items: 6,
                    nav: false,
                },
            },
        });

        $(".product_slider-category").owlCarousel({
            margin: 15,
            items: 6,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 4,
                    nav: false,
                },
                600: {
                    items: 6,
                    nav: false,
                },
                1000: {
                    items: 8,
                    nav: false,
                },
            },
        });

    });
</script>
<script>
    $("#simple_timer").syotimer({
        date: new Date(2015, 0, 1),
        layout: "hms",
        doubleNumbers: false,
        effectType: "opacity",

        periodUnit: "d",
        periodic: true,
        periodInterval: 1,
    });
</script>
@endpush