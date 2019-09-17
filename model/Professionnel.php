<?php

/**
 * @Entity @Table(name="Professionnel")
 * */
class Professionnel extends Model {

    /** @Id @Column(type="integer") @GeneratedValue * */
    private $id;

    /**
     * @Column(type="text")
     */
    private $description;

    /**
     * @OneToOne(targetEntity="Localisation", inversedBy="professionnel",cascade={"persist"})
     */
    protected $localisation;

    /**
     * @OneToOne(targetEntity="User", inversedBy="professionnel",cascade={"persist"})
     */
    private $user;

    /**
     * @ManyToOne(targetEntity="Specialite", inversedBy="professionnel")
     */
    protected $specialite;

    /**
     * @OneToOne(targetEntity="Calendrier", mappedBy="professionnel", cascade={"persist","remove"})
     */
    protected $calendrier;

    function getCalendrier() {
        return $this->calendrier;
    }

    function setCalendrier($calendrier) {
        $this->calendrier = $calendrier;
    }

    function getId() {
        return $this->id;
    }

    function getDescription() {
        return $this->description;
    }

    function getCodePostal() {
        return $this->codePostal;
    }

    function getLocalisation() {
        return $this->localisation;
    }

    function getUser() {
        return $this->user;
    }

    function getSpecialite() {
        return $this->specialite;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescription($description) {
        if ($description == "") {
            $this->erreurs['description'] = " Déscription vide! ";
        }
        $this->description = $description;
    }

    function setCodePostal($codePostal) {
        if ($codePostal == "") {
            $this->erreurs['codePostal'] = " Code postal vide! ";
        }
        $this->codePostal = $codePostal;
    }

    function setLocalisation($localisation) {
        $this->localisation = $localisation;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setSpecialite($specialite) {
        $this->specialite = $specialite;
    }

}
