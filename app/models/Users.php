<?php

use Phalcon\Mvc\Model\Validator\PresenceOf,
    Phalcon\Mvc\Model\Validator\Email,
    Phalcon\Mvc\Model\Validator\Uniqueness;

class Users extends Phalcon\Mvc\Model {
    public function beforeSave() {
        $this->password = md5($this->password);
    }
    
    public function validation() {
        $this->validate(new PresenceOf(array(
            'field' => 'name',
            'message' => 'Name is required field'
        )));
        $this->validate(new PresenceOf(array(
            'field' => 'email',
            'message' => 'Email is required field'
        )));
        $this->validate(new Email(array(
            'field' => 'email',
            'message' => 'Email is invalid'
        )));
        $this->validate(new Uniqueness(array(
            'field' => 'email',
            'message' => 'Email already used by another user'
        )));
        $this->validate(new PresenceOf(array(
            'field' => 'password',
            'message' => 'Password is required'
        )));
        
        if ($this->validationHasFailed() == TRUE) {
            return FALSE;
        }
    }
}
