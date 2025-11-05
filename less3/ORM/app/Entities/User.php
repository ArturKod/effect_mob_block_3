<?php
namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use App\Repositories\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'users_doctrine')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private string $email;

    #[ORM\OneToMany(targetEntity: Post::class, mappedBy: 'user')]
    private Collection $posts;

    public function getId(): ?int { 
        return $this->id; 
    }
    
    public function getName(): string { 
        return $this->name; 
    }
    
    public function getEmail(): string { 
        return $this->email; 
    }
    
    public function setName(string $name): void { 
        $this->name = $name; 
    }
    
    public function setEmail(string $email): void { 
        $this->email = $email; 
    }
}