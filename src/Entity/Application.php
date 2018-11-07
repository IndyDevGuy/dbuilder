<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ApplicationRepository")
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks
 */
class Application
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="application_resume", fileNameProperty="resume")
     * 
     * @var File
     */
    private $resumeFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $resume;
    
    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $zip;

    /**
     * @ORM\Column(type="integer")
     */
    private $appid;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;
    
    /**
     * @ORM\Column(type="text")
     */
    private $q1;
    
    /**
     * @ORM\Column(type="text")
     */
    private $q2;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $q3;
    
    /**
     * @ORM\Column(type="text")
     */
    private $q4;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * All Applications may have One Author.
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $user = null;
    
    public function __construct()
    {
    }
    
    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;
    
    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setResumefile(File $resume = null)
    {
        $this->resumeFile = $resume;

        if (null !== $resume) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getQ1()
    {
        return $this->q1;
    }
    
    public function setQ1($q1)
    {
        $this->q1 = $q1;
    }
    
    public function getQ2()
    {
        return $this->q2;
    }
    
    public function setQ2($q2)
    {
        $this->q2 = $q2;
    }
    
    public function getQ3()
    {
        return $this->q3;
    }
    
    public function setQ3($q3)
    {
        $this->q3 = $q3;
    }
    
    public function getQ4()
    {
        return $this->q4;
    }
    
    public function setQ4($q4)
    {
        $this->q4 = $q4;
    }
    
    public function getResumeFile()
    {
        return $this->resumeFile;
    }

    public function setResume($resumeName)
    {
        $this->resume = $resumeName;
    }

    public function getResume()
    {
        return $this->resume;
    }
    
    public function getAddress()
    {
        return $this->address;
    }
    
    public function setAddress($address)
    {
        $this->address = $address;
    }
    
    public function getZip()
    {
        return $this->zip;
    }
    
    public function setZip(string $zip)
    {
        $this->zip = $zip;
    }
    
    public function getCountry()
    {
        return $this->country;
    }
    
    public function setCountry($country)
    {
        $this->country = $country;
    }
    
    public function getId(): int
    {
        return $this->id;
    }

    public function getAppid()
    {
        return $this->appid;
    }
    
    public function setAppid($appId)
    {
        $this->appid = $appId;
    }
    
    public function getQuestions()
    {
        return $this->questions;
    }
    public function addQuestion(ApplicationQuestion $question)
    {
        if(!$this->hasQuestion($question))
            $this->questions->add($question);
    }
    public function hasQuestion(ApplicationQuestion $question)
    {
        if($this->questions->contains($question))
            return true;
        return false;
    }
    public function removeQuestion(ApplicationQuestion $question)
    {
        if($this->hasQuestion($question))
            $this->questions->removeElement($question);
    }
    
    public function getUser()
    {
        return $this->user;
    }
    
    public function setUser(User $user)
    {
        $this->user = $user;
    }
    
    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }
}
