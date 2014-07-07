Access
==================

Library for use custom acl


Installation & Configuration
-------------

To install

    ppm install accesslist


Example to add library:
	
	$di->set('access', function(){
		$acl = new accesslist\Access();
		return $acl;
	});


Execute in controller

	// return true or false if your ip is in the list
	$this->access->check('Users');