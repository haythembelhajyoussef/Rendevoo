<?php

/**
 * @Entity @Table(name="User")
 * */
class User extends Model {

    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /**
     * @Column(type="string", length=50)
     */
    protected $email;

    /**
     * @Column(type="string", length=50)
     */
    protected $password;

    /**
     * @Column(type="string", length=20)
     */
    protected $nom;

    /**
     * @Column(type="string", length=20)
     */
    protected $prenom;

    /**
     * @Column(type="string", length=4)
     */
    protected $codePostal;

    /**
     * @Column(type="string", length=32)
     */
    protected $adresse;

    /**
     * @Column(type="string", length=16)
     */
    protected $ville;

    /**
     * @Column(type="string", length=10)
     */
    protected $tel;

    /**
     * @Column(type="boolean")
     */
    protected $etat;

    /**
     * @Column(type="string", length=255)
     */
    protected $jeton;

    /**
     * @Column(type="array")
     */
    protected $role;

    /**
     * @Column(type="string")
     */
    protected $avatar;

    /**
     * @OneToOne(targetEntity="Client", mappedBy="user",cascade={"persist", "remove"})
     */
    protected $client;

    /**
     * @OneToOne(targetEntity="Professionnel", mappedBy="user", cascade={"persist","remove"})
     */
    protected $professionnel;

    /**
     * @OneToMany(targetEntity="Reclamation", mappedBy="source")
     */
    protected $reclamationEnvoyer;

    /**
     * @OneToMany(targetEntity="Reclamation", mappedBy="userReclame")
     */
    protected $reclamations;

    /**
     * @OneToMany(targetEntity="Rdv", mappedBy="user")
     */
    protected $rdvs;

    public function __construct() {
        $this->etat = false;
        $this->jeton = md5(uniqid());
        if ($this->avatar == "") {
            $this->avatar = 'assets/userImage/no-photo.png';
        }
    }

    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getEtat() {
        return $this->etat;
    }

    function getJeton() {
        return $this->jeton;
    }

    function getRole() {
        return $this->role;
    }

    function getClient() {
        return $this->client;
    }

    function getReclamationEnvoyer() {
        return $this->reclamationEnvoyer;
    }

    function getReclamations() {
        return $this->reclamations;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        if ($email == "") {
            $this->erreurs['email'] = " Adresse email vide! ";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->erreurs['email'] = " email non valide! ";
        }
        $this->email = $email;
    }

    function setPassword($password) {
        if (strlen($password) < 8) {
            $this->erreurs['password'] = " mot de passe faible! ";
        }
        $this->password = md5($password);
    }

    function setNom($nom) {
        if ($nom == "") {
            $this->erreurs['nom'] = " Nom vide ";
        }
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        if ($prenom == "") {
            $this->erreurs['prenom'] = " Prenom vide! ";
        }
        $this->prenom = $prenom;
    }

    function setEtat($etat) {
        $this->etat = $etat;
    }

    function setJeton($jeton) {
        $this->jeton = $jeton;
    }

    function setRole($role) {
        if ($role == "") {
            $this->erreurs['role'] = " Role vide! ";
        }
        $this->role = $role;
    }

    function setClient($client) {
        $this->client = $client;
    }

    function setReclamationEnvoyer($reclamationEnvoyer) {
        $this->reclamationEnvoyer = $reclamationEnvoyer;
    }

    function setReclamations($reclamations) {
        $this->reclamations = $reclamations;
    }

    function getCodePostal() {
        return $this->codePostal;
    }

    function setCodePostal($codePostal) {
        if ($codePostal == "") {
            $this->erreurs['codePostal'] = " Code postal vide! ";
        }
        if (filter_var($codePostal, FILTER_VALIDATE_INT) === false) {
            $this->erreurs['codePostal'] = " Code postal non valide! ";
        }
        $this->codePostal = $codePostal;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getVille() {
        return $this->ville;
    }

    function getTel() {
        return $this->tel;
    }

    function setAdresse($adresse) {
        if ($adresse == "") {
            $this->erreurs['adresse'] = " Adresse vide! ";
        }
        $this->adresse = $adresse;
    }

    function setVille($ville) {
        if ($ville == "") {
            $this->erreurs['ville'] = " Ville vide! ";
        }
        $this->ville = $ville;
    }

    function setTel($tel) {
        if ($tel == "") {
            $this->erreurs['tel'] = " Numéro de téléphone vide! ";
        }
        if (filter_var($tel, FILTER_VALIDATE_INT) === false) {
            $this->erreurs['tel'] = " Numéro de téléphone non valide! ";
        }
        $this->tel = $tel;
    }

    function getProfessionnel() {
        return $this->professionnel;
    }

    function setProfessionnel($professionnel) {
        $this->professionnel = $professionnel;
    }

    function getAvatar() {
        return $this->avatar;
    }

    function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    function getRdvs() {
        return $this->rdvs;
    }

    function setRdvs($rdvs) {
        $this->rdvs = $rdvs;
    }

}
