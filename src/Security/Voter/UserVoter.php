<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class UserVoter extends Voter
{
    public const ADD = 'AVIS_ADD';
    public const EDIT = 'POST_EDIT';

    protected function supports(string $attribute, $subject): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, [self::ADD, self::EDIT])
            && $subject instanceof \App\Entity\Artisan;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        $artisan = $subject;

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case self::ADD:
                return $user !== $artisan->getMaker();
                break;

            case self::EDIT:
                return false;
                break;  
        }

        return false;
    }
}
