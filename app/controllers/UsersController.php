<?php

class UsersController extends ControllerBase {
    
    public function indexAction() {
        $users = Users::find();
        $currentPage = $this->request->getQuery('page');
        
        $paginator = new Phalcon\Paginator\Adapter\Model(array(
            'data' => $users,
            'limit' => 1,
            'page' => $currentPage
        ));
        
        $page = $paginator->getPaginate();
        
        $this->view->setVar('users', $page);
        $this->view->setVar('title', 'Users');
    }
    
    public function loginAction() {
        $this->view->setVar('title', 'Login');
        
        if ($this->request->isPost()) {
            $userForm = $this->request->getPost();
            $user = Users::findFirstByEmail($userForm["email"]);
            
            if ($user && $user->password === md5($userForm["password"])) {
                $this->response->redirect('users');
            } else {
                $this->flash->error('Email or password is invalid');
            }
        }
    }
    
    public function registerAction() {
        $this->view->setVar('title', 'Register');
        
        if ($this->request->isPost()) {
            $user = new Users();

            $success = $user->save($this->request->getPost(), array('name', 'email', 'password'));
            
            if ($success) {
                $this->flash->success('Register successful.');
                $this->response->redirect('users/login');
            } else {
                $errors = array();
                
                foreach ($user->getMessages() as $message) {
                    $errors[] = $message->getMessage();
                }
                
                $this->view->setVar('validationErrors', $errors);
            }
        }
    }
}
