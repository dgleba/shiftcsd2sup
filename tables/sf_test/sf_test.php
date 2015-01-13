<?php
class tables_sf_test
{
    function __sql__()
    {
        return "SELECT * 
      FROM `sf_test` 
      order by updatedtime desc";
    }

    function block__after_table_actions() {

        //This is a group of commonly used action links arranged in a compact space... 
        //2014-07-10
        $app = & Dataface_Application::getInstance();  // reference to Dataface_Application object
        echo
         //http://stackoverflow.com/questions/6670002/php-get-dropdown-value-and-text
         '<div class="ex"><h5>Click below then filter by Cell</h5>'
         . '<select id="cellpick" name="cellpick">'
         . '<option value="0">--Select Cell--</option>'
         . '<option value="GF6Input">GF6Input</option>'
         . '<option value="Trilobe">Trilobe</option>'
         . '<option value="cow">Cow</option>'
         . '</select>'
         ;
         if($_POST['submit'])
           {
           $cellpick=$_POST['cellpick']; 
           }

        echo 
         '<ul style"line-height:1em"><li style="margin: .2em 0"><a href=' . $app->url('-actions=list&cell=' . $cellpick . '&category=Machine&type=Issue&date_done==') . '>Machine Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-actions=list&category=Material&type=Issue&date_done==') . '>Material Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-actions=list&category=Method/People/Training&type=Issue&date_done==') . '>Method Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-actions=list&category=Quality/Measurement&type=Issue&date_done==') . '>Quality Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-actions=list&category=5S&type=Issue&date_done==') . '>5S Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-actions=list&category=Safety&type=Issue&date_done==') . '>Safety Issues</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-actions=list&type=Idea&actions_who==&date_done==') . '>Ideas</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-actions=list&type=Idea&actions_who=>&date_done==') . '>Actions</a>'
        . '<li style="margin: .2em 0"><a href=' . $app->url('-actions=list&date_done=>&-sort=date_done desc') . '>Actions Done</a></ul>'
        
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
