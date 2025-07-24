<!DOCTYPE html>
<html>
<head>
    <title>Laravel Reverb Chat</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- ✅ jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- ✅ Pusher + Laravel Echo -->
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.15.0/dist/echo.iife.js"></script>
</head>
<body>

    <h2>Laravel Reverb Chat (jQuery + No Reload)</h2>

    <!-- ✅ FIX: remove javascript:void(0) -->
    <form id="chat-form" method="POST" action="#">
        <input type="text" id="message" name="message" required>
        <button type="submit">Send</button>
    </form>

    <div id="chat-box" style="margin-top:20px; border:1px solid #ccc; padding:10px;">
        <strong>Messages:</strong>
        <div id="messages"></div>
    </div>

    <script>
        $(document).ready(function () {
            alert('✅ Page loaded');

            // Setup Laravel Echo with Reverb
            window.Pusher = Pusher;
            window.Echo = new Echo({
                broadcaster: 'pusher',
                key: 'local',
                wsHost: window.location.hostname,
                wsPort: 6001,
                forceTLS: false,
                disableStats: true,
            });

            // Listen for event
            window.Echo.channel('chat-channel')
                .listen('MessageSent', function (e) {
                    console.log('📩 Message received:', e.message);
                    $('#messages').append('<p>' + e.message + '</p>');
                });

            // ✅ Fix: jQuery submit handler
            $('#chat-form').submit(function (e) {
                e.preventDefault(); // prevent form from submitting normally
                alert('📤 Sending message...');

                const message = $('#message').val();
                const token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: "{{ route('send-message') }}",
                    method: "POST",
                    contentType: "application/json",
                    data: JSON.stringify({ message }),
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    success: function (res) {
                        console.log('✅ Message sent to backend');
                        $('#message').val('');
                    },
                    error: function (err) {
                        console.error('❌ Error:', err);
                    }
                });
            });
        });
    </script>

</body>
</html>
