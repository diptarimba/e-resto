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
                            <component :is="profilePict1" class="img-fluid" alt="" width="61" height="50" />
                            <!-- <img
                                class="img-fluid"
                                src="/assets/images/profile-shape-1.svg"
                                alt=""
                                width="61"
                                height="50"
                            /> -->
                        </div>
                        <div class="profile-shape profile-shape-2">
                            <component :is="profilePict1" class="img-fluid" alt="" width="48" height="59" />
                            <!-- <img
                                class="img-fluid"
                                src="/assets/images/profile-shape-2.svg"
                                alt=""
                                width="48"
                                height="59"
                            /> -->
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

const createAsyncComponent = (path) => defineAsyncComponent(() => import(`${import.meta.env.VITE_BASE_URLL}${path}`));

const profilePict1 = createAsyncComponent("assets/images/profile-shape-1.svg");
const profilePict2 = createAsyncComponent("assets/images/profile-shape-2.svg");
const imageUser = createAsyncComponent("assets/images/user/user.png");

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
