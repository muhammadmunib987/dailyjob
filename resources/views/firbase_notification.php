<!-- Firebase SDKs -->
<script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-messaging-compat.js"></script>

<button id="generate-token-btn">Generate FCM Token</button>

<script>
/* ───────────────────────────
   1.  Firebase initialisation
   ─────────────────────────── */
console.log('[Init] Loading Firebase …');
const firebaseConfig = {
  apiKey: "AIzaSyCjzA3yyZL7LXaB0YP3w0qmTK1p1Qdf3rs",
  authDomain: "fir-testnotification-8730b.firebaseapp.com",
  projectId: "fir-testnotification-8730b",
  storageBucket: "fir-testnotification-8730b.firebasestorage.app",
  messagingSenderId: "138093012472",
  appId: "1:138093012472:web:eb017df327601402a0220d",
  measurementId: "G-G6NS7NEBXC"
};
firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();
console.log('[Init] Firebase ready');

/* ───────────────────────────
   2.  Token-generation logic
   ─────────────────────────── */
async function generateToken() {
  console.group('[FCM] Token workflow');

  /* 2-A. Ask browser for permission */
  console.log('Requesting Notification permission …');
  const permission = await Notification.requestPermission();
  console.log('Permission result ➜', permission);

  if (permission !== 'granted') {
    console.warn('⛔ Permission not granted. Aborting.');
    console.groupEnd();
    return;
  }

  /* 2-B. Register /firebase-messaging-sw.js (required for getToken) */
  console.log('Registering service-worker …');
  const registration = await navigator.serviceWorker.register('http://localhost/dailyjob/public/firebase-messaging-sw.js')
    .catch(err => {
      console.error('❌ SW registration failed:', err);
      throw err;
    });
  console.log('Service-worker registered:', registration.scope);

  /* 2-C. Retrieve the token */
  console.log('Calling messaging.getToken() …');
  try {
    const token = await messaging.getToken({
      vapidKey: 'BGsHZUmV9lg-jASIUAPi8l8g5ODp5UPjkjxfw47Fzu0AyOjwWQ9s__WR6wLM1IW7zGe5fn6FjU2_fhoieS7AThE',
      serviceWorkerRegistration: registration
    });

    if (token) {
      console.log('✅ FCM token obtained:', token);
      alert(token);
      // TODO: POST token to your Laravel endpoint
    } else {
      console.warn('⚠️  getToken returned null — check browser console for Push error messages.');
    }
  } catch (err) {
    console.error('❌ Failed to get token:', err);
  }

  console.groupEnd();
}

/* ───────────────────────────
   3.  Button binding
   ─────────────────────────── */
document.getElementById('generate-token-btn')
  .addEventListener('click', generateToken);

/* ───────────────────────────
   4.  Foreground message handler
   ─────────────────────────── */
messaging.onMessage(payload => {
  console.log('[FCM] Foreground message:', payload);
});
</script>
