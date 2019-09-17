<?php

/**
 * @Entity @Table(name="notification")
 * */
class Notification extends Model{

    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /**
     * @Column(type="boolean")
     */
    protected $etat;

    /**
     * @Column(type="text")
     */
    protected $message;

    /**
     * @Column(type="datetime")
     */
    protected $date;

    /**
     * @ManyToOne(targetEntity="user", inversedBy="notification")
     */
    protected $user;
    
    function getId() {
        return $this->id;
    }

    function getEtat() {
        return $this->etat;
    }

    function getMessage() {
        return $this->message;
    }

    function getDate() {
        return $this->date;
    }

    function getUser() {
        return $this->user;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEtat($etat) {
        $this->etat = $etat;
    }

    function setMessage($message) {
        $this->message = $message;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setUser($user) {
        $this->user = $user;
    }


}
