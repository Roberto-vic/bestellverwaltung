import { create, createApp } from "vue";
import store from "./store";
import App from "./Company-App/index";
import router from "./router";

createApp(App)
    .use(router)
    .use(store)
    .mount('#company-app'); 