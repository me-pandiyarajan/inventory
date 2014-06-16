<?php

namespace models\pos;

/**
 * models\pos\UsersGroups
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
     * @var models\pos\Groups
     *
     * @ManyToOne(targetEntity="models\pos\Groups")
     * @JoinColumns({
     *   @JoinColumn(name="group_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $group;

    /**
     * @var models\pos\Users
     *
     * @ManyToOne(targetEntity="models\pos\Users")
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
     * @param models\pos\Groups $group
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
     * @return models\pos\Groups 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set user
     *
     * @param models\pos\Users $user
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
     * @return models\pos\Users 
     */
    public function getUser()
    {
        return $this->user;
    }
}