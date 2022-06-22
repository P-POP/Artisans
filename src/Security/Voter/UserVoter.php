<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class UserVoter extends Voter
{
    public const VIEW = 'POST_VIEW';
    public const ADD = 'POST_ADD';
    public const EDIT = 'POST_EDIT';

    protected function supports(string $attribute, $subject): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, [self::VIEW, self::ADD, self::EDIT])
            && $subject instanceof \App\Entity\User;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        /** @var  Owner $owner */

        $owner = $subject;

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {

            case self::VIEW:
                return $owner->getAvis() === $user->getOwner();
                break;
            
            case self::ADD:
                return $owner->getAvis() === $user->getOwner();
                break;

            case self::EDIT:
                return $owner->getAvis() === $user->getOwner();
                break;
            
        }

        return false;
    }
}
