<?php

/**
 * @Entity 
 * @Table(name="client")
 *
 */
class Client {

    /**
     *  @Id 
     *  @Column(type="integer")
     *  @GeneratedValue 
     * 
     */
    private $id;

    /**
     * @OneToOne(targetEntity="User", inversedBy="client", cascade={"persist","remove"})
     */
    private $user;

    function getId() {
        return $this->id;
    }

    function getUser() {
        return $this->user;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUser($user) {
        $this->user = $user;
    }

}
