window._ = require("lodash");
window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
import Echo from "laravel-echo";
window.Pusher = require("pusher-js");
window.Echo = new Echo({
    broadcaster: "pusher",
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true,

});
self.addEventListener('notificationclick', function(event) {
    const clickedNotification = event.notification;
    clickedNotification.close();
  
    // Do something as the result of the notification click
    clients.openWindow("https://atrioncash.com")
    event.waitUntil(promiseChain);
  });