<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Email;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailController extends Controller
{
    /**
     * @Route("/emails")
     * @Method({"GET"})
     * @return Response
     */
    public function indexAction()
    {
        $emails = $this->getDoctrine()
            ->getRepository('AppBundle:Email')
            ->findAll();

        $serializer = $this->get('serializer');
        $jsonEmails = $serializer->serialize(
            $emails,
            'json', array('groups' => array('default'))
        );

        return Response::create($jsonEmails);
    }

    /**
     * @Route("/emails/{id}")
     * @Method({"GET"})
     * @param integer
     * @return Response
     */
    public function showAction($id)
    {
        $email = $this->getDoctrine()
            ->getRepository('AppBundle:Email')
            ->find($id);

        $serializer = $this->get('serializer');
        $jsonEmails = $serializer->serialize(
            $email,
            'json', array('groups' => array('default'))
        );

        return Response::create($jsonEmails);
    }

    /**
     * @Route("/emails")
     * @Method({"POST"})
     * @param Request $request
     * @return Response
     */
    public function createAction(Request $request)
    {
        $email = new Email();
        $form = $this->createFormBuilder($email)
            ->add('email', \Symfony\Component\Form\Extension\Core\Type\TextType::class, [
                'constraints' => [
                    new \Symfony\Component\Validator\Constraints\Email
                ]
            ])
            ->getForm();

        $submittedData = json_decode($request->getContent(), true);
        $form->submit($submittedData);

        if (!$form->isValid()) {
            return JsonResponse::create([
                "status" => "Invalid email"
            ]);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($email);
        $em->flush();

        $serializer = $this->get('serializer');
        $jsonEmails = $serializer->serialize(
            $email,
            'json', array('groups' => array('default'))
        );

        return Response::create($jsonEmails);
    }
    
    /**
     * @Route("/emails/{id}")
     * @Method({"DELETE"})
     * @param integer
     * @return Response
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $email = $em->getRepository('AppBundle:Email')
            ->find($id);
        $em->remove($email);
        $em->flush();

        return JsonResponse::create([
          "status" => "Email properly removed"
        ]);
    }
}
