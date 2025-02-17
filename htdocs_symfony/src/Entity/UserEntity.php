<?php

namespace Oc\Entity;

use DateTime;
use Oc\Repository\AbstractEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class UserEntity
 *
 * @package Oc\Entity
 */
class UserEntity extends AbstractEntity implements UserInterface
{
    /**
     * @var int
     */
    public $userId;

    /**
     * @var DateTime
     */
    public $dateCreated;

    /**
     * @var DateTime
     */
    public $lastModified;

    /**
     * @var DateTime
     */
    public $lastLogin;

    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $email;

    /**
     * @var int
     */
    public $emailProblems = 0;

    /**
     * @var float
     */
    public $latitude = 0;

    /**
     * @var float
     */
    public $longitude = 0;

    /**
     * @var bool
     */
    public $isActive = false;

    /**
     * @var string
     */
    public $firstname;

    /**
     * @var string
     */
    public $lastname;

    /**
     * @var string
     */
    public $country;

    /**
     * @var bool
     */
    public $permanentLoginFlag = true;

    /**
     * @var string
     */
    public $activationCode;

    /**
     * @var string
     */
    public $language = 'DE';

    /**
     * @var string
     */
    public $description = '';

    /**
     * @var bool
     */
    public $gdprDeletion = false;

    /**
     * @var array
     */
    public $roles;

    /**
     * Checks if the entity is new.
     */
    public function isNew(): bool
    {
        return $this->userId === null;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getSalt(): string
    {
        return '';
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function eraseCredentials(): void
    {
    }
}
