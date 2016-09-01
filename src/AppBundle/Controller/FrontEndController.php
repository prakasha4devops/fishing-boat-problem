<?php
/**
 *
 * Prakash Admane <prakashadmane@gmaill.com>
 */

namespace AppBundle\Controller;

use AppBundle\Form\BoatForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class FrontEndController
 * @package AppBundle\Controller
 */
class FrontEndController extends Controller
{
    /**
     * @Route("/boat", name="fishing_boat")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function boatAction(Request $request)
    {
        $form = $this->createForm(BoatForm::class);

        $form->handleRequest($request);
        $hpRequirement = '';
        if ($form->isSubmitted() && $form->isValid()) {
            $boat = $form->getData();

            $power = $this->get('app.calculate_requirement');
            $hpRequirement = $power->getHorsePower($boat);
        }

        return $this->render('front-end/boat.html.twig', [
            'boatForm'     => $form->createView(),
            'hpRequirment' => $hpRequirement
        ]);
    }
}