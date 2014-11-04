<?php

class Users extends Phalcon\Mvc\Model {
    public function beforeSave() {
        $this->password = md5($this->password);
    }
}
