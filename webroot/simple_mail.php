<?php
echo "Mail Test<br>";
$to = "support@drapefit.com";

//$to = "debasish@microfinet.com";
$subject = "My subject";
$txt = "Hello world! for drapfit productions sever";
$headers = "From: sukhendu.mukherjee@drapefit.com" . "\r\n" .
"CC: support@drapefit.com";

if(mail($to,$subject,$txt,$headers))
{
    echo "Message accepted";
}
else
{
    echo "Error: Message not accepted";
}

