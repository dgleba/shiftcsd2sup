<?php
class tables_sf_csd2_pres_qual
{
    
    function __sql__()
    {

        return "SELECT * , ( concat_ws('_', SUBSTRING(DATE_FORMAT(sfdate, '%Y-%m-%d_%H.%i'), 1, 17), SUBSTRING(sfshift, 1, 4), SUBSTRING(reportedby, 1, 6)))  as record_name   FROM `sf_csd2_pres_qual`  order by createdtime desc";

    }
    

}
