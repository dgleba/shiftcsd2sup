<?php
/**
	* A delegate class for the entire application to handle custom handling of
	* some functions such as permissions and preferences.
	*/
class conf_ApplicationDelegate {
	/**
		* Returns permissions array.  This method is called every time an action is
		* performed to make sure that the user has permission to perform the action.
		* @param record A Dataface_Record object (may be null) against which we check
		*               permissions.
		* @see Dataface_PermissionsTool
		* @see Dataface_AuthenticationTool
		*/
	function getPermissions(&$record){
		$auth =& Dataface_AuthenticationTool::getInstance();
		$user =& $auth->getLoggedInUser();
		//
		// This returns permissions of ALL for admin, no access when there is no user, and by role if there is a user logged in. 2014-06-08. David Gleba.
		//
		if ( !isset($user) ){
			return Dataface_PermissionsTool::NO_ACCESS(); 				// if the user is null then nobody is logged in... no access. This will force a login prompt. 
		} else if ($user and $user->val('Role') == 'ADMIN'){
			return Dataface_PermissionsTool::ALL();						//returns all permissions if user is ADMIN
		} else {
			$role = $user->val('Role');
			return Dataface_PermissionsTool::getRolePermissions($role);  // Returns the permissions based on the user's current role.
		}
	}
	
	/* set default list view sort. this works with 1.3.2  but not with 1.5x . use stanza in index.php 2012-06-21
	function beforeHandleRequest(){
		$app = Dataface_Application::getInstance(); 
		$query =& $app->getQuery();
		if ( !$_POST and $query['-table'] == 'swi_log' and !@$query['-sort'] ){
			$query['-sort'] = 'Number desc';
		}
	}
	*/
	
	public function beforeHandleRequest(){
    	
		Dataface_Application::getInstance()
        ->addHeadContent(
            sprintf('<link rel="stylesheet" type="text/css" href="%s"/>',
                htmlspecialchars(DATAFACE_SITE_URL.'/stylexf2.css')
            )
        );
        
         //action to display dashboard...
        $app = & Dataface_Application::getInstance();
        $query = & $app->getQuery();
        if ($query['-table'] == 'dashboard' and ($query['-action'] == 'browse' or $query['-action'] == 'list')) {
            $query['-action'] = 'dashboard_action';
        }   
  }

   function block__custom_javascripts(){
        // Dataface_JavascriptTool::getInstance()->import('submithandler1.js');
        echo '<script src="js/handler-savesuccesshide.js" type="text/javascript" language="javascript"></script>';
        echo '<script src="js/handler-save1.js" type="text/javascript" language="javascript"></script>';
        echo '<script src="js/handler-c2_superv_send_email.js" type="text/javascript" language="javascript"></script>';        
        echo '<script src="js/handler-c2_pres_qual_send_email.js" type="text/javascript" language="javascript"></script>';		
        echo '<script src="js/handler-team_leader_send_email.js" type="text/javascript" language="javascript"></script>';
        echo '<script src="js/handler-send_email_test.js" type="text/javascript" language="javascript"></script>';
   }

}



