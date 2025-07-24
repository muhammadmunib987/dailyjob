<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('order.{orderId}', function ($user, $orderId) {
    return $user->id === Order::find($orderId)->user_id;
});