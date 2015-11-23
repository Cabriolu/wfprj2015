
<?php


class ProfielController extends Controller{
    
    public function index($name =''){
        $user = $this->model('User');
        $user->name = $name;
       //home index view
        $this->view('Header',[]);
        $this->view('Profil/Profielview',[]);
        $this->view('Footer',[]);
    }
}



