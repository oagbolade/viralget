import store from "../store";
import Axios from "axios";

store.subscribe(mutation => {
    switch (mutation.type) {
        case "SET_TOKEN":
            if (mutation.payload) {
                Axios.defaults.headers.common["Authorization"] = `Bearer ${
                    mutation.payload
                    }`;
                console.log('ran subscriber');
                localStorage.setItem("token", mutation.payload);
            } else {
                Axios.defaults.headers.common["Authorization"] = null;
                localStorage.removeItem("token");
            }
            break;
        default:
        // code block
    }
});
