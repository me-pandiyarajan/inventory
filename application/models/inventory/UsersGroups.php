<?php

namespace models\inventory;


/**
 * models\inventory\UsersGroups
 *
 * @Table(name="users_groups")
 * @Entity
 */
class UsersGroups
{
    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var models\inventory\Groups
     *
     * @ManyToOne(targetEntity="models\inventory\Groups")
     * @JoinColumns({
     *   @JoinColumn(name="group_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $group;

    /**
     * @var models\inventory\Users
     *
     * @ManyToOne(targetEntity="models\inventory\Users")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $user;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set group
     *
     * @param models\inventory\Groups $group
     * @return UsersGroups
     */
    public function setGroup($group = null)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * Get group
     *
     * @return models\inventory\Groups 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set user
     *
     * @param models\inventory\Users $user
     * @return UsersGroups
     */
    public function setUser($user = null)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return models\inventory\Users 
     */
    public function getUser()
    {
        return $this->user;
    }
}