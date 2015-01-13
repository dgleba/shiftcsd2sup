<?php
class actions_tnlist_print {
    function handle(&$params){
        $app =& Dataface_Application::getInstance();
        $query =& $app->getQuery();
        $query['-skip'] = 0;
        $query['-limit'] = 20;
		
        if ( $query['-table'] != 'tnlist' ){
            return PEAR::raiseError('This action can only be called on the True North List table.');
        }
        
        $tnlist = df_get_records_array('tnlist', $query); 
		
		echo '<head><style>@media print {
				table {
					page-break-inside:avoid;
					position:relative
				}
			}</style></head>';
		
	    echo '<table border="1">'
			.'<style>table{width:1300px; page-break-inside:avoid; position:relative}</style>'
			.'<style>th{height:15px;border:2px solid black}</style>'
            .'<th colspan="9" style="background-color:#C4D79B;height:15px">ISSUES</th>'
			.'<th colspan="5" style="background-color:#FDE9D9;height:15px">ACTIONS</th></tr>'
			.'<tr><th style="max-width:15px">#</th>'
			.'<th style="width:50px">Cell</th>'
			.'<th style="width:50px">When</th>'
			.'<th style="width:250px">Where</th>'
			.'<th style="width:225px">Originator</th>'
			.'<th style="min-width:200px">What</th>'
			.'<th style="min-width:200px">Why/Comment/Who involved?</th>'
			.'<th style="max-width:75px">Category</th>'
			.'<th style="width:100px">Type</th>'
			.'<th style="min-width:200px">What</th>'
			.'<th style="width:150px">Who</th>'
			.'<th style="width:100px;font-size:12px">When Target</th>'
			.'<th style="width:50px;font-size:12px">Priority (ABC)</th>'
			.'<th style="width:50px;white-space: nowrap">Done</th></tr>';
			
		foreach ($tnlist as $rrecord){
			
			echo '<style>td{padding:5px; text-align: left}table{border-collapse:collapse;}</style>'
				.'<tr><td style="max-width:15px"><small>'.$rrecord->htmlValue('id').'</small></td>'
				.'<td style="width:50px;"><small>'.$rrecord->htmlValue('cell').'</small></td>'
				.'<td style="width:50px">'.$rrecord->htmlValue('issues_when').'</td>'
				.'<td style="width:250px">'.$rrecord->htmlValue('issues_where').'</td>'
				.'<td style="width:200px">'.$rrecord->htmlValue('originator').'</td>'
				.'<td style="width:340px">'.$rrecord->htmlValue('what').'</td>'
				.'<td style="width:290px">'.$rrecord->htmlValue('why_comment_who_involved').'</td>'
				.'<td style="max-width:75px; word-break:break-all">'.$rrecord->htmlValue('category').'</td>'
				.'<td style="width:100px">'.$rrecord->htmlValue('type').'</td>'
				.'<td style="width:300px">'.$rrecord->htmlValue('actions_what').'</td>'
				.'<td style="width:150px">'.$rrecord->htmlValue('actions_who').'</td>'
				.'<td style="width:100px">'.$rrecord->htmlValue('actions_when_target').'</td>'
				.'<td style="width:50px">'.$rrecord->htmlValue('actions_priority').'</td>'
				.'<td style="width:50px">'.$rrecord->htmlValue('date_done').'</td></tr>';
		}
		
		echo '</table>';			
        
    }
}




//echo '<table border="3">'
			//.'<style>table{width:1300px}</style>'
			//.'<style>th{height:50px;background-color:#8B8989}</style>'
            //.'<tr><th style="width:1300px"><b>ISSUES</b></th>'
			//.'<th style="width:700px"><b>ACTIONS</b></th></tr>';