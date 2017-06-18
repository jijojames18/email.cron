<?php
require 'db.php';
$query = "SELECT `name`,`email` FROM `members_list` where dob like '%".date('m-d')."%'";
$data = mysql_query($query);
$month = date('F');
$day = date('j<\s\u\p>S</\s\u\p>');
$template = file_get_contents('card.php');
$template = str_replace("#date#", $day, $template);
$template = str_replace("#month#", $month, $template);
$subject="Birthday wishes";
$headers = 'From: name of organization<contact@domain.org>' . PHP_EOL .
    'Reply-To: name of organization <contact@domain.org>' . PHP_EOL .
    'Content-type: text/html; charset=UTF-8' . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();
while ($row = mysql_fetch_assoc($data))
{
    $name = $row['name'];
    $mailid = $row['email'];
    $mail_template = str_replace("#name#", $name, $template);
    mail($mailid, $subject, $mail_template, $headers);
}  
?>