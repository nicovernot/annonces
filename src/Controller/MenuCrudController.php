<?php

namespace App\Controller;

use App\Entity\Menu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use App\Entity\App;

class MenuCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Menu::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
           
            TextField::new('name'),
            NumberField::new('pos'),
            TextField::new('cssclass'),
            TextField::new('label'),
            TextField::new('icon'),
            TextField::new('path'),
            TextField::new('url'),
            BooleanField::new('enabled'),
            BooleanField::new('public'),
            AssociationField::new('app','Appli',App::class)
        ];
    }

}
