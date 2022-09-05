<?php 

$mailto = "mtaha1007@gmail.com";
$sub = "Testing";
$body = "arey bhai sirf testing hai";
$header = "From: m.taha10045@gmail.com";
if(mail($mailto, $sub, $body, $header))
{
    echo "send";
}
else{
    echo "error";
}
