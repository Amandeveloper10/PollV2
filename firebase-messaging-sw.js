importScripts('https://www.gstatic.com/firebasejs/4.9.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/4.9.1/firebase-messaging.js');
/*Update this config*/
var config = {	
	apiKey: "AIzaSyBdyrEAeLFeIqfaNPfL_mSHoaJb4QHVKro",
  authDomain: "hrpayroll-847be.firebaseapp.com",
  databaseURL: "https://hrpayroll-847be.firebaseio.com",
  projectId: "hrpayroll-847be",
  storageBucket: "hrpayroll-847be.appspot.com",
  messagingSenderId: "553676957818",
  appId: "1:553676957818:web:976ada4a82d225e60873c3",
  measurementId: "G-FY9S1CBDZZ"
  };
  firebase.initializeApp(config);

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  const notificationTitle = payload.data.title;
  const notificationOptions = {
    body: payload.data.body,
	icon: payload.data.icon,
  };

  return self.registration.showNotification(notificationTitle,
      notificationOptions);
});
// [END background_handler]