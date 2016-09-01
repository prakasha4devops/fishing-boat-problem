<?php
/**
 *
 * Prakash Admane <prakashadmane@gmaill.com>
 */

namespace AppBundle\Form;

use AppBundle\Entity\ButtockAngle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class BoatForm
 * @package AppBundle\Form
 */
class BoatForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('hullLength')
            ->add('lengthUnit', ChoiceType::class, [
                'choices' => [
                    'feet' => 'feet',
                    'inch' => 'inch',
                    'meter' => 'meter',
                ],
                'label' => false
            ])
            ->add('buttockAngle', ChoiceType::class, [
                'choices' => [
                     "2'" => '2',
                     "3'" => '3',
                     "4'" => '4',
                     "5'" => '5',
                     "6'" => '6',
                     "7'" => '7'
                ],
            ])
            ->add('displacement')
            ->add('dispUnit', ChoiceType::class, [
                'choices' => [
                    'lbs' => 'lbs',
                    'kilogram' => 'kilogram',
                    'gram' => 'gram',
                ],
                'label' => false
            ]);

    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Boat'
        ]);
    }
}
