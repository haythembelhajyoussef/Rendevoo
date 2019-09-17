<?php

/**
 * @Entity @Table(name="domaine")
 * */
class Domaine extends Model {

    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $nom;

    /**
     * @OneToMany(targetEntity="Specialite", mappedBy="domaine", cascade={"persist","remove"})
     */
    private $specialite;

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getSpecialite() {
        return $this->specialite;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setSpecialite($specialite) {
        $this->specialite = $specialite;
    }

}
