<template>
  <div>
    <div class="login-logo">
      <img
        src="https://res.cloudinary.com/viralget/image/upload/v1595177709/viralget_vo4wzi.jpg"
        alt="viralget"
      />
      <a href="#"><b>Viralget</b>Admin</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form @submit.prevent="callLogin()">
        <div class="form-group has-feedback">
          <input
            type="email"
            v-model="form.email"
            class="form-control"
            placeholder="Email"
          />
          <span
            class="glyphicon glyphicon-envelope form-control-feedback"
          ></span>
        </div>
        <div class="form-group has-feedback">
          <input
            type="password"
            v-model="form.password"
            class="form-control"
            placeholder="Password"
          />
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label> <input type="checkbox" /> Remember Me </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">
              Sign In
            </button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="#">I forgot my password</a><br />
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
        password: "",
      },
    };
  },
  computed: mapGetters(["getUser", "isAuthenticated"]),
  mounted() {},
  created: function () {},
  methods: {
    ...mapActions(["handleLogin"]),
    callLogin() {
      const data = {
        email: this.form.email,
        password: this.form.password,
      };

      this.handleLogin(data).then((response) => {
        if (response.status === 401) {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Wrong email or password",
          });

          return;
        }

        if (response.status === 200) {
          const RedirectURL = `/admin/dashboard`;
          window.location = RedirectURL;
        }
      });
    },
  },
};
</script>
