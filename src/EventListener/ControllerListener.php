<?php
namespace App\EventListener;

use App\Entity\Config;
use App\Entity\PageEntity;
use App\Entity\LayoutEntity;
use App\Entity\RegionEntity;
use App\Service\Breadcrumbs;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Doctrine\ORM\EntityManagerInterface;
use Twig_Environment;
use Symfony\Component\HttpFoundation\RequestStack;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerListener
 *
 * @author M@St3r_iLLuSioN
 */
class ControllerListener implements EventSubscriberInterface {
    //put your code here
    private $em;
    private $twig;
    private $container;
    private $request;
    private $dispatcher;
    
    public function __construct(EntityManagerInterface $em, Twig_Environment $env, RequestStack $requestStack, ContainerInterface $container)
    {
        $this->em = $em;
        $this->twig = $env;
        $this->request = $requestStack->getCurrentRequest();
        $this->container = $container;
        $this->dispatcher = $container->get('event_dispatcher');
        
    }
    public function onKernelController(FilterControllerEvent $event)
    {
        $config = $this->em->getRepository(Config::class)->find(1);
        $this->twig->addGlobal('config',$config);
    }
    public static function getSubscribedEvents(): array {
        return array(
            KernelEvents::CONTROLLER => 'onKernelController',
        );
    }
}