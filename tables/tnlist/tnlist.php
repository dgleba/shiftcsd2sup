<?php

class tables_tnlist {
    /* This function orders all tables by date_done, issues_when, and then id in the priority as 
      listed (i.e. primary, secondary, tertiary sort respectively) */

    function __sql__() {
        return "SELECT *    FROM `tnlist`     order by date_done asc, actions_priority asc, issues_when desc, id desc";
        //return "SELECT *       FROM `tnlist`               order by date_done asc,  issues_when desc, id desc"; 
    }

    /*
      Inserts content at beginning of left column of application.
      i.e. replaces {block name="after_table_actions"} tag.
     */

    function block__after_table_actions() {

        //This is a group of commonly used action links arranged in a compact space... 
        //2014-07-10

        $app = & Dataface_Application::getInstance();  // reference to Dataface_Application object

        echo '<head>
			<!-- 2014-10-17 David Gleba commented out this decorative box.
			<style>
			div.ex {
				padding: 0px;
				border: 4px solid #bbccff;
				margin: 0px;
			}
			</style> -->
			</head>';

         /*
            2014-10-17 David Gleba made changes to the url calls below. 
            mostly add -action=list& so that that those items are preserved in the url on clicks. 
			
            2014-11-28 David Gleba 
            Changed to Twitter Bootstrap accordion style panels
            Needs g2responsive module active for it to work.
         */
        
        echo
        '<div id="after_tbl_actions">'
     .   '<div class="list-group panel">'
     .     '<a href="#gf6input" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#after_tbl_actions">GF6 Input Menu...</a>'
     .    ' <div class="collapse" id="gf6input">'
     .    '   <a href="' . $app->url('-action=list&cell=GF6Input&category=Machine&type=Issue&date_done==') . '" class="list-group-item">Machine Issues</a>'
     .    '   <a href="' . $app->url('-action=list&cell=GF6Input&category=Material&type=Issue&date_done==') . '" class="list-group-item">Material Issues</a>'
     .    '   <a href="' . $app->url('-action=list&cell=GF6Input&category=Method/People/Training&type=Issue&date_done==') . '" class="list-group-item">Method Issues</a>'
     .    '   <a href="' . $app->url('-action=list&cell=GF6Input&category=Quality/Measurement&type=Issue&date_done==') . '" class="list-group-item">Quality Issues</a>'
	 .    '   <a href="' . $app->url('-action=list&cell=GF6Input&category=5S&type=Issue&date_done==') . '" class="list-group-item">5S Issues</a>'
	 .    '   <a href="' . $app->url('-action=list&cell=GF6Input&category=Safety&type=Issue&date_done==') . '" class="list-group-item">Safety Issues</a>'
	 .    '   <a href="' . $app->url('-action=list&cell=GF6Input&type=Idea&actions_who==&date_done==') . '" class="list-group-item">Ideas</a>'
	 .    '   <a href="' . $app->url('-action=list&cell=GF6Input&type=Idea&actions_who=>&date_done==') . '" class="list-group-item">Actions</a>'
	 .    '   <a href="' . $app->url('-action=list&cell=GF6Input&date_done=>&-sort=date_done desc') . '" class="list-group-item">Actions Done</a>'
     .    ' </div>'
	 .     '<a href="#trilobe" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#after_tbl_actions">Trilobe ...</a>'
     .    ' <div class="collapse" id="trilobe">'
     .    '   <a href="' . $app->url('-action=list&cell=trilobe&category=Machine&type=Issue&date_done==') . '" class="list-group-item">Machine Issues</a>'
     .    '   <a href="' . $app->url('-action=list&cell=trilobe&category=Material&type=Issue&date_done==') . '" class="list-group-item">Material Issues</a>'
     .    '   <a href="' . $app->url('-action=list&cell=trilobe&category=Method/People/Training&type=Issue&date_done==') . '" class="list-group-item">Method Issues</a>'
     .    '   <a href="' . $app->url('-action=list&cell=trilobe&category=Quality/Measurement&type=Issue&date_done==') . '" class="list-group-item">Quality Issues</a>'
	 .    '   <a href="' . $app->url('-action=list&cell=trilobe&category=5S&type=Issue&date_done==') . '" class="list-group-item">5S Issues</a>'
	 .    '   <a href="' . $app->url('-action=list&cell=trilobe&category=Safety&type=Issue&date_done==') . '" class="list-group-item">Safety Issues</a>'
	 .    '   <a href="' . $app->url('-action=list&cell=trilobe&type=Idea&actions_who==&date_done==') . '" class="list-group-item">Ideas</a>'
	 .    '   <a href="' . $app->url('-action=list&cell=trilobe&type=Idea&actions_who=>&date_done==') . '" class="list-group-item">Actions</a>'
	 .    '   <a href="' . $app->url('-action=list&cell=trilobe&date_done=>&-sort=date_done desc') . '" class="list-group-item">Actions Done</a>'
     .    ' </div>'
	 .     '<a href="#optimized" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#after_tbl_actions">Optimized ...</a>'
     .    ' <div class="collapse" id="optimized">'
     .    '   <a href="' . $app->url('-action=list&cell=optimized&category=Machine&type=Issue&date_done==') . '" class="list-group-item">Machine Issues</a>'
     .    '   <a href="' . $app->url('-action=list&cell=optimized&category=Material&type=Issue&date_done==') . '" class="list-group-item">Material Issues</a>'
     .    '   <a href="' . $app->url('-action=list&cell=optimized&category=Method/People/Training&type=Issue&date_done==') . '" class="list-group-item">Method Issues</a>'
     .    '   <a href="' . $app->url('-action=list&cell=optimized&category=Quality/Measurement&type=Issue&date_done==') . '" class="list-group-item">Quality Issues</a>'
	 .    '   <a href="' . $app->url('-action=list&cell=optimized&category=5S&type=Issue&date_done==') . '" class="list-group-item">5S Issues</a>'
	 .    '   <a href="' . $app->url('-action=list&cell=optimized&category=Safety&type=Issue&date_done==') . '" class="list-group-item">Safety Issues</a>'
	 .    '   <a href="' . $app->url('-action=list&cell=optimized&type=Idea&actions_who==&date_done==') . '" class="list-group-item">Ideas</a>'
	 .    '   <a href="' . $app->url('-action=list&cell=optimized&type=Idea&actions_who=>&date_done==') . '" class="list-group-item">Actions</a>'
	 .    '   <a href="' . $app->url('-action=list&cell=optimized&date_done=>&-sort=date_done desc') . '" class="list-group-item">Actions Done</a>'
     .    ' </div>'
	 .     '<a href="#general" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#after_tbl_actions">General Menu...</a>'
     .    ' <div class="collapse" id="general">'
     .    '   <a href="' . $app->url('-sort=id+desc') . '" class="list-group-item">Sort ID desc</a>'
     .    '   <a href="' . $app->url('-sort=date_done+desc') . '" class="list-group-item">Sort Date Done Desc</a>'
     .    '   <a href="' . $app->url('-sort=updatedtime+desc') . '" class="list-group-item">Sort Updatedtime Desc</a>'
     .    '   <a href="' . $app->url('-actions=list&actions_who=maint&date_done==') . '" class="list-group-item">Open Maintenance Items</a>'
	 .    '   <a href="' . $app->url('-sort=id+asc&date_done==') . '" class="list-group-item">Open Items, ID asc</a>'
	 .    '   <a href="' . $app->url('-actions=list&summary_category=>') . '" class="list-group-item">SummryCatgry notblank</a>'
	 .    '   <a href="' . $app->url('-actions=list&summary_category=>&date_done=>&-sort=id+desc') . '" class="list-group-item">SummryCatgry Closed</a>'
     .    ' </div>'
     .  ' </div>'
     .  ' </div>'
        ;
        
        
    }   
        
}       
        