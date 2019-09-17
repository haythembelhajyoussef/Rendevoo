<?php

/**
 * @Entity 
 * @Table(name="rdv")
 *
 */
class rdv extends Model{

    /**
     *  @Id 
     *  @Column(type="integer")
     *  @GeneratedValue 
     * 
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $etat;

    /**
     * @Column(type="date")
     */
    private $date;

    /**
     * @Column(type="time")
     */
    private $heure_debut;

    /**
     * @Column(type="time")
     */
    private $heure_fin;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="rdvs")
     */
    private $user;

    /**
     * @ManyToOne(targetEntity="Calendrier", inversedBy="rdvs", cascade={"persist","remove"})
     */
    private $calendrier;

    function getId() {
        return $this->id;
    }

    function getEtat() {
        return $this->etat;
    }

    function getDate() {
        return $this->date;
    }

    function getProfessionnel() {
        return $this->professionnel;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getHeure_debut() {
        return $this->heure_debut;
    }

    function getHeure_fin() {
        return $this->heure_fin;
    }

    function getCalendrier() {
        return $this->calendrier;
    }

    function setHeure_debut($heure_debut) {
        $this->heure_debut = $heure_debut;
    }

    function setHeure_fin($heure_fin) {
        $this->heure_fin = $heure_fin;
    }

    function setCalendrier($calendrier) {
        $this->calendrier = $calendrier;
    }

    function setEtat($etat) {
        $this->etat = $etat;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setProfessionnel($professionnel) {
        $this->professionnel = $professionnel;
    }

    function getUser() {
        return $this->user;
    }

    function setUser($user) {
        $this->user = $user;
    }

}
