<?php

namespace App\Controller\Admin;

use App\Entity\PricingPlan;
use App\Form\PricingPlanBenefitType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class PricingPlanCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PricingPlan::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Name'),
            IntegerField::new('Price'),
            CollectionField::new('benefits')
                ->setEntryType(PricingPlanBenefitType::class)
                ->onlyOnForms()
        ];
    }

}
