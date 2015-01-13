<?php
class actions_c2_pres_qual_send_email {

    function handle(&$params) {

        echo "<br><h2>Email send process - CSD2 Press Quality...</h2><br>";
        
        // give it some time to send the email. i think set_time_limit(30) is default. May need 60 sec. 2013-11-15
        // http://php.net/manual/en/function.set-time-limit.php
        set_time_limit(79);

        $app = & Dataface_Application::getInstance();  // reference to Dataface_Application object
        $auth = & Dataface_AuthenticationTool::getInstance(); // reference to Dataface_Authentication object
        $user = & $auth->getLoggedInUser();  // Dataface_Record object of currently logged in user.
        $rrecord = & $app->getRecord();  // Currently selected noterecord (Dataface_Record object)

        $to1      = 'stratford.reports@stackpole.com';
        $subject1 = 'CSD2 Press Quality Report Submitted';
        
        $headers1 = "From: " . "stackpole.stratford@gmail.com" . "\r\n";
        //$headers1 .= "cc: ". "x1954@gmail.com" . "\r\n";
        //$headers1 .= "bcc: " . "dgleba@gmail.com, " . "\r\n";
        $headers1 .= "Reply-To: " . "Do-not@reply" . "\r\n";
        $headers1 .= "MIME-Version: 1.0\r\n";
        $headers1 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        $message1 = '<html><body>';
        //$message1 .= '<table rules="all" border="1" style="border: 1px solid #211D57;" cellpadding="5">';
        //$message1 .= '<table cellpadding="5" border="1"  bgcolor="#FFFFFF">';
        //$message1 .= '<table cellpadding="5" cellspacing="0" border="1"   bgcolor="#FFFFFF">';
        $message1 .= '<table cellpadding="5" cellspacing="0" border="1"   bgcolor="#DAFFDA">';
        
        // grey color - standard = #eee;
        $message1 .= "<tr ><td>4-hr Period Ending: </td><td>" . $rrecord->strval('sfdate') . "</td></tr>";
        $message1 .= "<tr ><td>Shift reported: </td><td>" . $rrecord->strval('sfshift') . "</td></tr>";
        $message1 .= "<tr ><td>Reported by: </td><td>" . $rrecord->strval('reportedby') . "</td></tr>"; 
        
                   
        $message1 .= "<tr ><td>Press 271 Part: </td><td>" . $rrecord->strval('press_271_part') . "</td></tr>";
        $message1 .= "<tr ><td>Press 271: </td><td>" . $rrecord->strval('press_271') . "</td></tr>";
        
        $message1 .= "<tr ><td>Press 272 Part: </td><td>" . $rrecord->strval('press_272_part') . "</td></tr>";
        $message1 .= "<tr ><td>Press 272: </td><td>" . $rrecord->strval('press_272') . "</td></tr>";
        
        $message1 .= "<tr ><td>Press 277 Part: </td><td>" . $rrecord->strval('press_277_part') . "</td></tr>";
        $message1 .= "<tr ><td>Press 277: </td><td>" . $rrecord->strval('press_277') . "</td></tr>";
        
        $message1 .= "<tr ><td>Press 278 Part: </td><td>" . $rrecord->strval('press_278_part') . "</td></tr>";
        $message1 .= "<tr ><td>Press 278: </td><td>" . $rrecord->strval('press_278') . "</td></tr>";
        
        $message1 .= "<tr ><td>Press 273 Part: </td><td>" . $rrecord->strval('press_273_part') . "</td></tr>";
        $message1 .= "<tr ><td>Press 273: </td><td>" . $rrecord->strval('press_273') . "</td></tr>";
         
        $message1 .= "<tr ><td>Miscellaneous: </td><td>" . $rrecord->strval('miscellaneous') . "</td></tr>";
        $message1 .= "<tr ><td>Created time: </td><td>" . $rrecord->strval('createdtime') . "</td></tr>";
        $message1 .= "<tr ><td>Updated time: </td><td>" . $rrecord->strval('updatedtime') . "</td></tr>";
        $message1 .= "<tr ><td>Id-number: </td><td>" . $rrecord->strval('sfid') . "</td></tr>";

        $message1 .= "</table>";
        $message1 .= "</body></html>";

        // replace \r and \n with html br tags to preserve new lines in the html email...
        $body1 = isset($message1) ? preg_replace('#(\\r\\n|\\n|\\r)#', '<br/>', $message1) : false;
        // replace underscores in checklist of questions with html br tag...
        $body1 = preg_replace('#(______,|______)#', '<br/>', $body1);
        $body1 = preg_replace('#(</td></tr>)#', '</td></tr>'.PHP_EOL, $body1);

        if (mail($to1, $subject1, $body1, $headers1)) {
            echo '<br><br><h1><span style="background-color:#00ff00;">Your email has been sent.</span></h1><br>';
        } else {
            echo '<br><br /><h1><span style="background-color:#ff0000;">There was a problem sending the email.</span></h1><br />';
        }
        echo '<br /><br /><br /><span style="font-size:16px;">Press the BACK button in your browser to go back.</span><br />';
        


    }
}
 
