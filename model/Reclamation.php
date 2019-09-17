<?php

/**
 * @Entity 
 * @Table(name="reclamation")
 *
 */
class Reclamation extends Model {

    /**
     *  @Id 
     *  @Column(type="integer")
     *  @GeneratedValue 
     * 
     */
    private $id;

    /**
     * @Column(type="string", length=255)
     */
    private $titre;

    /**
     * @Column(type="text")
     */
    private $description;

    /**
     * @Column(type="datetime")
     */
    private $date;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="reclamationEnvoyer")
     */
    private $source;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="reclamations")
     */
    private $userReclame;

    function __construct($date) {
        $this->date = date("F-j-Y H:i:s");
    }

    function getId() {
        return $this->id;
    }

    function getTitre() {
        return $this->titre;
    }

    function getDescription() {
        return $this->description;
    }

    function getDate() {
        return $this->date;
    }

    function getSource() {
        return $this->source;
    }

    function getUserReclame() {
        return $this->userReclame;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setSource($source) {
        $this->source = $source;
    }

    function setUserReclame($userReclame) {
        $this->userReclame = $userReclame;
    }

}
