<?php

class tables_tnlist {
    /* This function orders all tables by date_done, issues_when, and then id in the priority as 
      listed (i.e. primary, secondary, tertiary sort respectively) */

function __sql__() {
return "SELECT * , CASE 
      WHEN summary_category IS NULL 
         THEN '.'
      WHEN summary_category like '%ContinuousImprovement%'
      AND summary_category like '%LessonsLearned%'
         THEN 'CL'
      WHEN summary_category like '%ContinuousImprovement%'
         THEN 'C'
      WHEN summary_category like '%LessonsLearned%'
         THEN 'L'
      WHEN summary_category IS NOT NULL 
         THEN ',' 
      ELSE '?' 
     END 
   AS 'cl'      
   FROM `tnlist`     
   order by date_done asc, actions_priority asc, issues_when desc, id desc";
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
          */

        echo '<div class="ex"><h5>GF6 Input</h5>'
        . '<ul style"line-height:1em"><li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=GF6Input&category=Machine&type=Issue&date_done==') . '>Machine Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=GF6Input&category=Material&type=Issue&date_done==') . '>Material Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=GF6Input&category=Method/People/Training&type=Issue&date_done==') . '>Method Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=GF6Input&category=Quality/Measurement&type=Issue&date_done==') . '>Quality Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=GF6Input&category=5S&type=Issue&date_done==') . '>5S Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=GF6Input&category=Safety&type=Issue&date_done==') . '>Safety Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=GF6Input&type=Idea&actions_who==&date_done==') . '>Ideas</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=GF6Input&type=Idea&actions_who=>&date_done==') . '>Actions</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=GF6Input&date_done=>&-sort=date_done desc') . '>Actions Done</a></ul>'
        . '<h5>Trilobe</h5>'
        . '<ul style"line-height:1em"><li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=trilobe&category=Machine&type=Issue&date_done==') . '>Machine Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=trilobe&category=Material&type=Issue&date_done==') . '>Material Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=trilobe&category=Method/People/Training&type=Issue&date_done==') . '>Method Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=trilobe&category=Quality/Measurement&type=Issue&date_done==') . '>Quality Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=trilobe&category=5S&type=Issue&date_done==') . '>5S Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=trilobe&category=Safety&type=Issue&date_done==') . '>Safety Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=trilobe&type=Idea&actions_who==&date_done==') . '>Ideas</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=trilobe&type=Idea&actions_who=>&date_done==') . '>Actions</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=trilobe&date_done=>&-sort=date_done desc') . '>Actions Done</a></ul></div>'
        . '<h5>Optimized</h5>'
        . '<ul style"line-height:1em"><li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=optimized&category=Machine&type=Issue&date_done==') . '>Machine Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=optimized&category=Material&type=Issue&date_done==') . '>Material Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=optimized&category=Method/People/Training&type=Issue&date_done==') . '>Method Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=optimized&category=Quality/Measurement&type=Issue&date_done==') . '>Quality Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=optimized&category=5S&type=Issue&date_done==') . '>5S Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=optimized&category=Safety&type=Issue&date_done==') . '>Safety Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=optimized&type=Idea&actions_who==&date_done==') . '>Ideas</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=optimized&type=Idea&actions_who=>&date_done==') . '>Actions</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-action=list&cell=optimized&date_done=>&-sort=date_done desc') . '>Actions Done</a></ul></div>'
        . '<h5>General</h5>'
        . '<ul style"line-height:1em"><li style="margin: .2em 0"><a href=' . $app->url('-sort=id+desc') . '>Sort ID desc</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-sort=date_done+desc') . '>Sort Date Done Desc</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-sort=updatedtime+desc') . '>Sort Updatedtime Desc</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-actions=list&actions_who=maint&date_done==') . '>Open Maintenance Items</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-sort=id+asc&date_done==') . '>Open Items, ID asc</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-actions=list&summary_category=>') . '>SummryCatgry notblank</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-actions=list&summary_category=>&date_done=>&-sort=id+desc') . '>SummryCatgry Closed</a>'
        ;
    }

}
