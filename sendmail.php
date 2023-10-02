<?php
error_reporting(0);
function cleanmyname($nametoclean)
{
    $ntcstepone = strip_tags(html_entity_decode($nametoclean));
    $ntcsteptwo = substr($ntcstepone, 0, 20);
    return ucwords($ntcsteptwo);
}

function cleanmystring($stringtoclean)
{
    return preg_replace('/[^a-zA-Z0-9]/', '', strip_tags(html_entity_decode($stringtoclean)));
}

$uname = cleanmyname($_GET['name']);
$uemail = strip_tags($_GET['email']);
$uphone = cleanmystring($_GET['phone']);
$umessage = strip_tags($_GET['message']);


if ($uname == '' || $uphone == '' || $uemail == '' || $umessage == '') {
    header("Location: ");
    exit;
}


$to = 'ahmedsayeed138@gmail.com';
$from = 'ahmed';
$fromName = 'Website';

$subject = "New Enquiry from $uname ()";

$htmlContent = ' 
    <html> 
    <head> 
        <title>New Enquiry from ' . $uname . '</title> 
    </head> 
    <body>
    <style>
    th, td {
  padding: 10px;
}

    </style>
        <h1>New Enquiry from ' . $uname . '</h1> 
        <table cellspacing="0" style="border: 1px dashed #FB4314; width: 100%;padding:10px;"> 
            <tr> 
                <th>Name:</th><td>' . $uname . '</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Email:</th><td>' . $uemail . '</td> 
            </tr> 
            <tr> 
                <th>Phone:</th><td>' . $uphone . '</td> 
            </tr>
          <tr style="background-color: #e0e0e0;"> 
                <th>Message:</th><td>' . $umessage . '</td> 
            </tr>
        </table> 
    </body> 
    </html>';

// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers 
$headers .= 'From: ' . $uname . '<' . $from . '>' . "\r\n";

// Send email 
if (mail($to, $subject, $htmlContent, $headers)) {
    header("Location: ");
    exit;
} else {
    header("Location: ");
    exit;
}

?>