<template>
    <div>
        <Head title="Setting" />
        <div class="contact-section section-gap-top-30">
            <div class="container">
                <div class="profile-card-section section-gap-top-25">
                    <div class="profile-card-wrapper">
                        <div class="image">
                            <img
                                class="img-fluid"
                                src="assets/images/user/user-profile.png"
                                alt=""
                                width="96"
                                height="96"
                            />
                            <label class="upload-image-label" for="file">
                                <i class="icon icon-carce-camera"></i>
                            </label>
                            <input class="upload-file" id="file" type="file" />
                        </div>
                        <div class="content">
                            <h2 class="setting-name">Kajavasta Moon</h2>
                            <span class="setting-email email"
                                >moon@example.com</span
                            >
                            <span class="id-num">ID NO: EXMPL 4566</span>
                        </div>
                        <div class="profile-shape profile-shape-1">
                            <img
                                class="img-fluid"
                                src="assets/images/profile-shape-1.svg"
                                alt=""
                                width="61"
                                height="50"
                            />
                        </div>
                        <div class="profile-shape profile-shape-2">
                            <img
                                class="img-fluid"
                                src="assets/images/profile-shape-2.svg"
                                alt=""
                                width="48"
                                height="59"
                            />
                        </div>
                    </div>
                </div>

                <!-- Start User Event Area -->
                <div class="login-wrapper">
                    <form
                        action="#"
                        class="default-form-wrapper profile-wrapper"
                    >
                        <ul class="default-form-list">
                            <li class="single-form-item">
                                <label for="name" class="visually-hidden"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    id="name"
                                    placeholder="Full Name"
                                />
                                <span class="icon"
                                    ><i class="icon icon-carce-user"></i
                                ></span>
                            </li>
                            <li class="single-form-item">
                                <label for="email" class="visually-hidden"
                                    >Email</label
                                >
                                <input
                                    type="email"
                                    id="email"
                                    placeholder="Email"
                                />
                                <span class="icon"
                                    ><i class="icon icon icon-carce-mail"></i
                                ></span>
                            </li>
                            <li class="single-form-item">
                                <label for="number" class="visually-hidden"
                                    >Phone</label
                                >
                                <input
                                    type="text"
                                    id="number"
                                    placeholder="Phone"
                                />
                                <span class="icon"
                                    ><i class="icon icon-carce-phone"></i
                                ></span>
                            </li>
                            <li class="single-form-item">
                                <label for="gender" class="visually-hidden"
                                    >Gender</label
                                >
                                <input
                                    type="text"
                                    id="gender"
                                    placeholder="Gender"
                                />
                                <span class="icon"
                                    ><i class="icon icon-carce-user"></i
                                ></span>
                            </li>
                        </ul>
                    </form>
                    <a
                        href="#"
                        class="btn btn--block btn--radius btn--size-xlarge btn--color-white btn--bg-maya-blue text-center contact-btn"
                        >Save</a
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Homes from "../Shared/Layout/Homes.vue";
export default {
    layout: Homes,
};
</script>
