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
                                <!-- button offcanvas -->
                                <button
                                    type="button"
                                    data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasExample"
                                    aria-controls="offcanvasExample"
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
                                <!-- end button offcanvas -->
                                <!-- offcanvas -->
                                <div
                                    class="offcanvas offcanvas-start"
                                    tabindex="-1"
                                    id="offcanvasExample"
                                    aria-labelledby="offcanvasExampleLabel"
                                >
                                    <div class="offcanvas-header">
                                        <div class="logo">
                                            <a href="/"
                                                ><img
                                                    width="120"
                                                    src="/assets/images/logo.png"
                                                    alt="image"
                                            /></a>
                                        </div>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="offcanvas"
                                            aria-label="Close"
                                        ></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <!-- Start Mobile Menu  -->
                                        <div class="mobile-menu-bottom">
                                            <!-- Start Mobile Menu Nav -->
                                            <div class="offcanvas-menu">
                                                <ul>
                                                    <li>
                                                        <a href="/">Home</a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            class="d-flex justify-content-between"
                                                            data-bs-toggle="collapse"
                                                            href="#shopCollapse"
                                                            role="button"
                                                            aria-expanded="false"
                                                            aria-controls="shopCollapse"
                                                        >
                                                            <span>Shop</span>
                                                            <img
                                                                :src="dropdown"
                                                                alt=""
                                                            />
                                                        </a>
                                                        <div
                                                            class="collapse"
                                                            id="shopCollapse"
                                                        >
                                                            <ul
                                                                class="px-2 mt-2"
                                                            >
                                                                <li>
                                                                    <a href="/"
                                                                        >Shop</a
                                                                    >
                                                                </li>
                                                                <li>
                                                                    <a
                                                                        href="single-product.html"
                                                                        >Product</a
                                                                    >
                                                                </li>
                                                                <li>
                                                                    <a
                                                                        href="shop-category.html"
                                                                        >Shop
                                                                        Category</a
                                                                    >
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- End Mobile Menu Nav -->
                                        </div>
                                        <!-- End Mobile Menu -->

                                        <!-- Start Mobile contact Info -->
                                        <div class="mobile-contact-info mt-5">
                                            <address class="address">
                                                <div
                                                    class="d-flex gap-2 align-items-center mb-2"
                                                >
                                                    <img
                                                        :src="address"
                                                        alt=""
                                                        width="16"
                                                    />
                                                    <span class="text-secondary"
                                                        >4710-4890 Breckinridge
                                                        St, Fayettevill</span
                                                    >
                                                </div>
                                                <div
                                                    class="d-flex gap-2 align-items-center mb-2"
                                                >
                                                    <img
                                                        :src="phone"
                                                        alt=""
                                                        width="16"
                                                    />
                                                    <span class="text-secondary"
                                                        >(+800) 345 678, (+800)
                                                        123 456</span
                                                    >
                                                </div>
                                                <div
                                                    class="d-flex gap-2 align-items-center mb-2"
                                                >
                                                    <img
                                                        :src="email"
                                                        alt=""
                                                        width="16"
                                                    />
                                                    <span class="text-secondary"
                                                        >yourmail@mail.com</span
                                                    >
                                                </div>
                                            </address>
                                        </div>
                                        <!-- End Mobile contact Info -->
                                    </div>
                                </div>
                            </li>
                            <li class="list-item">
                                <ul
                                    class="list-child d-flex align-items-center"
                                >
                                    <li class="list-item">
                                        <a href="/notification">
                                            <img :src="notification" alt="" />
                                        </a>
                                    </li>
                                    <li class="list-item">
                                        <span
                                            class="notch-bg notch-bg--emerald"
                                        ></span>
                                        <button
                                            type="button"
                                            data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasProfile"
                                            aria-controls="offcanvasProfile"
                                            area-label="User"
                                            class="btn btn--size-33-33 btn--center btn--round offcanvas-toggle offside-menu"
                                        >
                                            <img
                                                class="img-fluid"
                                                height="33"
                                                width="33"
                                                src="/assets/images/header-top-user-img.jpg"
                                                alt="user image"
                                            />
                                        </button>
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

        <!--  Start Offcanvas Profile Menu Section -->
        <div
            class="offcanvas offcanvas-start"
            tabindex="-1"
            id="offcanvasProfile"
            aria-labelledby="offcanvasExampleLabel"
        >
            <div class="offcanvas-header">
                <h3
                    class="offcanvas-title mb-0 fw-bold"
                    id="offcanvasExampleLabel"
                >
                    Menu
                </h3>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"
                ></button>
            </div>
            <div class="offcanvas-body pb-5">
                <div class="d-flex flex-column align-items-center">
                    <div class="image">
                        <img
                            class="profile_image"
                            src="/assets/images/user/user-profile.png"
                            alt="image"
                        />
                    </div>
                    <div class="content text-center">
                        <h4 class="name mt-2">Kajavasta Moon</h4>
                        <p class="text-secondary">moon@example.com</p>
                    </div>
                </div>
                <div class="mt-4">
                    <h5>My Activity</h5>
                    <ul class="mt-2">
                        <li class="my-3">
                            <a href="/order" class="d-flex align-items-center">
                                <img
                                    :src="transaction"
                                    class="me-3"
                                    width="20"
                                    alt=""
                                />
                                <span> Order List </span>
                            </a>
                        </li>
                        <li class="mb-3">
                            <a
                                href="/wishlist"
                                class="d-flex align-items-center"
                            >
                                <img
                                    :src="wishlist"
                                    class="me-3"
                                    width="20"
                                    alt=""
                                />
                                <span> Wishlist </span>
                            </a>
                        </li>
                        <li class="mb-3">
                            <a href="" class="d-flex align-items-center">
                                <img
                                    :src="review"
                                    class="me-3"
                                    width="20"
                                    alt=""
                                />
                                <span> Review </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mt-4">
                    <h5>All Category</h5>
                    <ul class="mt-2">
                        <li class="my-3">
                            <a href="" class="d-flex align-items-center">
                                <img
                                    :src="account"
                                    class="me-3"
                                    width="20"
                                    alt=""
                                />
                                <span> Account Setting </span>
                            </a>
                        </li>
                        <li class="mb-3">
                            <a href="/cart" class="d-flex align-items-center">
                                <img
                                    :src="bills"
                                    class="me-3"
                                    width="20"
                                    alt=""
                                />
                                <span> Billing & Payment </span>
                            </a>
                        </li>
                        <li class="mb-3">
                            <a href="" class="d-flex align-items-center">
                                <img
                                    :src="notification"
                                    class="me-3"
                                    width="20"
                                    alt=""
                                />
                                <span> Notification </span>
                            </a>
                        </li>
                        <li class="mb-3">
                            <button
                                data-bs-toggle="modal"
                                data-bs-target="#modalLogout"
                                class="d-flex align-items-center border-0 bg-transparent"
                            >
                                <img
                                    :src="logout"
                                    class="me-3"
                                    width="20"
                                    alt=""
                                />
                                <span class="text-danger"> Logout </span>
                            </button>
                            <!-- Modal -->
                            <div
                                class="modal fade"
                                id="modalLogout"
                                tabindex="-1"
                                aria-labelledby="modalLogoutLabel"
                                aria-hidden="true"
                            >
                                <div
                                    class="modal-dialog modal-dialog-centered modal-sm"
                                >
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6
                                                class="modal-title fs-5"
                                                id="modalLogoutLabel"
                                            >
                                                Logout?
                                            </h6>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                Are you sure you want to log
                                                out?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button
                                                type="button"
                                                class="btn_cancel"
                                                data-bs-dismiss="modal"
                                            >
                                                Cancel
                                            </button>
                                            <button
                                                type="button"
                                                class="btn_logout border-0"
                                            >
                                                Yes, Logout
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <slot></slot>

        <!-- ...:::Start User Event Section:::... -->
        <div class="user-event-section">
            <!-- Start User Event Area -->
            <div class="col pos-relative">
                <div class="user-event-area" :class="{ sticky: scrolled }">
                    <div class="user-event user-event--left">
                        <Link href="/" class="event-btn-link">
                            <img :src="home" width="20" alt="" />
                            <span class="d-block">Home</span>
                        </Link>
                        <Link href="/wishlist" class="event-btn-link">
                            <img :src="wishlist" width="20" alt="" />
                            <span class="d-block">Wishlist</span>
                        </Link>
                    </div>
                    <div class="user-event user-event--center">
                        <Link href="/cart" class="event-btn-link"
                            ><i class="icon icon-carce-cart"></i
                        ></Link>
                    </div>
                    <div class="user-event user-event--right">
                        <Link
                            v-if="currentToken"
                            :href="route('home.order', currentToken, false)"
                            class="event-btn-link"
                        >
                            <img :src="transaction" width="20" alt="" />
                            <span class="d-block">Orders</span>
                        </Link>
                        <a href="/chat" class="event-btn-link">
                            <img :src="chats" width="24" alt="" />
                            <span class="d-block">Chat</span>
                        </a>
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

.event-btn-link {
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
}
.event-btn-link span {
    font-size: 10px;
    margin-top: 0.25rem;
    color: #171717;
}
.profile_image {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 100%;
}
.btn_cancel,
.btn_logout {
    padding: 0.5rem 1rem;
    border-radius: 4px;
    font-size: 0.875rem;
}
.btn_logout {
    background-color: #dc3545;
    border: 1px solid #dc3545;
    color: white;
}
.btn_cancel {
    border: 1px solid #dc3545;
    background-color: white;
    color: #dc3545;
}
.event-btn-link:focus > span,
.event-btn-link:active > span {
    color: #dc3545;
}
.event-btn-link:focus > img,
.event-btn-link:active > img {
    filter: invert(27%) sepia(96%) saturate(1211%) hue-rotate(326deg)
        brightness(95%) contrast(100%);
}
</style>

<script setup>
import { ref, onMounted, onUnmounted, inject } from "vue";
import { v4 as uuidv4 } from "uuid";
import dropdown from "/public/assets/images/icons/dropdown.svg";
import email from "/public/assets/images/icons/email.svg";
import phone from "/public/assets/images/icons/phone.svg";
import address from "/public/assets/images/icons/address.svg";
import review from "/public/assets/images/icons/review.svg";
import wishlist from "/public/assets/images/icons/wishlist.svg";
import transaction from "/public/assets/images/icons/transaction.svg";
import notification from "/public/assets/images/icons/notification.svg";
import bills from "/public/assets/images/icons/bills.svg";
import account from "/public/assets/images/icons/account.svg";
import logout from "/public/assets/images/icons/logout.svg";
import home from "/public/assets/images/icons/home.svg";
import chats from "/public/assets/images/icons/chats.svg";

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
