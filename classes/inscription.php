<?php
class Inscription {
    //attribut
    private $id_user;
    private $nom;
    private $prenom;
    private $emai;
    private $user_password;
    private $role;

    //construct
    public function __construct($id_user, $nom, $prenom, $emai, $user_password, $role) {
        $this->id_user = $id_user;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->emai = $emai;
        $this->user_password = $user_password;
        $this->role = $role;
}
public function inscription (){
}
}
?>