<?php
class actions_team_leader_print {
    function handle(&$params){
        $app =& Dataface_Application::getInstance();
        $query =& $app->getQuery();
        $query['-skip'] = 0;
        $query['-limit'] = 10000;
		
        if ( $query['-table'] != 'sf_team_leader' ){
            return PEAR::raiseError('This action can only be called on the Team Leader table.');
        }
        
        $sf_team_leader = df_get_records_array('sf_team_leader', $query); 
	
		
	
        echo '<table border="3">'
			.'<style>table{min-width:2000px}</style>'
			.'<style>th{height:50px;background-color:#B2B2B2}</style>'
            .'<tr><th style="min-width:80px">Submission Date</th>'
			.'<th style="min-width:80px">Shift Reported</th>'
			.'<th style="min-width:80px">Reported By</th>'
			.'<th style="min-width:50px">Cell</th>'
			.'<th style="min-width:250px">Machine Issues</th>'
			.'<th style="min-width:250px">Material Issues</th>'
			.'<th style="min-width:250px">Methods and People Issues</th>'
			.'<th style="min-width:250px">5S Issues</th>'
			.'<th style="min-width:250px">Quality and Measurement Issues</th>'
			.'<th style="min-width:250px">Safety Issues</th>'
			.'<th style="min-width:250px">Training Issues</th>'
			.'<th style="min-width:250px">Actions</th>'
			.'<th style="min-width:250px">Ideas</th>'
			.'<th style="min-width:250px">Completed</th>'
			.'<th style="min-width:250px">Miscellaneous</th>'
			.'<th style="min-width:50px">Last Updated</th>'
			.'<th style="min-width:50px">Date Created</th>'
			.'<th style="min-width:50px">ID</th></tr>';
			//.'</table>';
			
		foreach ($sf_team_leader as $rrecord){
			
			echo //'<table border="1">'
				'<style>td{padding:5px; text-align: left;position: relative}table{border-collapse:collapse;}</style>'
				.'<tr><td>'.$rrecord->htmlValue('sfdate').'</td>'
				.'<td>'.$rrecord->htmlValue('sfshift').'</td>'
				.'<td>'.$rrecord->htmlValue('reportedby').'</td>'
				.'<td>'.$rrecord->htmlValue('cell').'</td>'
				.'<td>'.$rrecord->htmlValue('machine').'</td>'
				.'<td>'.$rrecord->htmlValue('material').'</td>'
				.'<td>'.$rrecord->htmlValue('method_and_people').'</td>'
				.'<td>'.$rrecord->htmlValue('5s').'</td>'
				.'<td>'.$rrecord->htmlValue('quality_and_measurment').'</td>'
				.'<td>'.$rrecord->htmlValue('safety').'</td>'
				.'<td>'.$rrecord->htmlValue('training').'</td>'
				.'<td>'.$rrecord->htmlValue('actions').'</td>'
				.'<td>'.$rrecord->htmlValue('ideas').'</td>'
				.'<td>'.$rrecord->htmlValue('completed').'</td>'
				.'<td>'.$rrecord->htmlValue('miscellaneous').'</td>'
				.'<td>'.$rrecord->htmlValue('updatedtime').'</td>'
				.'<td>'.$rrecord->htmlValue('createdtime').'</td>'
				.'<td>'.$rrecord->htmlValue('sfid').'</td></tr>';
				//.'</table>';
		
		}
		
		echo '</table>';
			


			
			//.'<tr><th>Submission Date</th><td>'.$rrecord->htmlValue('sfdate').'</td>'
			//.'<th>Shift Reported</th><td>'.$rrecord->htmlValue('sfshift').'</td>'
			//.'<th>Reported By</th><td>'.$rrecord->htmlValue('reportedby').'</td>'
			//.'<th>Cell</th><td>'.$rrecord->htmlValue('cell').'</td>'
			//.'<th>Machine Issues</th><td>'.$rrecord->htmlValue('machine').'</td>'
			//.'<th>Material Issues</th><td>'.$rrecord->htmlValue('material').'</td>'
			//.'<th>Method and People Issues</th><td>'.$rrecord->htmlValue('method_and_people').'</td>'
			//.'<th>5S Issues</th><td>'.$rrecord->htmlValue('5s').'</td>'
			//.'<th>Quality and Measurement Issues</th><td>'.$rrecord->htmlValue('quality_and_measurment').'</td>'
			//.'<th>Safety Issues</th><td>'.$rrecord->htmlValue('safety').'</td>'
			//.'<th>Training Issues</th><td>'.$rrecord->htmlValue('training').'</td>'
			//.'<th>Actions</th><td>'.$rrecord->htmlValue('actions').'</td>'
			//.'<th>Ideas</th><td>'.$rrecord->htmlValue('ideas').'</td>'
			//.'<th>Completed</th><td>'.$rrecord->htmlValue('completed').'</td>'
			//.'<th>Miscellaneous</th><td>'.$rrecord->htmlValue('miscellaneous').'</td>'
			//.'<th>Last Updated</th><td>'.$rrecord->htmlValue('updatedtime').'</td>'
			//.'<th>Date Created</th><td>'.$rrecord->htmlValue('createdtime').'</td>'
			//.'<th>ID</th><td>'.$rrecord->htmlValue('sfid').'</td></tr>'	
            
			
			
			
			
			
        
    }
}