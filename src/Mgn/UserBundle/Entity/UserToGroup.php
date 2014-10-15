<?php
// src/Mgn/UserBundle/Entity/UserToGroup.php
 
namespace Mgn\UserBundle\Entity;
 
use Doctrine\ORM\Mapping as ORM;

 
/**
 * @ORM\Entity
 * @ORM\Table(name="mgn_UserToGroup")
 * @ORM\Entity(repositoryClass="Mgn\UserBundle\Entity\UserToGroupRepository")
 */
class UserToGroup
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Mgn\UserBundle\Entity\User", inversedBy="groups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Mgn\UserBundle\Entity\Group", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $group;

    /**
     * @var string
     *
     * @ORM\Column(name="function", type="string", length=255)
     */
    private $function;
 
    /**
     * @var boolean
     *
     * @ORM\Column(name="`default`", type="boolean", nullable=true)
     */
    private $default;

    public function __construct()
    {
      $this->default = false;
    }

    /**
     * Set user
     *
     * @param \Mgn\UserBundle\Entity\User $user
     * @return UserToGroup
     */
    public function setUser(\Mgn\UserBundle\Entity\User $user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Mgn\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set group
     *
     * @param \Mgn\UserBundle\Entity\Group $group
     * @return UserToGroup
     */
    public function setGroup(\Mgn\UserBundle\Entity\Group $group)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \Mgn\UserBundle\Entity\Group 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set default
     *
     * @param boolean $default
     * @return UserToGroup
     */
    public function setDefault($default)
    {
        $this->default = $default;
    
        return $this;
    }

    /**
     * Get default
     *
     * @return boolean 
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * Set function
     *
     * @param string $function
     * @return UserToGroup
     */
    public function setFunction($function)
    {
        $this->function = $function;
    
        return $this;
    }

    /**
     * Get function
     *
     * @return string 
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Returns the group roles
     *
     * @return array The roles
     */
    public function getRoles()
    {
        $roles = $this->group->getRoles();

        return $roles;
    }

    public function setRoles(array $roles)
    {
        $this->roles = array();

        foreach ($roles as $role) {
            $this->addRole($role);
        }

        return $this;
    }
}
