<?php

/**
 * @Entity 
 * @Table(name="localisation")
 *
 */
class Localisation extends Model {

    /**
     *  @Id 
     *  @Column(type="integer")
     *  @GeneratedValue 
     * 
     */
    private $id;

    /**
     * @Column(type="float")
     */
    private $longetude;

    /**
     * @Column(type="float")
     */
    private $latitude;
    
    
    
    /**
     * @OneToOne(targetEntity="Professionnel", mappedBy="localisation",cascade={"persist"})
     */
    private $professionnel;

    function getId() {
        return $this->id;
    }

    function getLongetude() {
        return $this->longetude;
    }

    function getLatitude() {
        return $this->latitude;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLongetude($longetude) {
        $this->longetude = $longetude;
    }

    function setLatitude($latitude) {
        $this->latitude = $latitude;
    }


}
