<?php
// Function to creat Slug field form a given string 
function CreateUnderscoreSlug($string)
{
    $table = array(
        'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/' => '-', ' ' => '_'
    );
    // Remove duplicated spaces
    $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);
    // Returns the slug field 
    return strtolower(strtr($string, $table));
}


//function to handle images
function imageHandler($filename,$tmpfilename,$entity)
{
    $filename_ext = pathinfo($filename, PATHINFO_EXTENSION);

    if($filename_ext=="PDF" or $filename_ext=="pdf" or $filename_ext =="doc"  or $filename_ext =="docx")
    {
        $newfilename = time().".".$filename_ext;
        move_uploaded_file($tmpfilename,CheckEntity($entity)."/".$newfilename);
        return $newfilename;
    }
    else
    {
        //echo "Operation not completed";
        return false;
    }
}

// function to generate random numbers
function generateRandomString($length, $type)
{
    if ($type == "0")
    {
        // generate a mixed random string
        $characters = 'ACEFHJKMNPRTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    }
    elseif ($type == "1")
    {
        // generate numbers only
        $characters = '1234567890';
    }
    
    $string = '';
    for ($i = 0; $i < $length; $i++)
    {
        $string .= $characters[rand(0, strlen($characters) - 1)];
    }   
    return $string;
}


// function to send sms
function sendSMS($phoneno, $message)
{    
    // Setting the recipients of the reply. If not set, the reply is sent
    // back to the sender of the origial SMS message
    // header('X-SMS-To: +97771234567 +15550987654');
    
    // Setting the content type and character encoding
    // header('Content-Type: text/plain; charset=utf-8');
    // Comment the next line out if you do not want to send a reply
    // echo $reply_message;
    

    // session_start();
    // #onclick send sms
    // include("file:///C|/xampp/htdocs/Ed/setia/public/opendb.php");
    // if(isset($_POST['btnSend'])){
    // $serviceid=$_SESSION['serviceid'];

    $smsreceivers = $phoneno; //numbers seperated by comma;
    $smsg = $message;
    // $to=$subject;
    # call sms function
    $owneremail =   "dkdimgba@yahoo.com";
    $subacct    =   "DIMGBA";
    $subacctpwd =   "dimgba";
    $sendto     =   urlencode($smsreceivers); /* destination number */
    $sender     =   "DimgbaKalu"; /* sender id */
    $message    =   urlencode($smsg); /* message to be sent */
    /* create the required URL */

    $cmd = "http://www.smslive247.com/http/index.aspx?cmd=sendmsg&sessionid=e465a7f2-fdc2-4f86-aa39-a0bf8b417907&message=".$message."&sender=".$sender."&sendto=".$sendto."&msgtype=0";
    # call the URL 
    // create a new cURL resource
    $ch = curl_init();
    // Set API credentials
    // $username = "dailytrust";
    // $password = "shortcode";
    // Build the API command string
    // $cmd = "http://shortcodenigeria.com/secure2/api/send.php?uname=dailytrust&pword=shortcode&id=".$messageId."&message=".$message;
    // set URL and other appropriate options
    // Send API command and clean up
    curl_setopt($ch, CURLOPT_URL, "$cmd");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);// grab URL and pass it to the browser
    // Print response
    $response = curl_exec($ch);
    return "$response";
    // close cURL resource, and free up system resources
    curl_close($ch);
}