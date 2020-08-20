<template>
  <div>
    <div class="login-logo">
      <a href="../../index2.html"><b>Viralget</b>Admin</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form @submit="handleLogin()">
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
export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
    };
  },
  mounted() {},
  created: function () {},
  methods: {
    async handleLogin() {
      const URL = `/api/adminv1/admin/login`;

      const data = {
        email: this.form.email,
        password: this.form.password,
      };

      try {
        const response = await axios.post(URL, data);

        if (response.status === 200) {
          const token = response.data.access_token;
          console.log(response);
          // Set token to localstorage
          // redirect
        }
      } catch (err) {
        console.log(err);
      }
      console.log(this.form.email);
      console.log(this.form.password);
    },
  },
};
</script>
