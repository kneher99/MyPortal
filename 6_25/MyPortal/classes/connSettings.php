<?php

namespace MyPortal\Classes;

class connSettings
{
    public function fncConn() {

    	$connArray = array(
    		"data_source" => "MyPortal",
    		"username" => "PortalUser",
    		"password"  =>  "MAUf2a8Tg7DkjXWwtscv"
		);

		echo $connArray["data_source"];

	}
}

?>