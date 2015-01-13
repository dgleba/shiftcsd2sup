<?php
class actions_c2_superv_send_email {

    function handle(&$params) {

        echo "<br><h2>Email send process - CSD2 Supervisor...</h2><br>";
        
        // give it some time to send the email. i think set_time_limit(30) is default. May need 60 sec. 2013-11-15
        // http://php.net/manual/en/function.set-time-limit.php
        set_time_limit(76);

        $app = & Dataface_Application::getInstance();  // reference to Dataface_Application object
        $auth = & Dataface_AuthenticationTool::getInstance(); // reference to Dataface_Authentication object
        $user = & $auth->getLoggedInUser();  // Dataface_Record object of currently logged in user.
        $rrecord = & $app->getRecord();  // Currently selected noterecord (Dataface_Record object)

        //$to1      = 'dgleba@stackpole.com';
        $to1      = 'stratford.reports@stackpole.com';
        $subject1 = 'CSD2 Supervisors Shift Report Submitted';
        
        $headers1 = "From: " . "stackpole.stratford@gmail.com" . "\r\n";
        //$headers1 .= "cc: ". "x1954@gmail.com" . "\r\n";
        //$headers1 .= "bcc: " . "dgleba@gmail.com, " . "\r\n";
        $headers1 .= "Reply-To: " . "Do-not@reply" . "\r\n";
        $headers1 .= "MIME-Version: 1.0\r\n";
        $headers1 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        $message1 = '<html><body>';
        //$message1 .= '<table rules="all" border="1" style="border: 1px solid #211D57;" cellpadding="5">';
        //$message1 .= '<table cellpadding="5" border="1"  bgcolor="#FFFFFF">';
        $message1 .= '<table cellpadding="5" cellspacing="0" border="1"   bgcolor="#FFFFFF">';
        
        // grey color - standard = #eee;
        $message1 .= "<tr style='background: #FEE5DF;'><td>Date reported: </td><td>" . $rrecord->strval('sfdate') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Shift reported: </td><td>" . $rrecord->strval('sfshift') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Reported by: </td><td>" . $rrecord->strval('reportedby') . "</td></tr>"; 
        
                   
        $message1 .= "<tr style='background: #FEE5DF;'><td>Press 271: </td><td>" . $rrecord->strval('press_271') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Press 272: </td><td>" . $rrecord->strval('press_272') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Press 277: </td><td>" . $rrecord->strval('press_277') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Press 278: </td><td>" . $rrecord->strval('press_278') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Press 273: </td><td>" . $rrecord->strval('press_273') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Sintering Production: </td><td>" . $rrecord->strval('sintering_production') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Input 6L: </td><td>" . $rrecord->strval('input_6l') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Output 6L: </td><td>" . $rrecord->strval('output_6l') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Reaction GF6: </td><td>" . $rrecord->strval('reaction_gf6') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Input GF6: </td><td>" . $rrecord->strval('input_gf6') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Input 6L 100%: </td><td>" . $rrecord->strval('input_6l_100') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Output 6L 100%: </td><td>" . $rrecord->strval('output_6l_100') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Reaction GF6 100%: </td><td>" . $rrecord->strval('reaction_gf6_100') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Input GF6 100%: </td><td>" . $rrecord->strval('input_gf6_100') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>ZF Chrysler 100%: </td><td>" . $rrecord->strval('zf_chrysler_100') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Input 6L 200%: </td><td>" . $rrecord->strval('input_6l_200') . "</td></tr>";
        //$message1 .= "<tr style='background: #FEE5DF;'><td>ZF Chrysler 200%: </td><td>" . $rrecord->strval('zf_chrysler_200') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Check For Braze Pellets: </td><td>" . $rrecord->strval('check_for_braze_pellets') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Number of Cracked Hubs: </td><td>" . $rrecord->strval('num_cracked_hubs') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>When were the Cracked Hubs Compacted?: </td><td>" . $rrecord->strval('when_compacted_cracked_hubs') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Hold Area Check: </td><td>" . $rrecord->strval('hold_area_check') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Hold Area: </td><td>" . $rrecord->strval('hold_area') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Containment: </td><td>" . $rrecord->strval('containment') . "</td></tr>";
        //$message1 .= "<tr style='background: #FEE5DF;'><td>Checklist: </td><td>" . $rrecord->strval('checklist') . "</td></tr>";
        
         
        $message1 .= "<tr style='background: #FEE5DF;'><td>Miscellaneous: </td><td>" . $rrecord->strval('miscellaneous') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Createdtime: </td><td>" . $rrecord->strval('createdtime') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Updatedtime: </td><td>" . $rrecord->strval('updatedtime') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Id-number: </td><td>" . $rrecord->strval('sfid') . "</td></tr>";

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
 
