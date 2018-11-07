<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="`user`")
 */
class User extends BaseUser {
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * Creates a new User;
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Returns the id of the User;
     * @return integer The id of the User;
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Sets the ID of the User;
     * @param integer $id The new ID of the User;
     * @return \User This User with the new id;
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function setRolesAsString($roles)
    {
        $this->roles = $roles;
        return $this;
    }
    /**
     * Sets email and username to the specified email
     * @param string $email The email to set;
     * @return $this This User with updated email and username;
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
}
