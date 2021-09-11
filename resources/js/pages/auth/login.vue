<template>
  <div class="row login" style="background-image: url(img/main-bg.jpg)">
    <div class="login__wrapper">
      <div class="login__wrapper-bg">
        <img src="img/login-bg.svg" alt="" />
      </div>
      <div class="col-lg-8 m-auto">
        <card>
          <div class="login__wrapper-title">Авторизация</div>
          <form @submit.prevent="login" @keydown="form.onKeydown($event)">
            <!-- Email -->
            <div class="form-group row">
              <div class="col-md-7">
                <input
                  v-model="form.email"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                  class="form-control"
                  type="email"
                  name="email"
                  placeholder="E-mail"
                />
                <has-error :form="form" field="email" />
              </div>
            </div>

            <!-- Password -->
            <div class="form-group row">
              <div class="col-md-7">
                <input
                  v-model="form.password"
                  :class="{ 'is-invalid': form.errors.has('password') }"
                  class="form-control"
                  type="password"
                  name="password"
                  placeholder="Пароль"
                />
                <has-error :form="form" field="password" />
              </div>
            </div>

            <div class="form-group row">
              <div class="login__icons">
                <a href="#" class="login__icons-btn">
                  <img src="img/auto-icon-1.svg" alt="" />
                </a>
                <a href="#" class="login__icons-btn">
                  <img src="img/auto-icon-2.svg" alt="" />
                </a>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-7 offset-md-3 d-flex">
                <!-- Submit Button -->
                <v-button class="button-submit" :loading="form.busy">
                  Войти
                </v-button>

                <!-- GitHub Login Button -->
                <login-with-github />
              </div>
            </div>
          </form>
        </card>
      </div>
    </div>
  </div>
</template>

<script>
import Form from "vform";
import LoginWithGithub from "~/components/LoginWithGithub";

export default {
  middleware: "guest",

  components: {
    LoginWithGithub
  },

  metaInfo() {
    return { title: this.$t("login") };
  },

  data: () => ({
    form: new Form({
      email: "",
      password: ""
    }),
    remember: false
  }),

  methods: {
    async login() {
      // Submit the form.
      const { data } = await this.form.post("/api/login");

      // Save the token.
      this.$store.dispatch("auth/saveToken", {
        token: data.token,
        remember: this.remember
      });

      // Fetch the user.
      await this.$store.dispatch("auth/fetchUser");

      // Redirect home.
      this.$router.push({ name: "home" });
    }
  }
};
</script>
