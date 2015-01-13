<?php
class actions_team_leader_send_email {

    function handle(&$params) {

        echo "<br><h2>Email send process Team Leader...</h2><br>";
        
        // give it some time to send the email. i think set_time_limit(30) is default. May need 60 sec. 2013-11-15
        // http://php.net/manual/en/function.set-time-limit.php
        set_time_limit(78);

        $app = & Dataface_Application::getInstance();  // reference to Dataface_Application object
        $auth = & Dataface_AuthenticationTool::getInstance(); // reference to Dataface_Authentication object
        $user = & $auth->getLoggedInUser();  // Dataface_Record object of currently logged in user.
        $rrecord = & $app->getRecord();  // Currently selected noterecord (Dataface_Record object)

        //$to1      = 'dgleba@stackpole.com';
        $to1      = 'stratford.reports@stackpole.com'; // in the final version only this one is needed
		//$to1      = 'azhou@stackpole.com';	// fill in your own email here for testing purposes
        $subject1 = 'Team Leader Report Submitted';
        
        $headers1 = "From: " . "stackpole.stratford@gmail.com" . "\r\n";
        //$headers1 .= "cc: ". "xa@gmail.com" . "\r\n";
        $headers1 .= "bcc: " . "dgleba@gmail.com, " . "\r\n";
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
        $message1 .= "<tr style='background: #FEE5DF;'><td>Cell: </td><td>" . $rrecord->strval('cell') . "</td></tr>"; 
		
                   
        $message1 .= "<tr style='background: #FEE5DF;'><td>Machine Issues: </td><td>" . $rrecord->strval('machine') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Material Issues: </td><td>" . $rrecord->strval('material') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Method/People Issues: </td><td>" . $rrecord->strval('method_and_people') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>5S Issues: </td><td>" . $rrecord->strval('5S') . "</td></tr>";
		$message1 .= "<tr style='background: #FEE5DF;'><td>Quality and Measurement Issues: </td><td>" . $rrecord->strval('quality_and_measurment') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Safety Issues: </td><td>" . $rrecord->strval('safety') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Training Issues: </td><td>" . $rrecord->strval('training') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Actions: </td><td>" . $rrecord->strval('actions') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Ideas: </td><td>" . $rrecord->strval('ideas') . "</td></tr>";
        $message1 .= "<tr style='background: #FEE5DF;'><td>Completed: </td><td>" . $rrecord->strval('completed') . "</td></tr>";
          
         
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
 
