<template>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div
                                class="col-lg-6 d-none d-lg-block bg-login-image"
                            ></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            Welcome Back!
                                        </h1>
                                    </div>
                                    <form
                                        class="user"
                                        @submit.prevent="callLogin()"
                                    >
                                        <div class="form-group">
                                            <input
                                                type="email"
                                                class="form-control form-control-user"
                                                v-model="form.email"
                                                id="exampleInputEmail"
                                                aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..."
                                            />
                                        </div>
                                        <div class="form-group">
                                            <input
                                                type="password"
                                                v-model="form.password"
                                                class="form-control form-control-user"
                                                id="exampleInputPassword"
                                                placeholder="Password"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <div
                                                class="custom-control custom-checkbox small"
                                            >
                                                <input
                                                    type="checkbox"
                                                    class="custom-control-input"
                                                    id="customCheck"
                                                />
                                                <label
                                                    class="custom-control-label"
                                                    for="customCheck"
                                                    >Remember Me</label
                                                >
                                            </div>
                                        </div>
                                        <a
                                            href="#"
                                            @click="callLogin"
                                            type="submit"
                                            class="btn btn-primary btn-user btn-block"
                                        >
                                            Login
                                        </a>
                                        <hr />
                                    </form>
                                    <div class="text-center">
                                        <a
                                            class="small"
                                            href="forgot-password.html"
                                            >Forgot Password?</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import Swal from "sweetalert2";

export default {
    data() {
        return {
            errorMessage: "",
            form: {
                email: "",
                password: ""
            }
        };
    },
    computed: mapGetters(["getUser", "isAuthenticated"]),
    mounted() {},
    created: function() {},
    methods: {
        ...mapActions(["handleLogin"]),
        callLogin() {
            const data = {
                email: this.form.email,
                password: this.form.password
            };

            this.handleLogin(data).then(response => {
                if (response.status === 401) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Wrong email or password"
                    });

                    return;
                }

                if (response.status === 200) {
                    const RedirectURL = `/admin/dashboard`;
                    window.location = RedirectURL;
                }
            });
        }
    }
};
</script>
