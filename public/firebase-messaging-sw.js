importScripts('https://www.gstatic.com/firebasejs/9.6.1/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/9.6.1/firebase-messaging-compat.js');

firebase.initializeApp({
  apiKey: "AIzaSyCjzA3yyZL7LXaB0YP3w0qmTK1p1Qdf3rs",
  authDomain: "fir-testnotification-8730b.firebaseapp.com",
  projectId: "fir-testnotification-8730b",
  storageBucket: "fir-testnotification-8730b.firebasestorage.app",
  messagingSenderId: "138093012472",
  appId: "1:138093012472:web:eb017df327601402a0220d",
  measurementId: "G-G6NS7NEBXC"
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  
  const notificationTitle = payload.notification.title;
  const notificationOptions = {
    body: payload.notification.body,
    icon: '/firebase-logo.png' // optional icon
  };

  self.registration.showNotification(notificationTitle, notificationOptions);
});
