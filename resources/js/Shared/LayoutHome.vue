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
                                    <Link :href="route('home.cart')" area-label="Cart" class="btn btn--size-33-33 btn--center btn--round btn--color-radical-red btn--bg-white btn--box-shadow"><i class="icon icon-carce-cart"></i></Link>
                                </li>
                                <li class="list-item">
                                    <span class="notch-bg notch-bg--emerald"></span>
                                    <a href="#profile-menu-offcanvas" area-label="User" class="btn btn--size-33-33 btn--center btn--round offcanvas-toggle offside-menu">
                                        <component :is="asset_header_top_user" class="img-fluid" alt="user image" width="33" height="33" />
                                        </a>
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
                <a href="index.html">
                <component :is="asset_logo" class="img-fluid" alt="image" width="147" height="26" />
                </a>
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

        </div>
        <!-- End Offcanvas Mobile Menu Wrapper -->
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
                        <component :is="asset_user_profile" class="img-fluid" alt="image" width="96" height="96" />
                    </div>
                    <div class="content">
                        <h2 class="name">Kajavasta Moon</h2>
                        <span class="email">moon@example.com</span>
                        <span class="id-num">ID NO: EXMPL 4566</span>
                    </div>
                    <div class="profile-shape profile-shape-1"><component :is="profilePict1" class="img-fluid" alt="" width="61" height="50" /></div>
                    <div class="profile-shape profile-shape-2"><component :is="profilePict2" class="img-fluid" alt="" width="48" height="59" /></div>
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
                            <button aria-label="Wishlist" class="btn btn--size-58-58 btn--font-size-22 btn--center btn--round btn--color-radical-red btn--bg-white btn--box-shadow"><i class="icon icon-carce-heart"></i></button>
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
                                        <a href="profile-settings.html" class="profile-link"><span class="icon"><i class="icon icon-carce-user"></i></span>Account Setting</a>
                                    </li>
                                    <li class="list-item">
                                        <a href="checkout.html" class="profile-link"><span class="icon"><i class="icon icon-carce-briefcase"></i></span>Billing & Payment</a>
                                    </li>
                                    <li class="list-item">
                                        <a href="notification.html" class="profile-link"><span class="icon"><i class="icon icon-carce-bell"></i></span>Notification</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="profile-list-item">
                                <ul class="profile-single-list">
                                    <li class="list-item">
                                        <a href="login.html" class="profile-link"><span class="icon"><i class="icon icon-carce-login"></i></span>Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- ...:::End Profile Details Section:::... -->
        </div>
        <!-- End Offcanvas Mobile Menu Wrapper -->
    </div> <!-- ...:::: End Offcanvas Profile Menu Section:::... -->

    <div class="offcanvas-overlay"></div>

    <!-- ...:::Start Search & Filter Section:::... -->
    <slot name="search"></slot>
    <!-- ...:::End Search & Filter Section:::... -->

    <!-- ...:::Start Hero Slider Section:::... -->
    <div class="hero-section section-gap-top-25">
        <div class="container">
            <!-- Start Hero Area -->
            <div class="hero-area hero-area--style-1 hero-slider-active">
                <swiper :modules="[Pagination]" :pagination="{ clickable: true, hide: false }" :speed="1500" :slides-per-view="1" :observer="true" :observe-parents="true" :space-between="5" watch-slides-progress :loop="true">
                    <swiper-slide>
                        <div class="hero-singel-slide ">
                            <div class="hero-bg">
                                <component :is="asset_hero_bg_1" class="img-full" alt="image" width="388" height="160" />
                            </div>
                            <div class="inner-wrapper">
                                <div class="content">
                                    <p class="title-tag">Summer 1 Hehe</p>
                                    <h1 class="title">Fashion</h1>
                                    <h2 class="sub-title">SALE</h2>
                                    <h3 class="sub-title">UP to <span>70% </span> off</h3>
                                </div>
                                <div class="product-img">
                                    <component :is="asset_product_1" class="img-fluid" alt="image" width="149" height="127" />

                                    <div class="shape shape-1"><component :is="asset_shape_dotted" class="img-fluid" alt="image" width="83" height="83" /></div>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="hero-singel-slide">
                            <div class="hero-bg">
                                <component :is="asset_hero_bg_1" class="img-full" alt="image" width="388" height="160" />
                            </div>
                            <div class="inner-wrapper">
                                <div class="content">
                                    <p class="title-tag">Summer 2 Heha</p>
                                    <h1 class="title">Fashion</h1>
                                    <h2 class="sub-title">SALE</h2>
                                    <h3 class="sub-title">UP to <span>70% </span> off</h3>
                                </div>
                                <div class="product-img">
                                    <component :is="asset_product_2" class="img-fluid" alt="image" width="127" height="98" />
                                    <div class="shape shape-1"><component :is="asset_shape_dotted" class="img-fluid" alt="image" width="83" height="83" /></div>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="hero-singel-slide">
                            <div class="hero-bg">
                                <component :is="asset_hero_bg_1" class="img-full" alt="image" width="388" height="160" />
                            </div>
                            <div class="inner-wrapper">
                                <div class="content">
                                    <p class="title-tag">Summer 3 Huha</p>
                                    <h1 class="title">Fashion</h1>
                                    <h2 class="sub-title">SALE</h2>
                                    <h3 class="sub-title">UP to <span>70% </span> off</h3>
                                </div>
                                <div class="product-img">
                                    <component :is="asset_product_3" class="img-fluid" alt="image" width="126" height="98" />
                                    <div class="shape shape-1"><component :is="asset_shape_dotted" class="img-fluid" alt="image" width="83" height="83" /></div>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                </swiper>
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
                    <swiper slides-per-view="auto" :space-between="12">
                        <swiper-slide>
                            <Link href="shop.html" class="btn"><span class="icon"><component :is="asset_sneakers" alt="image" width="33" height="33" /></span> Sneakers</Link>
                        </swiper-slide>
                        <swiper-slide>
                            <Link href="shop.html" class="btn"><span class="icon"><component :is="asset_watch" alt="image" width="33" height="33" /></span>Watch</Link>
                        </swiper-slide>
                        <swiper-slide>
                            <Link href="shop.html" class="btn"><span class="icon"><component :is="asset_headphones" alt="image" width="33" height="33" /></span>Gadget</Link>
                        </swiper-slide>
                        <swiper-slide>
                            <Link href="shop.html" class="btn"><span class="icon"><component :is="asset_bagpack" alt="image" width="33" height="33" /></span>Bagpack</Link>
                        </swiper-slide>
                    </swiper>
                    <!-- Slider main container -->
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

            <div class="user-event-area" :class="{'sticky' : scrolled}">
                <div class="user-event user-event--left">
                    <a area-label="event link icon" href="index.html" class="event-btn-link"><i class="icon icon-carce-home"></i></a>
                    <a area-label="wishlist icon" href="wishlist.html" class="event-btn-link"><i class="icon icon-carce-heart"></i></a>
                </div>
                <div class="user-event user-event--center">
                    <a area-label="cart icon" href="cart.html" class="event-btn-link"><i class="icon icon-carce-cart"></i></a>
                </div>
                <div class="user-event user-event--right">
                    <a area-label="order icon" href="order.html" class="event-btn-link"><i class="icon icon-carce-compare"></i></a>
                    <a area-label="chat icon" href="chat.html" class="event-btn-link"><i class="icon icon-carce-bubbles2"></i></a>
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
@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
@import url('../../../public/assets/css/style.css');
@import url('../../../public/assets/css/vendor/icomoon.css');
.swiper-pagination {
    position: sticky !important;
}
</style>
<script setup>
import { Pagination } from 'swiper'
import { ref, onMounted, onUnmounted, defineAsyncComponent } from 'vue'

import 'swiper/css/pagination';
import 'swiper/css';

const createAsyncComponent = (path) => defineAsyncComponent(() => import(`${import.meta.env.VITE_BASE_URL}${path}`));

const profilePict1 = createAsyncComponent("assets/images/profile-shape-1.svg");
const profilePict2 = createAsyncComponent("assets/images/profile-shape-2.svg");
const asset_logo = createAsyncComponent("assets/images/logo.png");
const asset_user_profile = createAsyncComponent("assets/images/user/user-profile.png");
const asset_product_1 = createAsyncComponent("assets/images/hero/product/product-1.png");
const asset_product_2 = createAsyncComponent("assets/images/hero/product/product-2.png");
const asset_product_3 = createAsyncComponent("assets/images/hero/product/product-3.png");
const asset_shape_dotted = createAsyncComponent("assets/images/hero/shape/shape-dotted.png");
const asset_sneakers = createAsyncComponent("assets/images/categories/sneakers.png");
const asset_watch = createAsyncComponent("assets/images/categories/watch.png");
const asset_headphones = createAsyncComponent("assets/images/categories/headphones.png");
const asset_bagpack = createAsyncComponent("assets/images/categories/bagpack.png");
const asset_hero_bg_1 = createAsyncComponent("assets/images/hero/bg/hero-bg-1.jpg");
const asset_header_top_user = createAsyncComponent("assets/images/header-top-user-img.jpg");

const scrolled = ref(false)

const handleScroll = (e) => {
    scrolled.value = window.top.scrollY > 0 ? true : false
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
  window.removeEventListener(handleScroll)
})
</script>
