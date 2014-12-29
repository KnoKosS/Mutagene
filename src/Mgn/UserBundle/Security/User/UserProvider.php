<?php

use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Expr\Comparison;

private function loadUserByUsername($username)
{
    $criteria = new Criteria();
    $criteria->where(new Comparison("username", Comparison::EQ, $username));
    $criteria->orWhere(new Comparison("email", Comparison::EQ, $username));
    $criteria->setMaxResults(1);

    $userData = $this->em->getRepository("NamespaceMyBundle:User")->matching($criteria)->first();

    if ($userData != null) {
        switch ($userData->getActive()) {
            case User::DISABLED:
            throw new DisabledException("Your account is disabled. Please contact the administrator.");
                break;
            case User::WAIT_VALIDATION:
                throw new LockedException("Your account is locked. Check and valid your email account.");
                break;
            case User::ACTIVE:
                return $userData;
                break;
        }
    }

    throw new UsernameNotFoundException(sprintf('Username "%s" does not exist.', $username));
}
