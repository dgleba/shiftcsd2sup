<?php
class tables_sf_team_leader
{
    
    function __sql__()
    {
        return "SELECT *       FROM `sf_team_leader`       order by createdtime desc";
    }
    

}
