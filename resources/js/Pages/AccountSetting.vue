<template>
    <div>
        <Head title="Setting" />
        <div class="contact-section section-gap-top-30">
            <div class="container">
                <div class="profile-card-section section-gap-top-25">
                    <div class="profile-card-wrapper">
                        <div class="image">
                            <img
                                class="img_profile"
                                :src="imageProfile"
                                alt=""
                            />
                            <label class="upload-image-label" for="file">
                                <i class="icon icon-carce-camera"></i>
                            </label>
                            <input
                                class="upload-file"
                                id="file"
                                @change="actionUploadPhoto"
                                ref="file"
                                type="file"
                            />
                        </div>
                        <div class="content">
                            <h2 class="setting-name">
                                {{
                                    props.customer.name !== null
                                        ? props.customer.name
                                        : "Profile Name Not Set"
                                }}
                            </h2>
                            <span class="setting-email email">
                                {{
                                    props.customer.email !== null
                                        ? props.customer.email
                                        : "Profile Email Not Set"
                                }}
                            </span>
                            <span class="id-num">
                                Phone:
                                {{
                                    props.customer.phone !== null
                                        ? props.customer.phone
                                        : "Profile Phone Not Set"
                                }}
                            </span>
                        </div>
                        <div class="profile-shape profile-shape-1">
                            <img src="data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2261.32%22%20height%3D%2250.152%22%3E%3Cpath%20data-name%3D%22Path%2050%22%20d%3D%22M61.32%200S30.31%205.69%2029.38%2028.24C28.43%2050.78%200%2050.15%200%2050.15V10A10%2010%200%2001110%200z%22%20fill%3D%22%235e5ce6%22%2F%3E%3C%2Fsvg%3E" alt="SVG Image" width="61" class="img-fluid" height="50" />
                        </div>
                        <div class="profile-shape profile-shape-2">
                            <img src="data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2248.224%22%20height%3D%2258.905%22%3E%3Cpath%20data-name%3D%22Path%2051%22%20d%3D%22M48.224.515v48.39a10%2010%200%2001-10%2010h-26.87s-11.96-1.4-11.33-16.2%2018.26-8.5%2023.61-27.71S48.224.515%2048.224.515z%22%20fill%3D%22%230a84ff%22%2F%3E%3C%2Fsvg%3E" alt="SVG Image" width="48" class="img-fluid" height="50" />

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
                                    v-model="profileData.name"
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
                                    v-model="profileData.email"
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
                                    v-model="profileData.phone"
                                    placeholder="Phone"
                                />
                                <span class="icon"
                                    ><i class="icon icon-carce-phone"></i
                                ></span>
                            </li>
                        </ul>
                    </form>
                    <a
                        href="#"
                        class="btn btn--block btn--radius btn--size-xlarge btn--color-white btn--bg-maya-blue text-center contact-btn"
                        @click="actionUpdateProfile"
                        >Save</a
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.profile-card-wrapper .image img {
    width: 96px !important;
    height: 96px !important;
    object-fit: cover;
}
.profile-card-wrapper {
    padding: 2rem !important;
}
</style>
<script>
import Homes from "../Shared/Layout/Homes.vue";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    layout: Homes,
};
</script>
<script setup>
import { useToast } from "vue-toastification";
import { defineAsyncComponent, ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
const toast = useToast();

import imageUser from '../../assets/images/user/user.png';

let props = defineProps({
    customer: Object,
});

let imageProfile = ref(
    props.customer.image !== null
        ? props.customer.image
        : imageUser
);

const profileData = useForm({
    name: "",
    phone: "",
    email: "",
    token: "",
});

const file = ref(null);

const actionUploadPhoto = () => {
    let tokenLocal = localStorage.getItem("token");
    const formData = new FormData();
    formData.append("file", file.value.files[0]);
    formData.append("token", tokenLocal);
    Inertia.post("/account/upload", formData, {
        preserveScroll: true,
        onSuccess: () => {
            toast.success("Profile Pict berhasil diupdate!", {
                position: "top-center",
                timeout: 2000,
                closeOnClick: true,
                pauseOnFocusLoss: true,
                pauseOnHover: true,
                draggable: true,
                draggablePercent: 0.6,
                showCloseButtonOnHover: false,
                hideProgressBar: true,
                closeButton: false,
                icon: true,
                rtl: false,
            });
            imageProfile.value = URL.createObjectURL(file.value.files[0]);
        },
    });
};

const actionUpdateProfile = () => {
    // mengambil data token masing masing user
    let tokenLocal = localStorage.getItem("token");
    profileData.token = tokenLocal;

    profileData.post("/account/update", {
        preserveScroll: true,
        onSuccess: () => {
            profileData.reset();
            toast.success("Profile berhasil diupdate!", {
                position: "top-center",
                timeout: 2000,
                closeOnClick: true,
                pauseOnFocusLoss: true,
                pauseOnHover: true,
                draggable: true,
                draggablePercent: 0.6,
                showCloseButtonOnHover: false,
                hideProgressBar: true,
                closeButton: false,
                icon: true,
                rtl: false,
            });
        },
    });
};
</script>
