function page(path) {
  return () =>
    import(/* webpackChunkName: '' */ `~/pages/${path}`).then(
      m => m.default || m
    );
}

export default [
  { path: "/", name: "home", component: page("home.vue") },

  { path: "/login", name: "login", component: page("auth/login.vue") },
  { path: "/register", name: "register", component: page("auth/register.vue") },
  {
    path: "/profile",
    name: "profile",
    component: page("profile.vue")
  },
  {
    path: "/document/:code",
    name: "document",
    props: true,
    component: page("document.vue")
  },
  { path: "*", component: page("errors/404.vue") }
];
