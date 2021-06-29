<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Couleur;
use App\Repository\CouleurRepository;
use Doctrine\ORM\EntityManagerInterface; 
use DateTime;
class MainController extends AbstractController
{
    /**
     * @Route("/", name="route_home")
     */
    public function home(CouleurRepository $repo): Response
    {
       
        $couleurs = $repo->findAll();
        return $this->render('main/home.html.twig', [
            'couleurs'=> $couleurs
        ]);
    }
    /**
     * @Route("/delete/{id}", name="couleur_delete")
     */
    public function delete(Couleur $c, EntityManagerInterface $em): Response
    {
        //$em = $this->getDoctrine()->getManager();

        $em->remove($c);
        $em->flush(); // COMMIT
        return $this->redirectToRoute('route_home'); 
        
    }

     /**
     * @Route("/modify/{id}", name="couleur_modify")
     */
    public function modify(Couleur $c, EntityManagerInterface $em): Response
    {
        $c->setTitle('Toto');
        $em->flush(); // COMMIT
        return $this->redirectToRoute('route_home'); 
        
    }

        /**
     * @Route("/add", name="couleur_add")
     */
    public function ajouter(EntityManagerInterface $em): Response
    {
        $c = new Couleur();
        $c->setTitle('Mauve');
        $c->setTendance(true);
        $em->persist($c);
        $em->flush(); // COMMIT
        return $this->redirectToRoute('route_home'); 
        
    }
   
}
