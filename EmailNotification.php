<?php

class EmailNotification implements Notification{
 public function send(string $message){
  echo "Email sent, $message";
 }
}