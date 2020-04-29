<?php
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
	public function testUserLogin()
	
	    {
			$this->assertSame("false", $this->verifyLogin('john1@jnm.com', '123'));

			$this->assertSame("true", $this->verifyLogin('chris@chs.com', 'pwd456'));
			//$this->assertSame("true", $this->verifyLogin('chris1@chs.com', 'pwd456'));
                    			
	    }
	public function verifyLogin($user, $passwd) {
	    $valid = "false";
		$valid_users = array("john@jnm.com"=>"123", "chris@chs.com"=>"pwd456");
		$k=0;
	    foreach ($valid_users as $key => $value) {
			if($key==$user && $value==$passwd) {
				 $k++;
			}
			 
		}
		
		if($k>0) { $valid = "true"; }
		
		return $valid;
	}
}
?>
