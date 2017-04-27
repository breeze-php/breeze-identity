<?php

namespace Breeze\Account\Context;

use Breeze\Account\Document\User;
use Doctrine\ODM\MongoDB\DocumentManager;

/**
 * Class Register
 */
class Register
{
    /**
     * @var DocumentManager
     */
    private $documentManager;

    /**
     * Register constructor.
     * @param DocumentManager $documentManager
     */
    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }

    public function register(string $email, string $password)
    {
        $user = new User();

        $user->setUsername($email);
        $user->setPassword($password);

        $this->documentManager->persist($user);
        $this->documentManager->flush();
    }
}
