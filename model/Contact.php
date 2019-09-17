<?php

/**
 * @Entity 
 * @Table(name="contact")
 *
 */
class Contact extends Model {

    /**
     *  @Id 
     *  @Column(type="integer")
     *  @GeneratedValue 
     * 
     */
    private $id;

    /**
     * @Column(type="string", length=50)
     */
    private $email;

    /**
     * @Column(type="string", length=50)
     */
    private $nom;

    /**
     * @Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @Column(type="string", length=20)
     */
    private $sujet;

    /**
     * @Column(type="text")
     */
    private $contenu;

    /**
     * @Column(type="boolean")
     */
    private $etat;

    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getSujet() {
        return $this->sujet;
    }

    function getContenu() {
        return $this->contenu;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setSujet($sujet) {
        $this->sujet = $sujet;
    }

    function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    function getEtat() {
        return $this->etat;
    }

    function setEtat($etat) {
        $this->etat = $etat;
    }

}
