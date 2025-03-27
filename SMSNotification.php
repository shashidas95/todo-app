<?php

class SMSNotification implements Notification
{
 public function send(string $message)
 {
  echo "SMS sent, $message";
 }
}
