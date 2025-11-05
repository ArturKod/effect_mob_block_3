<?php
namespace App\Repositories;

use Doctrine\ORM\EntityRepository;
use App\Entities\User;

class UserRepository extends EntityRepository
{
    public function findByEmail(string $email): ?User
    {
        return $this->findOneBy(['email' => $email]);
    }
}