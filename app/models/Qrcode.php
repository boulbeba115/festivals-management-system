<?php 
namespace App\models;
class QrCode{  
   // Google Chart API URL  
   private $apiUrl = 'http://chart.apis.google.com/chart';  
   private $data; 
   private $p1=""; 
   // It generates URL type of Qr code  
   public function URL($url = null){  
     $this->data = preg_match("#^https?\:\/\/#", $url) ? $url : "http://{$url}";  
   }  
    // It generate the Text type of Qr code  
   public function TEXT($text){  
     $this->data = $text;  
   }  
   // It generates the Email type of Qr code  
      public function EMAIL($email = null, $subject = null, $message = null) {  
           $this->data = "MATMSG:TO:{$email};SUB:{$subject};BODY:{$message};;";  
      }  
   //It generates the Phone numner type of Qr Code  
   public function PHONE($phone){  
     $this->data = "TEL:{$phone}";  
   }  
   //It generates the Sms type of Qr code  
      public function SMS($phone = null, $msg = null) {  
           $this->data = "SMSTO:{$phone}:{$msg}";  
      }  
   //It generates the VCARD type of Qr code  
      public function CONTACT($name = null, $address = null, $phone = null, $email = null) {  
           $this->data = "MECARD:N:{$name};ADR:{$address};TEL:{$phone};EMAIL:{$email};;";  
      }  
   // It Generates the Image type of Qr Code  
      public function CONTENT($type = null, $size = null, $content = null) {  
           $this->data = "CNTS:TYPE:{$type};LNG:{$size};BODY:{$content};;";  
      }  
   // Saving the Qr code image   
      public function QRCODE($size = 400, $filename = null) {  
           $ch = curl_init();  
           curl_setopt($ch, CURLOPT_URL, $this->apiUrl);  
           curl_setopt($ch, CURLOPT_POST, true);  
           curl_setopt($ch, CURLOPT_POSTFIELDS, "chs={$size}x{$size}&cht=qr&chl=" . urlencode($this->data));  
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
           curl_setopt($ch, CURLOPT_HEADER, false);  
           curl_setopt($ch, CURLOPT_TIMEOUT, 30);  
           $img = curl_exec($ch);
           curl_close($ch); 
           if($img) {  
                if($filename) {  
                     if(!preg_match("#\.png$#i", $filename)) {  
                          $filename .= ".png";  
                     }  
                     return file_put_contents($filename, $img);  
                } else {  
                     header("Content-type: image/png");  
                     print $img;;
                     return true;  
                }  
           }  
           return false;  
      }

 }  
 ?>