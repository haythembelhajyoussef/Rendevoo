<?php

/**
 * @Entity 
 * @Table(name="suggestion")
 *
 */
class Suggestion extends Model {

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
    private $nomprof;

    /**
     * @Column(type="string", length=50)
     */
    private $domaine;

    /**
     * @Column(type="integer")
     */
    private $tel;

    /**
     * @OneToOne(targetEntity="Client", mappedBy="suggestion")
     */
    private $client;

    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getDomaine() {
        return $this->domaine;
    }

    function getTel() {
        return $this->tel;
    }

    function getClient() {
        return $this->client;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        if ($email == "") {
            $this->erreurs['email'] = " Adresse email vide! ";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->erreurs['email'] = " Adresse email non valide! ";
        }
        $this->email = $email;
    }

    function setDomaine($domaine) {
        if ($domaine == "") {
            $this->erreurs['domaine'] = " Domaine vide! ";
        }
        $this->domaine = $domaine;
    }

    function setTel($tel) {
        if ($tel == "") {
            $this->erreurs['tel'] = " Numéro de téléphone est vide! ";
        }
        if (filter_var($tel, FILTER_VALIDATE_INT) === false) {
            $this->erreurs['tel'] = " Numéro de téléphone non valide! ";
        }
        $this->tel = $tel;
    }

    function setClient($client) {
        $this->client = $client;
    }

    function getNomprof() {
        return $this->nomprof;
    }

    function setNomprof($nomprof) {
        if ($nomprof == "") {
            $this->erreurs['nomprof'] = " Le nom de votre professionnel est vide! ";
        }
        $this->nomprof = $nomprof;
    }

}
