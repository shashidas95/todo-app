<?php


class NotificationFactory
{
 public static function createNotification(string $notificationType)
 {
  switch (strtolower($notificationType)) {
   case 'email':
    return new EmailNotification();
   case 'sms':
    return new SMSNotification();
   case 'push':
    return new PushNotification();
   default:
    throw new Exception("Invalid notification type '$notificationType'", 1);
  }
 }
}
