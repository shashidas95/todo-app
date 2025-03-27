<?php
require_once "Notification.php";

require_once "SMSNotification.php";
require_once "PushNotification.php";
require_once "EmailNotification.php";
require_once "NotificationFactory.php";


try {
 $notificationType = "sms";
 $notification = NotificationFactory::createNotification($notificationType);
 return $notification->send(("Hello, this is a test notification!"));
} catch (Exception $e) {
 echo "Error: " . $e->getMessage();
}
