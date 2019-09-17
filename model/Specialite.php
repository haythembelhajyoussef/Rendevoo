<?php

/**
 * @Entity 
 * @Table(name="specialite")
 *
 */
class Specialite extends Model {

    /**
     *  @Id 
     *  @Column(type="integer")
     *  @GeneratedValue 
     * 
     */
    protected $id;

    /**
     * @Column(type="string", length=20)
     */
    protected $nom;

    /**
     * @ManyToOne(targetEntity="Domaine", inversedBy="specialite")
     */
    protected $domaine;

    /**
     * @OneToMany(targetEntity="Professionnel", mappedBy="specialite", cascade={"persist","remove"})
     */
    protected $professionnel;

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getDomaine() {
        return $this->domaine;
    }

    function getProfessionnel() {
        return $this->professionnel;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setDomaine($domaine) {
        $this->domaine = $domaine;
    }

    function setProfessionnel($professionnel) {
        $this->professionnel = $professionnel;
    }

}
