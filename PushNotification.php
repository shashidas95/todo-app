<?php

class PushNotification implements Notification
{
 public function send(string $message)
 {
  echo "Push sent, $message";
 }
}
