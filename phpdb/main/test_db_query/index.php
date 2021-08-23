<?php
include "helper.php";



try {
    $results = $db->query(
        "SELECT member_id, email, fullname, level FROM members"
    );
} catch (Exception $e) {
    echo $e->getMessage();
}
//add code below this line
$mails = $results->fetchAll(PDO::FETCH_ASSOC);
//var_dump($mails);
/*
$id;
for ($id=0;$id<=4;$id++){
    send_offer($mails[$id]['member_id'], $mails[$id]['email'], 
    $mails[$id]['fullname'], $mails[$id]['level']);
}
*/

 foreach ($mails as $mail) {
                send_offer($mail['member_id'], $mail['email'], $mail['fullname'], $mail['level']);
            }

