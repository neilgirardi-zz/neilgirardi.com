<?php

// Send an email notification of new submissions.

$form_questions = array(
'FIRST NAME:' => $name_first,
'LAST NAME:' => $name_last,
'EMAIL:' => $email_address,
'COUNTRY OF RESIDENCE:' => $country_residence,
'CITY OF RESIDENCE:' => $city_residence,
'STATE OF RESIDENCE:' => $state_residence,
) ;

$body = ' . ';
$body .= "Someone new has signed the guest book at Celsius911.net: \n \n";
foreach($form_questions as $form_question => $answer) {
    $body .= "$form_question  $answer \n \n";
}
$body .= ' . ';

$to = 'celsius@celsius911.net' ;

$subject = 'New Guest Book Entry' ;

$body = strip_tags(wordwrap($body, 70));

$headers = 'From: admin@celsius911.net';

mail ($to, $subject, $body, $headers);

?>