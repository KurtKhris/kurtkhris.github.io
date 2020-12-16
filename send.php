<?php

// ini_set('display_errors', 0);
        require("mailfun.php");
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $email = $request->email;
        $subject = $request->subject;
        $receipientName = $request->receipientName;
        $type = $request->type;
        $post = $request->post;
        $cc = $request->cc;
        
        

        if($type == 'birthday'){

                $message = '.$subject.';
            

            $send = send_email_birthday( $email,$subject,$message,$receipientName,$post,$cc);

                if($send == 1){
                    
                    $responsebody = new \stdClass();
                       
                        $status = 'sent';
                        $responsebody->responseCode = '000';
                        $responsebody->responseMessage = 'Success';
                        $response=json_encode($responsebody);
                        echo $response;
                         

                        
                        // LoggerUtil7($email, $status);
                }

                else{
                        $status = 'not sent';
                        $responsebody->responseCode = 'E01';
                        $responsebody->responseMessage = 'Failed';
                        $response=json_encode($responsebody);
                        echo $response;
                        
                         // LoggerUtil7($email, $status);
                } 

        }
       
        
        
?>		