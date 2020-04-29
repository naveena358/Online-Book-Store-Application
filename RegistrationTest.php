<?php
use PHPUnit\Framework\TestCase;

class RegistrationTest extends TestCase
{
	public function testUserRegistration()
	    {
			$this->assertTrue($this->verifyRegistration('john', 'john@test.com', '123'));
			$this->assertFalse($this->verifyRegistration('', '', '123'));
	        
	    }


	public function verifyRegistration($name, $email_id, $passwd) {
            $user_list = array();
			//$return = false;
			
			if(strlen($name)>0 && strlen($email_id)>0 && strlen($passwd)>0) {
				$user_list[] = array("name"=>$name, "email"=>$email_id, "password"=>$passwd);
				if(count($user_list)) {
				  $return = true;
				} 
				
			} else {
				$return = false;
			}
			
			
			return $return;
	    
	}

}

?>
