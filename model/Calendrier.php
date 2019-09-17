<?php

/**
 * @Entity @Table(name="Calendrier")
 * */
class Calendrier {

    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /**
     * @OneToOne(targetEntity="Professionnel", inversedBy="calendrier", cascade={"persist","remove"})
     */
    protected $professionnel;

    /**
     * @OneToMany(targetEntity="TempsTravail", mappedBy="calendrier")
     */
    protected $tempsTravail;

    /**
     * @OneToMany(targetEntity="Rdv", mappedBy="calendrier", cascade={"persist","remove"})
     */
    private $rdvs;

    /**
     * @Column(type="integer")
     */
    private $duree;

    function getId() {
        return $this->id;
    }

    function getProfessionnel() {
        return $this->professionnel;
    }

    function getTempsTravail() {
        return $this->tempsTravail;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setProfessionnel($professionnel) {
        $this->professionnel = $professionnel;
    }

    function setTempsTravail($tempsTravail) {
        $this->tempsTravail = $tempsTravail;
    }

    function getRdvs() {
        return $this->rdvs;
    }

    function getDuree() {
        return $this->duree;
    }

    function setRdvs($rdvs) {
        $this->rdvs = $rdvs;
    }

    function setDuree($duree) {
        $this->duree = $duree;
    }

}
