<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UtilisateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Utilisateur::class;
    }

    // public function configureFields(string $pageName): iterable
    // {
    //     return [
    //         TextField::new('password')
    //         ->formatValue(function ($value) {
    //             $pass = $this->hasher->hash($value);
    //             return $pass;
    //         })
    //     ];
    // }

}
