<?php

/**
 * @Entity @Table(name="tempsTravail")
 * */
class TempsTravail extends Model {

    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /**
     * @ManyToOne(targetEntity="Calendrier", inversedBy="tempsTravail")
     */
    protected $calendrier;

    /**
     * @Column(type="string", length=10)
     */
    private $jour;

    /**
     * @Column(type="time")
     */
    private $heureDebut;

    /**
     * @Column(type="time")
     */
    private $heureFin;

    function getId() {
        return $this->id;
    }

    function getCalendrier() {
        return $this->calendrier;
    }

    function getJour() {
        return $this->jour;
    }

    function getHeureDebut() {
        return $this->heureDebut;
    }

    function getHeureFin() {
        return $this->heureFin;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCalendrier($calendrier) {
        $this->calendrier = $calendrier;
    }

    function setJour($jour) {
        $this->jour = $jour;
    }

    function setHeureDebut($heureDebut) {
        $this->heureDebut = $heureDebut;
    }

    function setHeureFin($heureFin) {
        $this->heureFin = $heureFin;
    }

}
