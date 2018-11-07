<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConfigRepository")
 */
class Config
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    //basic settings
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $email = null;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $phone = null;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $title = null;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $headertitle = null;

    //about settings
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $abouttitle = null;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $aboutdescription = null;
    
    //how it works settings
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $workstitle = null;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $worksdescription = null;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $worksobserving = null;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $worksinterpreting = null;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $worksliving = null;
    
    //seven c's settings
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $seventitle = null;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sevenconfering = null;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sevencreating = null;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sevencapitalizing = null;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sevencontracting = null;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sevenconstructing = null;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sevencelebrating = null;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sevencommunity = null;
    
    //founder settings
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $foundertitle = null;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $founderdescription = null;
    
    //contact settings
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $contacttitle = null;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contactdescription = null;
    
    private $aboutWordCount = 30;
    private $worksWordCount = 60;
    private $founderWordCount = 75;
    public function getId(): int
    {
        return $this->id;
    }
    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getHeadertitle() {
        return $this->headertitle;
    }

    public function getAbouttitle() {
        return $this->abouttitle;
    }

    public function getAboutdescription() {
        return $this->aboutdescription;
    }
    
    public function getAboutdescriptionshort()
    {
        return $this->limit_text($this->aboutdescription, $this->aboutWordCount);
    }
    
    private function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }

    public function getWorkstitle() {
        return $this->workstitle;
    }

    public function getWorksdescription() {
        return $this->worksdescription;
    }
    
    public function getWorksdescriptionshort()
    {
        return $this->limit_text($this->worksdescription, $this->worksWordCount);
    }

    public function getWorksobserving() {
        return $this->worksobserving;
    }

    public function getWorksinterpreting() {
        return $this->worksinterpreting;
    }

    public function getWorksliving() {
        return $this->worksliving;
    }

    public function getSeventitle() {
        return $this->seventitle;
    }

    public function getSevenconfering() {
        return $this->sevenconfering;
    }

    public function getSevencreating() {
        return $this->sevencreating;
    }

    public function getSevencapitalizing() {
        return $this->sevencapitalizing;
    }

    public function getSevencontracting() {
        return $this->sevencontracting;
    }

    public function getSevenconstructing() {
        return $this->sevenconstructing;
    }

    public function getSevencelebrating() {
        return $this->sevencelebrating;
    }

    public function getSevencommunity() {
        return $this->sevencommunity;
    }

    public function getFoundertitle() {
        return $this->foundertitle;
    }

    public function getFounderdescription() {
        return $this->founderdescription;
    }
    
    public function getFounderdescriptionshort()
    {
        return $this->limit_text($this->founderdescription, $this->founderWordCount);
    }

    public function getContacttitle() {
        return $this->contacttitle;
    }

    public function getContactdescription() {
        return $this->contactdescription;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setHeadertitle($headertitle) {
        $this->headertitle = $headertitle;
    }

    public function setAbouttitle($abouttitle) {
        $this->abouttitle = $abouttitle;
    }

    public function setAboutdescription($aboutdescription) {
        $this->aboutdescription = $aboutdescription;
    }

    public function setWorkstitle($workstitle) {
        $this->workstitle = $workstitle;
    }

    public function setWorksdescription($worksdescription) {
        $this->worksdescription = $worksdescription;
    }

    public function setWorksobserving($worksobserving) {
        $this->worksobserving = $worksobserving;
    }

    public function setWorksinterpreting($worksinterpreting) {
        $this->worksinterpreting = $worksinterpreting;
    }

    public function setWorksliving($worksliving) {
        $this->worksliving = $worksliving;
    }

    public function setSeventitle($seventitle) {
        $this->seventitle = $seventitle;
    }

    public function setSevenconfering($sevenconfering) {
        $this->sevenconfering = $sevenconfering;
    }

    public function setSevencreating($sevencreating) {
        $this->sevencreating = $sevencreating;
    }

    public function setSevencapitalizing($sevencapitalizing) {
        $this->sevencapitalizing = $sevencapitalizing;
    }

    public function setSevencontracting($sevencontracting) {
        $this->sevencontracting = $sevencontracting;
    }

    public function setSevenconstructing($sevenconstructing) {
        $this->sevenconstructing = $sevenconstructing;
    }

    public function setSevencelebrating($sevencelebrating) {
        $this->sevencelebrating = $sevencelebrating;
    }

    public function setSevencommunity($sevencommunity) {
        $this->sevencommunity = $sevencommunity;
    }

    public function setFoundertitle($foundertitle) {
        $this->foundertitle = $foundertitle;
    }

    public function setFounderdescription($founderdescription) {
        $this->founderdescription = $founderdescription;
    }

    public function setContacttitle($contacttitle) {
        $this->contacttitle = $contacttitle;
    }

    public function setContactdescription($contactdescription) {
        $this->contactdescription = $contactdescription;
    }


}