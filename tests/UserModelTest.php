<?php

namespace Test;

class UserModel extends \UnitTestCase
{

    public $userData = array(
        'True' => array(
            'name' => 'User True',
            'email' => 'true@gmail.com',
            'password' => '123456'
        ),
        'False' => array(
            'name' => 'False',
            'email' => 'false.com',
            'password' => '123456'
        )
    );
    
    public function testUserValidation()
    {
        $user = new \Users();
        
        $this->assertTrue($user->save($this->userData['True']));
        $this->assertFalse($user->save($this->userData['False']));
        
        $messages = $user->getMessages();
        $this->assertEquals($messages[0]->getField(), 'email');
        
        $userInfo = \Users::findFirstByEmail('true@gmail.com');
        $this->assertEquals($userInfo->name, 'User True');
    }

}
