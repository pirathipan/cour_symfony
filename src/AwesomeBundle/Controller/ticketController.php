<?php

namespace AwesomeBundle\Controller;

use AwesomeBundle\Entity\message;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AwesomeBundle\Entity\ticket;
use AwesomeBundle\Form\ticketType;

/**
 * ticket controller.
 *
 * @Route("/ticket")
 */
class ticketController extends Controller
{
    /**
     * Lists all ticket entities.
     *
     * @Route("/", name="ticket_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tickets = $em->getRepository('AwesomeBundle:ticket')->findAll();

        return $this->render('ticket/index.html.twig', array(
            'tickets' => $tickets,
        ));
    }

    /**
     * Creates a new ticket entity.
     *
     * @Route("/new", name="ticket_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ticket = new ticket();
        $form = $this->createForm('AwesomeBundle\Form\ticketType', $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $date = new \DateTime('now');
            $ticket->setDate($date);
            $em = $this->getDoctrine()->getManager();
            $em->persist($ticket);
            $em->flush();

            return $this->redirectToRoute('ticket_show', array('id' => $ticket->getId()));
        }

        return $this->render('ticket/new.html.twig', array(
            'ticket' => $ticket,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ticket entity.
     *
     * @Route("/{id}", name="ticket_show")
     * @Method("GET")
     */
    public function showAction(ticket $ticket, Request $request)
    {
        $deleteForm = $this->createDeleteForm($ticket);
        $message = new message();
        $form = $this->createForm('AwesomeBundle\Form\messageType', $message);
        $form->handleRequest($request);


        $messages = $this->getDoctrine()
            ->getRepository('AwesomeBundle:message')
            ->findBy(['ticket' => $ticket]);


        return $this->render('ticket/show.html.twig', array(
            'messages' => $messages,
            'ticket' => $ticket,
            'delete_form' => $deleteForm->createView(),
            'form' => $form->createView(),
        ));

    }

    /**
     * Displays a form to edit an existing ticket entity.
     *
     * @Route("/{id}/edit", name="ticket_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ticket $ticket)
    {
        $deleteForm = $this->createDeleteForm($ticket);
        $editForm = $this->createForm('AwesomeBundle\Form\ticketType', $ticket);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ticket);
            $em->flush();

            return $this->redirectToRoute('ticket_edit', array('id' => $ticket->getId()));
        }

        return $this->render('ticket/edit.html.twig', array(
            'ticket' => $ticket,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ticket entity.
     *
     * @Route("/{id}", name="ticket_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ticket $ticket)
    {
        $form = $this->createDeleteForm($ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ticket);
            $em->flush();
        }

        return $this->redirectToRoute('ticket_index');
    }

    /**
     * Creates a form to delete a ticket entity.
     *
     * @param ticket $ticket The ticket entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ticket $ticket)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ticket_delete', array('id' => $ticket->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
