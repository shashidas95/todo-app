<?php
define("FILE_NAME", "tasks.json");

#loading tasks
function loadTasks()
{
 if (file_exists(FILE_NAME)) {
  $tasks = json_decode(file_get_contents(FILE_NAME), true);
  return is_array($tasks) ? $tasks : [];
 }
 return [];
}


function saveTasks($tasks)
{
 file_put_contents(FILE_NAME, json_encode($tasks, JSON_PRETTY_PRINT));
}

# saving tasks 
$tasks = loadTasks(); // must call globally

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["task"])) {
 if (!empty($_POST["task"])) {

  $task = htmlspecialchars(trim($_POST["task"]));
  $tasks[] = [
   "task" => $task,
   "completed" => false
  ];

  saveTasks($tasks);
  header("Location:  /index.php");
  exit();
 }
}
// marking as complete
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["complete_task"])) {
 $index = $_POST["complete_task"];
 if (isset($tasks[$index])) {
  $tasks[$index]["completed"] = !$tasks[$index]["completed"];
  saveTasks($tasks);
  header("Location: /index.php");
  exit();
 }
}
// marking as complete
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_task"])) {
 $index = $_POST["delete_task"];
 if (isset($tasks[$index])) {
  unset($tasks[$index]);
  // Reindex the array to avoid gaps in indexes
  $tasks = array_values($tasks);
  saveTasks($tasks);
  header("Location: /index.php");
  exit();
 }
}
