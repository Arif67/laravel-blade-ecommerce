<!DOCTYPE html>
<html lang="en">

<head>
<!-- Meta Pixel Code -->



    <meta name="description" content="Buy exclusive genuine accessories in Bangladesh. Shop smart watches, stylish phone covers, high-quality headphones, durable powerbanks, premium screen protectors, and camera protectors. Fast delivery all over BD.">
    <meta name="keywords" content="Accessories Store BD, Smart Watch Bangladesh, Phone Covers BD, Headphones BD, Powerbanks Bangladesh, Screen Protector BD, Camera Protector BD, Genuine Mobile Accessories Bangladesh">
   
    <meta property="og:type" content="website">
    <meta property="og:title" content="Exclusive Genuine Accessories Store in BD">
    <meta property="og:description" content="Shop genuine mobile & tech accessories in Bangladesh. Smart watches, phone covers, headphones, powerbanks, screen & camera protectors at best prices.">
    <meta property="og:url" content="{{route('home')}}">
    <meta property="og:image" content="{{asset('uploads/logo.png')}}"> <!-- Replace with your logo or banner -->
    <meta property="og:site_name" content="{{$generalsetting?->name}}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Exclusive Genuine Accessories Store in BD">
    <meta name="twitter:description" content="Discover genuine accessories in Bangladesh: smart watches, phone covers, headphones, powerbanks, screen protectors, camera protectors.">
    <meta name="twitter:image" content="{{asset('uploads/logo.png')}}">
    <!--<meta name="google-site-verification" content="w-8P-z3yDwtpLjhc5Mhp0QfDYz8xxSSTRJQmcLGPQXg" />-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />



    <title>{{$generalsetting?->name}}</title>
    
    <link rel="shortcut icon" href="{{asset($generalsetting?->favicon)}}" alt="{{$generalsetting?->name}}" />
    <meta name="author" content="{{$generalsetting?->name}}" />
    <link rel="canonical" href="{{route('home')}}" />
    @stack('seo')
    @stack('css')
    <link rel="stylesheet" href="{{asset('frontEnd/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontEnd/css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('frontEnd/css/woodmart-font.css')}}" />
    <link rel="stylesheet" href="{{asset('frontEnd/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontEnd/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontEnd/css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontEnd/css/mobile-menu.css')}}" />
    <link rel="stylesheet" href="{{asset('frontEnd/css/select2.min.css')}}" />
    <!-- toastr css -->
    <link rel="stylesheet" href="{{asset('backEnd/')}}/assets/css/toastr.min.css" />

    <link rel="stylesheet" href="{{asset('frontEnd/css/wsit-menu.css')}}" />
    <link rel="stylesheet" href="{{asset('frontEnd/css/style.css?v=1.0.22')}}" />
    <link rel="stylesheet" href="{{asset('frontEnd/css/responsive.css?v=1.0.22')}}" />
    <link rel="stylesheet" href="{{asset('frontEnd/css/main.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontEnd/campaign/css') }}/all.css" />
    <!-- core css -->
    <link rel="stylesheet" href="{{ asset('frontEnd/campaign/css') }}/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('backEnd/')}}/assets/css/toastr.min.css" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('frontEnd/campaign/css') }}/owl.theme.default.css" />
    <link rel="stylesheet" href="{{ asset('frontEnd/campaign/css') }}/owl.carousel.min.css" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('frontEnd/campaign/css') }}/style.css" />
    <link rel="stylesheet" href="{{ asset('frontEnd/campaign/css') }}/responsive.css" />

    <style>
        .side_cat_img {
            width: 24px;
            height: 24px;
            object-fit: cover;
            border-radius: 4px;
        }

        .first-nav .list-group-item {
            border: none;
            border-bottom: 1px solid #eee;
            font-size: 15px;
            padding: 10px 15px;
        }

        .menu-category-toggle,
        .menu-subcategory-toggle {
            cursor: pointer;
        }

        .second-nav,
        .third-nav {
            padding-left: 10px;
        }

        .third-nav .list-group-item {
            font-size: 14px;
        }

        .menu-childcategory-name,
        .menu-subcategory-name,
        .menu-category-name {
            text-decoration: none;
            color: #333;
        }

        .menu-childcategory-name:hover,
        .menu-subcategory-name:hover,
        .menu-category-name:hover {
            color: #ffffffff;
        }
    </style>


    

    <style>
        .desc-nav-ul li a.active {
            background-color: #ffffffff;
            color: #fff;
        }
    </style>
    <!-- Facebook Pixel + Conversions API (Browser + Server Deduplication with FBP Retry) -->
    <script>
    !function(f,b,e,v,n,t,s){
      if(f.fbq)return;n=f.fbq=function(){
        n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)
      };
      if(!f._fbq)f._fbq=n;
      n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];
      t=b.createElement(e);t.async=!0;t.src=v;
      s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)
    }(window, document,'script','https://connect.facebook.net/en_US/fbevents.js');
    
    // 🔹 Initialize Pixel
    fbq('init', '1280929069904279');
    
    // 🔹 Generate unique event ID (same for Pixel + CAPI)
    const eventId = 'pageview_' + Date.now();
    
    // 🔹 Generate event_time (seconds since epoch)
    const eventTime = Math.floor(Date.now() / 1000);
    
    // 🔹 Fire browser Pixel event with eventID
    fbq('track', 'PageView', {}, { eventID: eventId });
    console.log('✅ Pixel PageView fired with eventID:', eventId, 'at time:', eventTime);
    
    // 🔹 Function to get _fbp cookie
    function getFbpCookie() {
        const match = document.cookie.match(/_fbp=([^;]+)/);
        return match ? match[1] : null;
    }
    
    // 🔹 Send CAPI event to Laravel
    function sendCAPI(fbp) {
        console.log('📎 fbp cookie for CAPI:', fbp);
        fetch('{{ route("facebook.pageview_capi") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                client_ip_address: "{{ request()->ip() }}",
                client_user_agent: navigator.userAgent,
                event_id: eventId,                    // deduplication key
                event_time: eventTime,                // same as Pixel
                event_source_url: window.location.href, // same as Pixel
                fbp: fbp
            })
        })
        .then(res => res.json())
        .then(data => {
            console.log('📤 CAPI PageView response:', data);
        })
        .catch(err => {
            console.error('❌ CAPI PageView error:', err);
        });
    }
    
    // 🔹 Retry mechanism for _fbp
    let retryCount = 0;
    const maxRetries = 10; // retry up to 1 second (10 * 100ms)
    const retryInterval = 100; // 100ms per retry
    
    function trySendCAPI() {
        const fbp = getFbpCookie();
        if (fbp || retryCount >= maxRetries) {
            sendCAPI(fbp || null);
        } else {
            retryCount++;
            setTimeout(trySendCAPI, retryInterval);
        }
    }
    
    // 🔹 Start retry
    trySendCAPI();
    </script>
    
    <noscript>
      <img height="1" width="1" style="display:none"
           src="https://www.facebook.com/tr?id=1280929069904279&ev=PageView&noscript=1"/>
    </noscript>





</head>

<body class="gotop" style="background: #FFFFFF;">
<section class="description-section fixed-top bg-white shadow-sm " style="z-index: 1030; padding: 15px 0; top: 0; left: 0; right: 0; margin-top:-50px; " >
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="description-inner selectable-text">
                    <div class="description-title text-center">
                        <h2 class="fw-bold fs-5 mb-0">
                            আপনি যে কতটি প্রোডাক্ট অর্ডার করতে চান তা নির্বাচন করুন। 
                            এরপর নীচের "ক্যাশ অন ডেলিভারি" বাটনে ক্লিক করুন এবং  অর্ডার 
                            ফর্মটি পূরণ করুন।
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Add spacing below so content does not hide behind the fixed top --}}
<div style="height: 80px;"></div>



    @php
    $subtotal = Cart::instance('shopping')->subtotal();
    @endphp
    
    <div id="content">
        @yield('content')
    </div>
    <!-- content end -->
    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="footer_inner">
                            <div class="footer-about footer-logo">
                                <a href="{{route('home')}}" class="text-center">
                                    <img src="{{asset($generalsetting?->white_logo)}}" alt="" />
                                </a>
                                <p class="footer_des">{!!$generalsetting?->description!!}</p>
                            </div>
                            <div class="footer-about">

                                <li class="con_title"><a>Contact Us</a></li>
                                <p><i class="fa-solid fa-map"></i>{{$contact?->address}}</p>
                                <p><i class="fa-solid fa-headphones"></i><a href="tel:{{$contact?->hotline}}"
                                        class="footer-hotlint">{{$contact?->hotline}}</a></p>
                                <p><i class="fa-solid fa-envelope"></i><a href="mailto:{{$contact?->hotmail}}"
                                        class="footer-hotlint">{{$contact?->hotmail}}</a></p>
                            </div>
                            <div class="footer-menu useful-link">
                                <ul>
                                    <li class="title"><a>Useful Link</a></li>
                                    <li>
                                        <a href="{{route('contact')}}"> <a href="{{route('contact')}}">Contact Us</a></a>
                                    </li>
                                    @foreach($cmnmenu as $page)
                                    <li><a href="{{route('page',['slug'=>$page->slug])}}">{{$page->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="footer-menu">
                                <ul>
                                    <li class="title stay_conn"><a>Stay Connected</a></li>
                                </ul>
                                <ul class="social_link">
                                    @foreach($socialicons as $value)
                                    <li class="social_list">
                                        <a style="background: {{$value->color}}" class="mobile-social-link" href="{{$value->link}}"><i class="{{$value->icon}}"></i></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="footer-menu">
                                <ul>
                                    <li class="title"><a>Our Facebook Page</a></li>
                                    <div>
                                        <div class="fb-page" data-href="{{$contact?->facebook}}" data-tabs="timeline"
                                            data-height="150" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                            <blockquote cite="{{$contact?->facebook}}"
                                                class="fb-xfbml-parse-ignore"><a
                                                    href="{{$contact?->facebook}}">Facebook</a></blockquote>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- col end -->
                </div>
            </div>
        </div>
        <div class="footer-bottom" style="background: linear-gradient(90deg, #147ab6, #0f5e8d); padding: 20px 0;">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Left Side: Text -->
                    <div class="col-md-9 text-center text-md-start mb-3 mb-md-0">
                        <div class="copyright px-3 py-2 rounded" style="background: linear-gradient(135deg, #1f1f2e, #2c2c3e); box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                            <p class="text-white mb-0" style="font-size: 15px; font-weight: 400;">
                                <span style="color: #FFD700;">Moderncollectionhub</span>All rights reserved.
                                <br class="d-md-none">
                                Developed with <span style="color: #ff4c60;"></span> by
                                <a href="https://codexlabbd.com" target="_blank"
                                    style="color: #ffffffff; font-weight: bold; text-decoration: none; transition: 0.3s;"
                                    onmouseover="this.style.textDecoration='underline'"
                                    onmouseout="this.style.textDecoration='none'">
                                    CodexLab BD
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- Right Side: Payment Image -->
                    <div class="col-md-3 text-center text-md-end">
                        <div class="copyright-img">
                            <img src="{{ asset('frontEnd/images/payment2.png') }}"
                                alt="Payment Methods"
                                style="max-height: 45px; filter: brightness(1.1) contrast(1.1); transition: transform 0.3s;"
                                onmouseover="this.style.transform='scale(1.05)'"
                                onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- ===== Floating Contact Buttons (Left Side) ===== -->
   <style>
    .fixed-contact-toggle {
        margin-bottom : 50px;
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 12px;
    }

    .fixed-contact-buttons {
        display: none;
        flex-direction: column;
        gap: 12px;
    }

    .fixed-contact-buttons a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        background-color: #25D366;
        color: white;
        font-size: 22px;
        border-radius: 50%;
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
    }

    .fixed-contact-buttons a.messenger {
        background-color: #0084FF;
    }

    .fixed-contact-buttons a.phone {
        background-color: #28a745;
    }

    .fixed-contact-buttons a:hover,
    .message-toggle:hover {
        transform: scale(1.1);
        opacity: 0.9;
    }

    .message-toggle {
        width: 52px;
        height: 52px;
        background-color: #007bff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        color: #fff;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }
</style>

<div class="fixed-contact-toggle">
    <!-- Toggle Button -->
  

    <!-- Hidden Contact Buttons -->
    <div class="fixed-contact-buttons" id="contactButtons">
        <!-- WhatsApp -->
        <a href="https://api.whatsapp.com/send?phone={{ $contact?->hotline }}" target="_blank" title="Chat on WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
        </a>

        <!-- Messenger -->
        <a href="https://m.me/{{ $contact?->facebook_page }}" target="_blank" class="messenger" title="Chat on Messenger">
            <i class="fa-brands fa-facebook-messenger"></i>
        </a>

        <!-- Phone -->
        <a href="tel:{{ $contact?->hotline }}" class="phone" title="Call Now">
            <i class="fa-solid fa-phone"></i>
        </a>
        
    </div>
      <div class="message-toggle" onclick="toggleContactButtons()" title="Contact Options">
        <i class="fa-solid fa-comment-dots"></i>
    </div>
</div>

<script>
    function toggleContactButtons() {
        const contactBox = document.getElementById('contactButtons');
        contactBox.style.display = contactBox.style.display === 'flex' ? 'none' : 'flex';
    }
</script>




    <div class="footer_nav" style="padding: 10px; background: #fff;">
        <div class="container">
          <ul class="p-0 m-0 w-100" style="list-style: none;">
            <li class="w-100">
               <style>
                    /* Optional: adjust font further for mobile if needed */
                    @media (max-width: 576px) {
                        .order-btn {
                            font-size: 1.7rem !important;
                        }
                    }
                </style>
               <a href="#order_form" class="btn btn-success w-100 d-flex justify-content-between align-items-center p-3 fw-bold order-btn" style="border-radius: 10px; font-size: 1.5rem;">
                    <span>
                        নির্বাচন করা হয়েছে: <b class="mobilecart-qty">{{ Cart::instance('shopping')->count() }}</b> টি
                    </span>
                    <span>
                          ক্যাশ অন ডেলিভারি-তে অর্ডার করুন
                    </span>
                </a>



            </li>
          </ul>
        </div>
    </div>



    <div class="scrolltop" style="">
        <div class="scroll">
            <i class="fa fa-angle-up"></i>
        </div>
    </div>

    <!-- /. fixed sidebar -->

    <div id="custom-modal"></div>
    <div id="page-overlay"></div>
    <div id="loading">
        <div class="custom-loader"></div>
    </div>

    <script src="{{asset('frontEnd/js/jquery-3.6.3.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/mobile-menu.js')}}"></script>
    <script src="{{asset('frontEnd/js/wsit-menu.js')}}"></script>
    <script src="{{asset('frontEnd/js/mobile-menu-init.js')}}"></script>
    <script src="{{asset('frontEnd/js/wow.min.js')}}"></script>
    <script>
        new WOW().init();
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- feather icon -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script>
        feather.replace();
    </script>
    <script src="{{asset('backEnd/')}}/assets/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    @stack('script')
    <script>
        $(".quick_view").on("click", function() {
            var id = $(this).data("id");
            $("#loading").show();
            if (id) {
                $.ajax({
                    type: "GET",
                    data: {
                        id: id
                    },
                    url: "{{route('quickview')}}",
                    success: function(data) {
                        if (data) {
                            $("#custom-modal").html(data);
                            $("#custom-modal").show();
                            $("#loading").hide();
                            $("#page-overlay").show();
                        }
                    },
                });
            }
        });
    </script>
    <!-- quick view end -->
    <!-- cart js start -->
    <script>
        $(".addcartbutton").on("click", function() {
            var id = $(this).data("id");
            var qty = 1;
            if (id) {
                $.ajax({
                    cache: "false",
                    type: "GET",
                    url: "{{url('add-to-cart')}}/" + id + "/" + qty,
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            toastr.success('Success', 'Product add to cart successfully');
                            return cart_count() + mobile_cart();
                        }
                    },
                });
            }
        });
        $(".cart_store").on("click", function() {
            
            var id = $(this).data("id");
            var qty = $(this).parent().find("input").val();
            if (id) {
              $.ajax({
                    type: "POST",
                    url: "{{ route('cart.store') }}",
                    data: {
                        _token: "{{ csrf_token() }}", // ✅ CSRF token
                        id: id,
                        qty: qty ? qty : 1
                    },
                  success: function (data) {
                            if (data) {
                                toastr.success('Success', 'Product added to cart successfully');
                                cart_count();
                                mobile_cart();
                                   window.location.href = "#order";
                            }
                        }

                });

            }
        });

        $(".cart_remove").on("click", function() {
            var id = $(this).data("id");
            if (id) {
                $.ajax({
                    type: "GET",
                    data: {
                        id: id
                    },
                    url: "{{route('cart.remove')}}",
                    success: function(data) {
                        if (data) {
                            $(".cartlist").html(data);
                            return cart_count() + mobile_cart() + cart_summary();
                        }
                    },
                });
            }
        });

        $(".cart_increment").on("click", function() {
            var id = $(this).data("id");
            if (id) {
                $.ajax({
                    type: "GET",
                    data: {
                        id: id
                    },
                    url: "{{route('cart.increment')}}",
                    success: function(data) {
                        if (data) {
                            $(".cartlist").html(data);
                            return cart_count() + mobile_cart();
                        }
                    },
                });
            }
        });

        $(".cart_decrement").on("click", function() {
            var id = $(this).data("id");
            if (id) {
                $.ajax({
                    type: "GET",
                    data: {
                        id: id
                    },
                    url: "{{route('cart.decrement')}}",
                    success: function(data) {
                        if (data) {
                            $(".cartlist").html(data);
                            return cart_count() + mobile_cart();
                        }
                    },
                });
            }
        });

        function cart_count() {
            $.ajax({
                type: "GET",
                url: "{{route('cart.count')}}",
                success: function(data) {
                    if (data) {
                        $("#cart-qty").html(data);
                    } else {
                        $("#cart-qty").empty();
                    }
                },
            });
        }

        function mobile_cart() {
            $.ajax({
                type: "GET",
                url: "{{route('mobile.cart.count')}}",
                success: function(data) {
                    if (data) {
                        $(".mobilecart-qty").html(data);
                    } else {
                        $(".mobilecart-qty").empty();
                    }
                },
            });
        }

        function cart_summary() {
            $.ajax({
                type: "GET",
                url: "{{route('shipping.charge')}}",
                dataType: "html",
                success: function(response) {
                    $(".cart-summary").html(response);
                },
            });
        }
    </script>
    <!-- cart js end -->
    <script>
        $(document).ready(function() {
            $(document).on("submit", function(event) {
                if ($(event.target).is("#searchForm, #MainSearch")) {
                    event.preventDefault();

                    var keywordInput = $(event.target).find("input[name='keyword']");
                    var keyword = keywordInput.val().trim();

                    if (keyword === "") {
                        toastr.error('Please enter a search keyword.');
                        return false;
                    } else {
                        event.target.submit();
                    }
                }
            });
        });
        $(".search_click").on("keyup change", function() {
            var keyword = $(".search_keyword").val();
            $.ajax({
                type: "GET",
                data: {
                    keyword: keyword
                },
                url: "{{route('livesearch')}}",
                success: function(products) {
                    if (products) {
                        $(".search_result").html(products);
                    } else {
                        $(".search_result").empty();
                    }
                },
            });
        });
        $(".msearch_click").on("keyup change", function() {
            var keyword = $(".msearch_keyword").val();
            $.ajax({
                type: "GET",
                data: {
                    keyword: keyword
                },
                url: "{{route('livesearch')}}",
                success: function(products) {
                    if (products) {
                        $("#loading").hide();
                        $(".search_result").html(products);
                    } else {
                        $(".search_result").empty();
                    }
                },
            });
        });
    </script>
    <!-- search js start -->
    <script></script>
    <script></script>
    <script>
        $(".district").on("change", function() {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                data: {
                    id: id
                },
                url: "{{route('districts')}}",
                success: function(res) {
                    if (res) {
                        $(".area").empty();
                        $(".area").append('<option value="">Select..</option>');
                        $.each(res, function(key, value) {
                            $(".area").append('<option value="' + key + '" >' + value + "</option>");
                        });
                    } else {
                        $(".area").empty();
                    }
                },
            });
        });
    </script>
    <script>
        $(".toggle").on("click", function() {
            $("#page-overlay").show();
            $(".mobile-menu").addClass("active");
        });

        $("#page-overlay").on("click", function() {
            $("#page-overlay").hide();
            $(".mobile-menu").removeClass("active");
            $(".feature-products").removeClass("active");
        });

        $(".mobile-menu-close").on("click", function() {
            $("#page-overlay").hide();
            $(".mobile-menu").removeClass("active");
        });

        $(".mobile-filter-toggle").on("click", function() {
            $("#page-overlay").show();
            $(".feature-products").addClass("active");
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".parent-category").each(function() {
                const menuCatToggle = $(this).find(".menu-category-toggle");
                const secondNav = $(this).find(".second-nav");

                menuCatToggle.on("click", function() {
                    menuCatToggle.toggleClass("active");
                    secondNav.slideToggle("fast");
                    $(this).closest(".parent-category").toggleClass("active");
                });
            });
            $(".parent-subcategory").each(function() {
                const menuSubcatToggle = $(this).find(".menu-subcategory-toggle");
                const thirdNav = $(this).find(".third-nav");

                menuSubcatToggle.on("click", function() {
                    menuSubcatToggle.toggleClass("active");
                    thirdNav.slideToggle("fast");
                    $(this).closest(".parent-subcategory").toggleClass("active");
                });
            });
        });
    </script>

    <script>
        var menu = new MmenuLight(document.querySelector("#menu"), "all");

        var navigator = menu.navigation({
            selectedClass: "Selected",
            slidingSubmenus: true,
            // theme: 'dark',
            title: "",
        });

        var drawer = menu.offcanvas({
            // position: 'left'
        });

        //  Open the menu.
        document.querySelector('a[href="#menu"]').addEventListener("click", (evnt) => {
            evnt.preventDefault();
            drawer.open();
        });
    </script>
    <script>
        $(".filter_btn").click(function() {
            $(".filter_sidebar").addClass('active');
            $("body").css("overflow-y", "hidden");
        })
        $(".filter_close").click(function() {
            $(".filter_sidebar").removeClass('active');
            $("body").css("overflow-y", "auto");
        })
    </script>



</body>
<script>
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $(".scrolltop:hidden").stop(true, true).fadeIn();
        } else {
            $(".scrolltop").stop(true, true).fadeOut();
        }
    });
    $(function() {
        $(".scroll").click(function() {
            $("html,body").animate({
                scrollTop: $(".gotop").offset().top
            }, "1000");
            return false;
        });
    });
</script>

</html>