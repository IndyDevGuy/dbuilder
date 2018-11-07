<?php

namespace App\Controller;

use App\Entity\Config;
use App\Entity\Application;
use App\Entity\InformationRequest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ConfigController extends Controller
{
    /**
     * @Route("/admin", name="adminDashboard")
     */
    public function admin()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'ConfigController',
        ]);
    }
    /**
     * @Route("/admin/config", name="adminConfiguration")
     */
    public function config(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $config = $em->getRepository(Config::class)->find(1);
        $twig = $this->container->get('twig');
        $dispatcher = $this->container->get('event_dispatcher');
        $defaultData = array('message' => 'Type your message here');
        $form = $this->createFormBuilder($defaultData)
                ->add('title', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Site Title',
                        'class' => 'form-control',
                        'name' => 'title'
                    ),
                    'data'=>$config->getTitle()
                ))
                ->add('email', EmailType::class, array(
                    'attr' => array(
                        'placeholder' => 'Site Email',
                        'class' => 'form-control',
                        'name' => 'email'
                    ),
                    'data'=>$config->getEmail()
                ))
                ->add('header_title', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Header Title',
                        'class' => 'form-control',
                        'name' => 'header_title'
                    ),
                    'data' => $config->getHeadertitle()
                ))
                ->add('phone', TelType::class, array(
                    'attr' => array(
                        'placeholder' => 'Site Phone Number',
                        'class' => 'form-control',
                        'name' => 'phone'
                    ),
                    'data' => $config->getPhone()
                ))
                //about form section
                ->add('about_title', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'About Title',
                        'class' => 'form-control',
                        'name' => 'about_title'
                    ),
                    'data' => $config->getAbouttitle()
                ))
                ->add('about_description', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'About Disciple Builder',
                        'class' => 'form-control',
                        'name' => 'about_description'
                    ),
                    'data'=>$config->getAboutdescription()
                ))
                //how it works form section
                ->add('works_title', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'How It Works Title',
                        'class' => 'form-control',
                        'name' => 'works_title'
                    ),
                    'data' => $config->getWorkstitle()
                ))
                ->add('works_description', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'How Does Disciple Builder Work?',
                        'class' => 'form-control',
                        'name' => 'works_description'
                    ),
                    'data'=>$config->getWorksdescription()
                ))
                ->add('works_observing', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'Observing Description',
                        'class' => 'form-control',
                        'name' => 'works_observing'
                    ),
                    'data'=>$config->getWorksobserving()
                ))
                ->add('works_interpreting', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'Interpreting Description',
                        'class' => 'form-control',
                        'name' => 'works_interpreting'
                    ),
                    'data'=>$config->getWorksinterpreting()
                ))
                ->add('works_living', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'Living Description',
                        'class' => 'form-control',
                        'name' => 'works_living'
                    ),
                    'data'=>$config->getWorksliving()
                ))
                //seven c's form section
                ->add('seven_title', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Seven C\'s Title',
                        'class' => 'form-control',
                        'name' => 'seven_title'
                    ),
                    'data' => $config->getSeventitle()
                ))
                ->add('seven_confering', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'Confering Description',
                        'class' => 'form-control',
                        'name' => 'seven_confering'
                    ),
                    'data'=>$config->getSevenconfering()
                ))
                ->add('seven_creating', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'Creating Description',
                        'class' => 'form-control',
                        'name' => 'seven_creating'
                    ),
                    'data'=>$config->getSevencreating()
                ))
                ->add('seven_capitalizing', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'Capitalizing Description',
                        'class' => 'form-control',
                        'name' => 'seven_capitalizing'
                    ),
                    'data'=>$config->getSevencapitalizing()
                ))
                ->add('seven_contracting', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'Contracting Description',
                        'class' => 'form-control',
                        'name' => 'seven_contracting'
                    ),
                    'data'=>$config->getSevencontracting()
                ))
                ->add('seven_constructing', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'Constructing Description',
                        'class' => 'form-control',
                        'name' => 'seven_constructing'
                    ),
                    'data'=>$config->getSevenconstructing()
                ))
                ->add('seven_celebrating', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'Celebrating Description',
                        'class' => 'form-control',
                        'name' => 'seven_celebrating'
                    ),
                    'data'=>$config->getSevencelebrating()
                ))
                ->add('seven_community', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'Community Description',
                        'class' => 'form-control',
                        'name' => 'seven_community'
                    ),
                    'data'=>$config->getSevencommunity()
                ))
                //founder form section
                ->add('founder_name', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Founder Name',
                        'class' => 'form-control',
                        'name' => 'founder_name'
                    ),
                    'data' => $config->getFoundertitle()
                ))
                ->add('founder_description', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'About the Founder of Disciple Builder',
                        'class' => 'form-control',
                        'name' => 'founder_description'
                    ),
                    'data'=>$config->getFounderdescription()
                ))
                //contact form section
                ->add('contact_title', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Contact Title',
                        'class' => 'form-control',
                        'name' => 'contact_title'
                    ),
                    'data' => $config->getContacttitle()
                ))
                ->add('contact_description', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'Contact Body',
                        'class' => 'form-control',
                        'name' => 'contact_description'
                    ),
                    'data'=>$config->getContactdescription()
                ))
                ->add('submit', SubmitType::class,array(
                    'attr'=>array(
                        'class'=>'btn btn-common btn-md pull-right'
                    )
                ))
                ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            //get the inputed data
            $title = $form->get('title')->getData();
            $email = $form->get('email')->getData();
            $phone = $form->get('phone')->getData();
            $headertitle = $form->get('header_title')->getData();
            $abouttitle = $form->get('about_title')->getData();
            $aboutdescription = $form->get('about_description')->getData();
            $workstitle = $form->get('works_title')->getData();
            $worksdescription = $form->get('works_description')->getData();
            $observingdescription = $form->get('works_observing')->getData();
            $interpretingdescription = $form->get('works_interpreting')->getData();
            $livingdescription = $form->get('works_living')->getData();
            $seventitle = $form->get('seven_title')->getData();
            $conferingdescription = $form->get('seven_confering')->getData();
            $creatingdescription = $form->get('seven_creating')->getData();
            $capitalizingdescription = $form->get('seven_capitalizing')->getData();
            $contractingdescription = $form->get('seven_contracting')->getData();
            $constructingdescription = $form->get('seven_constructing')->getData();
            $celebratingdescription = $form->get('seven_celebrating')->getData();
            $communitydescription = $form->get('seven_community')->getData();
            $foundername = $form->get('founder_name')->getData();
            $founderdescription = $form->get('founder_description')->getData();
            $contacttitle = $form->get('contact_title')->getData();
            $contactdescription = $form->get('contact_description')->getData();
            //update the config entity with the new data
            $config->setTitle($title);
            $config->setEmail($email);
            $config->setPhone($phone);
            $config->setHeadertitle($headertitle);
            $config->setAbouttitle($abouttitle);
            $config->setAboutdescription($aboutdescription);
            $config->setWorkstitle($workstitle);
            $config->setWorksdescription($worksdescription);
            $config->setWorksobserving($observingdescription);
            $config->setWorksinterpreting($interpretingdescription);
            $config->setWorksliving($livingdescription);
            $config->setSeventitle($seventitle);
            $config->setSevenconfering($conferingdescription);
            $config->setSevencreating($creatingdescription);
            $config->setSevencapitalizing($capitalizingdescription);
            $config->setSevencontracting($contractingdescription);
            $config->setSevenconstructing($constructingdescription);
            $config->setSevencelebrating($celebratingdescription);
            $config->setSevencommunity($communitydescription);
            $config->setFoundertitle($foundername);
            $config->setFounderdescription($founderdescription);
            $config->setContacttitle($contacttitle);
            $config->setContactdescription($contactdescription);
            $em->persist($config);
            $em->flush();
            $this->addFlash('success', 'Configuration was saved correctly');
            return $this->redirectToRoute('adminConfiguration');
        }
        return $this->render('admin/config.html.twig', [
            'form'=>$form->createView()
        ]);
    }
    /**
     * @Route("/admin/applications", name="adminApplications")
     */
    public function applications()
    {
        $em = $this->getDoctrine()->getMAnager();
        $applications = $em->getRepository(Application::class)->findAll();
        return $this->render('admin/applications.html.twig', array(
            'applications' => $applications,
        ));
    }
    /**
     * @Route("/admin/requests", name="adminInfoRequests")
     */
    public function requests()
    {
        $em = $this->getDoctrine()->getManager();
        $requests = $em->getRepository(InformationRequest::class)->findAll();
        return $this->render('admin/requests.html.twig', array(
            'requests'=>$requests
        ));
    }
}
