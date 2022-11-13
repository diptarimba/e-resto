<template>
<main class="main-wrapper">

        <!-- ...:::Start User Event Section:::... -->
        <div class="header-section">
            <div class="container">
                <!-- Start User Event Area -->
                <div class="header-area">
                    <div class="header-top-area header-top-area--style-1">
                        <ul class="event-list">
                            <li class="list-item"><a href="#mobile-menu-offcanvas" area-label="mobile menu offcanvas svg icon" class="btn btn--size-33-33 btn--center btn--round btn--color-radical-red btn--bg-white btn--box-shadow main-menu offcanvas-toggle offside-menu">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                        <g id="Group_1" data-name="Group 1" transform="translate(-28 -63)">
                                            <path id="Rectangle_3" data-name="Rectangle 3" d="M0,0H5A2,2,0,0,1,7,2V5A2,2,0,0,1,5,7H2A2,2,0,0,1,0,5V0A0,0,0,0,1,0,0Z" transform="translate(28 63)" fill="#ff375f" />
                                            <path id="Rectangle_6" data-name="Rectangle 6" d="M2,0H5A2,2,0,0,1,7,2V5A2,2,0,0,1,5,7H0A0,0,0,0,1,0,7V2A2,2,0,0,1,2,0Z" transform="translate(28 72)" fill="#ff375f" />
                                            <path id="Rectangle_4" data-name="Rectangle 4" d="M2,0H7A0,0,0,0,1,7,0V5A2,2,0,0,1,5,7H2A2,2,0,0,1,0,5V2A2,2,0,0,1,2,0Z" transform="translate(37 63)" fill="#ff375f" />
                                            <path id="Rectangle_5" data-name="Rectangle 5" d="M2,0H5A2,2,0,0,1,7,2V7A0,0,0,0,1,7,7H2A2,2,0,0,1,0,5V2A2,2,0,0,1,2,0Z" transform="translate(37 72)" fill="#ff375f" />
                                        </g>
                                    </svg>
                                </a></li>
                            <li class="list-item">
                                <h2 class="title text-center">Home</h2>
                            </li>
                            <li class="list-item">
                                <ul class="list-child">
                                    <li class="list-item">
                                        <span class="notch-bg notch-bg--sunset-orange"></span>
                                        <a href="cart.html" area-label="Cart" class="btn btn--size-33-33 btn--center btn--round btn--color-radical-red btn--bg-white btn--box-shadow"><i
                                        class="icon icon-carce-cart"></i></a>
                                    </li>
                                    <li class="list-item">
                                        <span class="notch-bg notch-bg--emerald"></span>
                                        <a href="#profile-menu-offcanvas" area-label="User" class="btn btn--size-33-33 btn--center btn--round offcanvas-toggle offside-menu">
                                            <img class="img-fluid" height="33" width="33" src="assets/images/header-top-user-img.jpg" alt="user image"></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End User Event Area -->
            </div>
        </div>
        <!-- ...:::End User Event Section:::... -->

        <!--  Start Offcanvas Mobile Menu Section -->
        <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-leftside offcanvas-mobile-menu-section">
            <!-- Start Offcanvas Header -->
            <div class="offcanvas-header flex-end">

                <div class="logo">
                    <a href="index.html"><img class="img-fluid" width="147" height="26" src="assets/images/logo.png" alt="image"></a>
                </div>

                <button class="offcanvas-close" aria-label="offcanvas svg icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="5.973" height="10.449" viewBox="0 0 5.973 10.449">
                        <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M13.051,11.417,17,7.466a.747.747,0,0,0-1.058-1.054l-4.479,4.476a.745.745,0,0,0-.022,1.03l4.5,4.507A.747.747,0,1,0,17,15.37Z" transform="translate(-11.251 -6.194)" />
                    </svg>
                </button>
            </div>
            <!-- End Offcanvas Header -->

            <!-- Start Offcanvas Mobile Menu Wrapper -->
            <div class="offcanvas-mobile-menu-wrapper">
                <!-- Start Mobile Menu  -->
                <div class="mobile-menu-bottom">
                    <!-- Start Mobile Menu Nav -->
                    <div class="offcanvas-menu">
                        <ul>
                            <li>
                                <a href="index.html"><span>Home</span></a>
                            </li>
                            <li>
                                <a href="#"><span>Shop</span></a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="single-product.html">Product</a></li>
                                    <li><a href="shop-category.html">Shop Category</a></li>
                                </ul>

                            </li>
                            <li>
                                <a href="#"><span>Pages</span></a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="chat.html">Chat</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="order.html">Order</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div> <!-- End Mobile Menu Nav -->
                </div> <!-- End Mobile Menu -->

                <!-- Start Mobile contact Info -->
                <div class="mobile-contact-info">
                    <address class="address">
                        <span>Address: 4710-4890 Breckinridge St, Fayettevill</span>
                        <span>Call Us: (+800) 345 678, (+800) 123 456</span>
                        <span>Email: yourmail@mail.com</span>
                    </address>
                </div>
                <!-- End Mobile contact Info -->

            </div> <!-- End Offcanvas Mobile Menu Wrapper -->
        </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

        <!--  Start Offcanvas Profile Menu Section -->
        <div id="profile-menu-offcanvas" class="offcanvas offcanvas-rightside">
            <!-- Start Offcanvas Header -->
            <div class="offcanvas-header flex-start offcanvas-modify">
                <button class="offcanvas-close" aria-label="offcanvas svg icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="5.973" height="10.449" viewBox="0 0 5.973 10.449">
                        <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M13.051,11.417,17,7.466a.747.747,0,0,0-1.058-1.054l-4.479,4.476a.745.745,0,0,0-.022,1.03l4.5,4.507A.747.747,0,1,0,17,15.37Z" transform="translate(-11.251 -6.194)" />
                    </svg>
                </button>
                <span>Home</span>

            </div> <!-- End Offcanvas Header -->
            <!-- Start Offcanvas Mobile Menu Wrapper -->
            <div class="offcanvas-profile-menu-wrapper">
                <!-- ...:::Start Profile Card Section:::... -->
                <div class="profile-card-section section-gap-top-25">
                    <div class="profile-card-wrapper">
                        <div class="image">
                            <img class="img-fluid" width="96" height="96" src="assets/images/user/user-profile.png" alt="image">
                        </div>
                        <div class="content">
                            <h2 class="name">Kajavasta Moon</h2>
                            <span class="email">moon@example.com</span>
                            <span class="id-num">ID NO: EXMPL 4566</span>
                        </div>
                        <div class="profile-shape profile-shape-1"><img class="img-fluid" width="61" height="50" src="assets/images/profile-shape-1.svg" alt="image"></div>
                        <div class="profile-shape profile-shape-2"><img class="img-fluid" width="48" height="59" src="assets/images/profile-shape-2.svg" alt="image"></div>
                    </div>
                </div>
                <!-- ...:::End Profile Card Section:::... -->

                <!-- ...:::Start Profile Details Section:::... -->
                <div class="profile-details-section section-gap-top-30">
                    <div class="profile-details-wrapper">
                        <div class="profile-details-top">
                            <div class="left">
                                <span class="text">Total Buy</span>
                                <span class="price">$2000.00</span>
                            </div>
                            <div class="right">
                                <button aria-label="Wishlist" class="btn btn--size-58-58 btn--font-size-22 btn--center btn--round btn--color-radical-red btn--bg-white btn--box-shadow"><i
                                class="icon icon-carce-heart"></i></button>
                            </div>
                        </div>
                        <div class="profile-details-bottom">
                            <ul class="profile-user-list">
                                <li class="profile-list-item">
                                    <ul class="profile-single-list">
                                        <li class="list-item">
                                            <span class="title">Setting</span>
                                        </li>
                                        <li class="list-item">
                                            <a href="profile-settings.html" class="profile-link"><span class="icon"><i
                                                class="icon icon-carce-user"></i></span>Account Setting</a>
                                        </li>
                                        <li class="list-item">
                                            <a href="checkout.html" class="profile-link"><span class="icon"><i
                                                class="icon icon-carce-briefcase"></i></span>Billing & Payment</a>
                                        </li>
                                        <li class="list-item">
                                            <a href="notification.html" class="profile-link"><span class="icon"><i
                                                class="icon icon-carce-bell"></i></span>Notification</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="profile-list-item">
                                    <ul class="profile-single-list">
                                        <li class="list-item">
                                            <a href="login.html" class="profile-link"><span class="icon"><i
                                                class="icon icon-carce-login"></i></span>Log Out</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ...:::End Profile Details Section:::... -->
            </div> <!-- End Offcanvas Mobile Menu Wrapper -->
        </div> <!-- ...:::: End Offcanvas Profile Menu Section:::... -->

        <div class="offcanvas-overlay"></div>

        <!-- ...:::Start Search & Filter Section:::... -->
        <div class="search-n-filter-section section-gap-top-25">
            <div class="container">
                <!-- Start Search & Filter Area -->
                <slot name="search"></slot>
                <!-- End Search & Filter Area -->

                <div class="shop-filter" id="shop-filter-menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="shop-filter-block mt-0">
                                    <h4 class="shop-filter-block__title">Price</h4>
                                    <div class="shop-filter-block__content">
                                        <div class="widget-price-range">
                                            <input type="text" id="price-range-slider">
                                        </div>
                                    </div>
                                </div>
                                <ul class="product-variable-lists">
                                    <li class="list-item">
                                        <div class="left">Size</div>
                                        <div class="right">
                                            <ul class="size-chart inner-child-item">
                                                <li>
                                                    <label for="samll">
                                                        <input type="radio" name="size" id="samll" checked="">
                                                        <span class="size-text">S</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="medium">
                                                        <input type="radio" name="size" id="medium">
                                                        <span class="size-text">M</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="large">
                                                        <input type="radio" name="size" id="large">
                                                        <span class="size-text">L</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="xlarge">
                                                        <input type="radio" name="size" id="xlarge">
                                                        <span class="size-text">XL</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="xxlarge">
                                                        <input type="radio" name="size" id="xxlarge">
                                                        <span class="size-text">XXL</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="list-item">
                                        <div class="left">Color</div>
                                        <div class="right">
                                            <ul class="color-chart inner-child-item">
                                                <li>
                                                    <label for="blue">
                                                        <input type="radio" name="color" id="blue">
                                                        <span class="color-box color-box--blue"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="orange">
                                                        <input type="radio" name="color" id="orange" checked="">
                                                        <span class="color-box color-box--orange"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="violet">
                                                        <input type="radio" name="color" id="violet">
                                                        <span class="color-box color-box--violet"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="pink">
                                                        <input type="radio" name="color" id="pink">
                                                        <span class="color-box color-box--pink"></span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                </ul>
                                <div class="shop-filter-block">
                                    <h4 class="shop-filter-block__title">Brand</h4>
                                    <div class="shop-filter-block__content">
                                        <ul class="shop-filter-block__brand">
                                            <li><button>HasThemes</button></li>
                                            <li><button class="active">HasTech</button></li>
                                            <li><button>Bootxperts</button></li>
                                            <li><button>Codecarnival</button></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="shop-filter-block">
                                    <button class="apply-btn">APPLY</button>
                                    <button class="cancel-btn">CANCEL</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ...:::End Search & Filter Section:::... -->

        <!-- ...:::Start Hero Slider Section:::... -->
        <div class="hero-section section-gap-top-25">
            <div class="container">
                <!-- Start Hero Area -->
                <div class="hero-area hero-area--style-1 hero-slider-active">
                    <!-- Slider main container -->
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="hero-singel-slide ">
                                    <div class="hero-bg">
                                        <img width="388" height="160" class="img-full" src="assets/images/hero/bg/hero-bg-1.jpg" alt="image">
                                    </div>
                                    <div class="inner-wrapper">
                                        <div class="content">
                                            <p class="title-tag">Summer</p>
                                            <h1 class="title">Fashion</h1>
                                            <h2 class="sub-title">SALE</h2>
                                            <h3 class="sub-title">UP to <span>70% </span> off</h3>
                                        </div>
                                        <div class="product-img">
                                            <img width="149" height="127" class="img-fluid" src="assets/images/hero/product/product-1.png" alt="image">
                                            <div class="shape shape-1"><img width="83" height="83" class="img-fluid" src="assets/images/hero/shape/shape-dotted.png" alt="image"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="hero-singel-slide">
                                    <div class="hero-bg">
                                        <img width="388" height="160" class="img-full" src="assets/images/hero/bg/hero-bg-1.jpg" alt="image">
                                    </div>
                                    <div class="inner-wrapper">
                                        <div class="content">
                                            <p class="title-tag">Summer</p>
                                            <h1 class="title">Fashion</h1>
                                            <h2 class="sub-title">SALE</h2>
                                            <h3 class="sub-title">UP to <span>70% </span> off</h3>
                                        </div>
                                        <div class="product-img">
                                            <img width="127" height="98" class="img-fluid" src="assets/images/hero/product/product-2.png" alt="image">
                                            <div class="shape shape-1"><img width="83" height="83" class="img-fluid" src="assets/images/hero/shape/shape-dotted.png" alt="image"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="hero-singel-slide">
                                    <div class="hero-bg">
                                        <img width="388" height="160" class="img-full" src="assets/images/hero/bg/hero-bg-1.jpg" alt="image">
                                    </div>
                                    <div class="inner-wrapper">
                                        <div class="content">
                                            <p class="title-tag">Summer</p>
                                            <h1 class="title">Fashion</h1>
                                            <h2 class="sub-title">SALE</h2>
                                            <h3 class="sub-title">UP to <span>70% </span> off</h3>
                                        </div>
                                        <div class="product-img">
                                            <img width="126" height="98" class="img-fluid" src="assets/images/hero/product/product-3.png" alt="image">
                                            <div class="shape shape-1"><img width="83" height="83" class="img-fluid" src="assets/images/hero/shape/shape-dotted.png" alt="image"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                </div>
                <!-- End Hero Area -->
            </div>
        </div>
        <!-- ...:::End Hero Slider Section:::... -->

        <!-- ...:::Start Catagories - 1 Section:::... -->
        <div class="catagories-section section-gap-top-50">
            <div class="container">
                <div class="catagories-area">
                    <div class="catagories-nav-1">
                        <!-- Slider main container -->
                        <div class="swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="swiper-slide">
                                    <a href="shop.html" class="btn"><span class="icon"><img width="33" height="33"
												src="assets/images/catagories/sneakers.png" alt="image"></span> Sneakers</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="shop.html" class="btn"><span class="icon"><img width="33" height="33"
												src="assets/images/catagories/watch.png" alt="image"></span>Watch</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="shop.html" class="btn"><span class="icon"><img width="33" height="33"
												src="assets/images/catagories/headphones.png" alt="image"></span>Gadget</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="shop.html" class="btn"><span class="icon"><img width="33" height="33"
												src="assets/images/catagories/bagpack.png" alt="image"></span>Bagpack</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <slot name="product"></slot>

            </div>
        </div>
        <!-- ...:::Start Catagories - 1 Section:::... -->

        <!-- ...:::Start User Event Section:::... -->
        <div class="user-event-section">
            <!-- Start User Event Area -->
            <div class="col pos-relative">

                <div class="user-event-area">
                    <div class="user-event user-event--left">
                        <a area-label="event link icon" href="index.html" class="event-btn-link"><i
                        class="icon icon-carce-home"></i></a>
                        <a area-label="wishlist icon" href="wishlist.html" class="event-btn-link"><i
                        class="icon icon-carce-heart"></i></a>
                    </div>
                    <div class="user-event user-event--center">
                        <a area-label="cart icon" href="cart.html" class="event-btn-link"><i
                        class="icon icon-carce-cart"></i></a>
                    </div>
                    <div class="user-event user-event--right">
                        <a area-label="order icon" href="order.html" class="event-btn-link"><i
                        class="icon icon-carce-compare"></i></a>
                        <a area-label="chat icon" href="chat.html" class="event-btn-link"><i
                        class="icon icon-carce-bubbles2"></i></a>
                    </div>
                </div>
            </div>
            <!-- End User Event Area -->
        </div>
        <!-- ...:::End User Event Section:::... -->

        <footer class="footer-section"></footer>
    </main>
</template>
<style>
@import url('../../../public/assets/css/style.min.css');
@import url('../../../public/assets/css/vendor/icomoon.css');
@import url('../../../public/assets/css/plugins/swiper-bundle.min.css');
/* @import url('../../../public/assets/css/plugins/ion.rangeSlider.min.css'); */
/* @import url('../../../public/assets/css/vendor/vendor.min.css'); */
</style>
