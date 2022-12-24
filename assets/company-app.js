import { create, createApp } from "vue";
import store from "./store";
import App from "./Company-App/index";

createApp(App)
    .use(store)
    .mount('#company-app'); 