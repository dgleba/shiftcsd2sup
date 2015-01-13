<?php
class actions_send_email_test {

//
//  ver: 2013-07-25_Thu_09.39-AM
//        -1.
//        -hoping to address table not displaying correctly in outlook randomly.
//        -added new line after every row. preg_replace('#(</td></tr>)#', '</td></tr>'.PHP_EOL, $body1);
//        -2.
//        -this seems to look ok in all email clients. <table rules="all" border="1"  cellpadding="5" cellspacing="0">
//
//

    function handle(&$params) {

        echo "<br><h2>Email send process...</h2><br>";
        //echo $params."<br><br>";

        $app = & Dataface_Application::getInstance();  // reference to Dataface_Application object
        $auth = & Dataface_AuthenticationTool::getInstance(); // reference to Dataface_Authentication object
        $user = & $auth->getLoggedInUser();  // Dataface_Record object of currently logged in user.
        //$query = & $app->getQuery();
        //echo $query."<br><br>";
        $rrecord = & $app->getRecord();  // Currently selected noterecord (Dataface_Record object)
        //echo $app;

        $to1      = 'dgleba@stackpole.com';
        $subject1 = 'test Shift Report Record Submitted';
        
        $headers1 = "From: " . "stackpole.stratford@gmail.com" . "\r\n";
        //$headers1 .= "cc: ". "x1954@gmail.com" . "\r\n";
        $headers1 .= "bcc: " . "dgleba@gmail.com, " . "\r\n";
        $headers1 .= "Reply-To: " . "Do-not@reply" . "\r\n";
        $headers1 .= "MIME-Version: 1.0\r\n";
        $headers1 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        $message1 = '<html><body>';

        //define table 'look'...FF66FF 99FF99 CCFFCC DAFFDA
        $message1 .= '<table  border="1"  cellpadding="5" cellspacing="0"  bgcolor="#DAFFDA">';
        //$message1 .= '<table rules="all" border="1" style="border: 1px solid #211D57;" cellpadding="5" cellspacing="0">';
        //$message1 .= '<table cellpadding="5" cellspacing="0" border="1"   bgcolor="#FFFFFF">';
        //$message1 .= '<table cellpadding="5" cellspacing="0" border="1"  >';

        
        // grey color - standard = #eee;
        //$message1 .= "<tr style='background: #FEE5DF;'><td>Date reported: </td><td>" . $rrecord->strval('sfdate') . "</td></tr>";
        $message1 .= "<tr  ><td>Date reported: </td><td>" . $rrecord->strval('sfdate') . "</td></tr>";
        $message1 .= "<tr  ><td>Shift reported: </td><td>" . $rrecord->strval('sfshift') . "</td></tr>";
        $message1 .= "<tr  ><td>Reported by: </td><td>" . $rrecord->strval('reportedby') . "</td></tr>";
        
        $message1 .= "<tr  ><td>field 1: </td><td>" . $rrecord->strval('field_1') . "</td></tr>";
        $message1 .= "<tr  ><td>zgen: </td><td>" . $rrecord->strval('zgen') . "</td></tr>";

        $message1 .= "<tr  ><td>miscellaneous: </td><td>" . $rrecord->strval('miscellaneous') . "</td></tr>";

        $message1 .= "<tr  ><td>createdtime: </td><td>" . $rrecord->strval('createdtime') . "</td></tr>";
        $message1 .= "<tr  ><td>updatedtime: </td><td>" . $rrecord->strval('updatedtime') . "</td></tr>";
        $message1 .= "<tr  ><td>id-number: </td><td>" . $rrecord->strval('sfid') . "</td></tr>";
        
        $message1 .= "</table>";
        $message1 .= "</body></html>";

        // replace \r and \n with html br tags to preserve new lines in the html email...
        $body1 = isset($message1) ? preg_replace('#(\\r\\n|\\n|\\r)#', '<br/>', $message1) : false;
        //hoping to address table randomely not displaying correctly in outlook. Add new line after every row...
        $body1 = preg_replace('#(</td></tr>)#', '</td></tr>'.PHP_EOL, $body1);

        if (mail($to1, $subject1, $body1, $headers1)) {
            echo '<br><br><h1><span style="background-color:#00ff00;">Your email has been sent.</span></h1><br>';
        } else {
            //2013-07-25 new message with clearer explanation.
            echo '<br><br />
            <h1><span style="font-size:36px;"><span style="background-color:#ff0000;">There was a problem sending the email.</span></span></h1>
            <p>&nbsp;</p>
            <h1>
            <span style="background-color:#ff8c00;">...Go back and try again.</span></h1>
            <h1>
            &nbsp;</h1> 
            <br />';
        }
        echo '<br /><br /><br /><br /><span style="font-size:16px;">Press the BACK button in your browser to go back.</span><br />';
    }
}
