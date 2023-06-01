<template>
    <main class="main-wrapper">
        <!-- ...:::Start User Event Section:::... -->
        <div class="header-section">
            <div class="container">
                <!-- Start User Event Area -->
                <div class="header-area">
                    <div class="header-top-area header-top-area--style-1">
                        <ul class="event-list">
                            <li class="list-item">
                                <button
                                    @click="clickSideBar"
                                    area-label="mobile menu offcanvas svg icon"
                                    class="btn btn--size-33-33 btn--center btn--round btn--color-radical-red btn--bg-white btn--box-shadow main-menu offcanvas-toggle offside-menu"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        viewBox="0 0 16 16"
                                    >
                                        <g
                                            id="Group_1"
                                            data-name="Group 1"
                                            transform="translate(-28 -63)"
                                        >
                                            <path
                                                id="Rectangle_3"
                                                data-name="Rectangle 3"
                                                d="M0,0H5A2,2,0,0,1,7,2V5A2,2,0,0,1,5,7H2A2,2,0,0,1,0,5V0A0,0,0,0,1,0,0Z"
                                                transform="translate(28 63)"
                                                fill="#ff375f"
                                            />
                                            <path
                                                id="Rectangle_6"
                                                data-name="Rectangle 6"
                                                d="M2,0H5A2,2,0,0,1,7,2V5A2,2,0,0,1,5,7H0A0,0,0,0,1,0,7V2A2,2,0,0,1,2,0Z"
                                                transform="translate(28 72)"
                                                fill="#ff375f"
                                            />
                                            <path
                                                id="Rectangle_4"
                                                data-name="Rectangle 4"
                                                d="M2,0H7A0,0,0,0,1,7,0V5A2,2,0,0,1,5,7H2A2,2,0,0,1,0,5V2A2,2,0,0,1,2,0Z"
                                                transform="translate(37 63)"
                                                fill="#ff375f"
                                            />
                                            <path
                                                id="Rectangle_5"
                                                data-name="Rectangle 5"
                                                d="M2,0H5A2,2,0,0,1,7,2V7A0,0,0,0,1,7,7H2A2,2,0,0,1,0,5V2A2,2,0,0,1,2,0Z"
                                                transform="translate(37 72)"
                                                fill="#ff375f"
                                            />
                                        </g>
                                    </svg>
                                </button>
                            </li>
                            <li class="list-item">
                                <h2 class="title text-center">Home</h2>
                            </li>
                            <li class="list-item">
                                <ul class="list-child">
                                    <li class="list-item">
                                        <span
                                            class="notch-bg notch-bg--sunset-orange"
                                        ></span>
                                        <Link
                                            :href="
                                                route(
                                                    'home.cart',
                                                    undefined,
                                                    false
                                                )
                                            "
                                            area-label="Cart"
                                            class="btn btn--size-33-33 btn--center btn--round btn--color-radical-red btn--bg-white btn--box-shadow"
                                            ><i class="icon icon-carce-cart"></i
                                        ></Link>
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
        <div
            id="mobile-menu-offcanvas"
            class="offcanvas offcanvas-leftside offcanvas-mobile-menu-section"
            :class="{ 'offcanvas-open': sidebarOpen }"
        >
            <!-- Start Offcanvas Header -->
            <div class="offcanvas-header flex-end">
                <div class="logo">
                    <a href="index.html"
                        ><img
                            class="img-fluid"
                            width="147"
                            height="26"
                            src="/assets/images/logo.png"
                            alt="image"
                    /></a>
                </div>

                <button
                    class="offcanvas-close"
                    aria-label="offcanvas svg icon"
                    @click="clickSideBar"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="5.973"
                        height="10.449"
                        viewBox="0 0 5.973 10.449"
                    >
                        <path
                            id="Icon_ionic-ios-arrow-back"
                            data-name="Icon ionic-ios-arrow-back"
                            d="M13.051,11.417,17,7.466a.747.747,0,0,0-1.058-1.054l-4.479,4.476a.745.745,0,0,0-.022,1.03l4.5,4.507A.747.747,0,1,0,17,15.37Z"
                            transform="translate(-11.251 -6.194)"
                        />
                    </svg>
                </button>
            </div>
            <!-- End Offcanvas Header -->

            <!-- Start Offcanvas Mobile Menu Wrapper -->
            <div class="offcanvas-mobile-menu-wrapper">
                <!-- Start Mobile contact Info -->
                <div class="mobile-contact-info">
                    <address class="address">
                        <span
                            >Address: 4710-4890 Breckinridge St,
                            Fayettevill</span
                        >
                        <span>Call Us: (+800) 345 678, (+800) 123 456</span>
                        <span>Email: yourmail@mail.com</span>
                    </address>
                </div>
                <!-- End Mobile contact Info -->
            </div>
            <!-- End Offcanvas Mobile Menu Wrapper -->
        </div>
        <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

        <div class="offcanvas-overlay"></div>

        <slot></slot>

        <!-- ...:::Start User Event Section:::... -->
        <div class="user-event-section">
            <!-- Start User Event Area -->
            <div class="col pos-relative">
                <div class="user-event-area" :class="{ sticky: scrolled }">
                    <div class="user-event user-event--left">
                        <Link
                            area-label="event link icon"
                            href="/"
                            class="event-btn-link"
                            ><i class="icon icon-carce-home"></i
                        ></Link>
                        <Link
                            area-label="wishlist icon"
                            :href="route('home.wishlist', undefined, false)"
                            class="event-btn-link"
                            ><i class="icon icon-carce-heart"></i
                        ></Link>
                    </div>
                    <div class="user-event user-event--center">
                        <Link
                            area-label="cart icon"
                            :href="route('home.cart', undefined, false)"
                            class="event-btn-link"
                            ><i class="icon icon-carce-cart"></i
                        ></Link>
                    </div>
                    <div class="user-event user-event--right">
                        <Link
                            area-label="order icon"
                            v-if="currentToken"
                            :href="route('home.order', currentToken, false)"
                            class="event-btn-link"
                            ><i class="icon icon-carce-compare"></i
                        ></Link>
                        <a
                            area-label="chat icon"
                            v-if="currentToken"
                            :href="route('home.profile', currentToken, false)"
                            class="event-btn-link"
                            ><i class="icon icon-carce-user"></i
                        ></a>
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
@import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");
@import url("../../../../public/assets/css/style.css");
@import url("../../../../public/assets/css/vendor/icomoon.css");
@import url("sweetalert2/dist/sweetalert2.min.css");

.offcanvas-mobile-menu-wrapper {
    margin-top: 3rem;
}
</style>

<script setup>
import { ref, onMounted, onUnmounted, inject } from "vue";
import { v4 as uuidv4 } from "uuid";

const scrolled = ref(false);
const profileOpen = ref(false);
const sidebarOpen = ref(false);

// const handleScroll = (e) => {
//     scrolled.value = window.top.scrollY > 0 ? true : false
// }

const clickProfile = () => {
    profileOpen.value = !profileOpen.value;
};

const clickSideBar = () => {
    sidebarOpen.value = !sidebarOpen.value;
};

const currentToken = ref(null);

const checkToken = () => {
    let tokenLocal = localStorage.getItem("token");
    currentToken.value =
        tokenLocal != "undefined" && tokenLocal != null ? tokenLocal : uuidv4();
    localStorage.setItem("token", currentToken.value);
};

onMounted(() => {
    checkToken();
    // window.addEventListener('scroll', handleScroll)
});

// onUnmounted(() => {
//     window.removeEventListener(handleScroll, )
// })
</script>
