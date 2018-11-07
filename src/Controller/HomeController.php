<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Application;
use App\Entity\InformationRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request,\Swift_Mailer $mailer)
    {
        $application = new Application();
        $infoRequest = new InformationRequest();
        $user = $this->getUser();
        $choicesOne = array();
        $choicesOne['Google'] = 1;
        $choicesOne['Facebook'] = 2;
        $choicesOne['All'] = 3;
        $choicesOne['Other'] = 4;
        $formFactory = $this->get('form.factory');
        if($user instanceof User)
        {
            $form = $this->createFormBuilder($application)
                ->add('email', EmailType::class, array(
                    'attr' => array(
                        'placeholder' => 'Email',
                        'class' => 'form-control',
                        'id' => 'disabled',
                        'name' => 'email',
                        'disabled'=>'disabled'
                    ),
                    'data'=>$user->getEmail()
                ))
                ->add('firstname', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'First Name',
                        'class' => 'form-control',
                        'name' => 'firstname'
                    )
                ))
                ->add('lastname', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Last Name',
                        'class' => 'form-control',
                        'name' => 'lastname'
                    )
                ))
                ->add('address', TextType::class, array(
                    'attr'=>array(
                        'placeholder' => 'Address',
                        'class' => 'form-control',
                        'name' => 'address'
                    )
                ))
                ->add('country', CountryType::class, array(
                    'attr'=>array(
                        'placeholder'=> 'Country',
                        'class'=>'form-control',
                        'name'=>'country'
                    )
                ))
                ->add('zip', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Zip Code',
                        'class' => 'form-control',
                        'name' => 'zip'
                    )
                ))
                ->add('q1', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'A few sentences will do the trick',
                        'class' => 'form-control',
                        'name' => 'q[0]'
                    )
                ))
                ->add('q2', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'A few sentences will do the trick',
                        'class' => 'form-control',
                        'name' => 'q[1]'
                    )
                ))
                ->add('q3', ChoiceType::class, array(
                    'choices'=>$choicesOne,
                    'choice_attr' => function($choiceValue, $key, $value) {
                        // adds a class like attending_yes, attending_no, etc
                        return ['class' => 'form-control col-sm-2'];
                    },
                    'expanded'=>true,
                    'multiple'=>false,
                    'attr'=>array(
                        'class'=>'form-row',
                        'name'=>'q[2]'
                    )
                ))
                ->add('q4', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'A Url will work',
                        'class' => 'form-control',
                        'name' => 'q[1]'
                    )
                ))
                ->add('resumeFile', VichFileType::class, array(
                    'label' => 'Upload Your Resume (PDF format)',
                    'attr' => array(
                        'class' => 'form-control',
                        'name' => 'resume'
                    )
                ))
                ->add('send', SubmitType::class)
                ->getForm();
                    $requestform = $formFactory->createNamedBuilder('info_form','Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType',$infoRequest)
                ->add('email', EmailType::class, array(
                    'attr' => array(
                        'placeholder' => 'Email',
                        'class' => 'form-control',
                        'name' => 'email',
                    )
                ))
                ->add('firstname', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'First Name',
                        'class' => 'form-control',
                        'name' => 'firstname'
                    )
                ))
                ->add('lastname', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Last Name',
                        'class' => 'form-control',
                        'name' => 'lastname'
                    )
                ))
                ->add('address', TextType::class, array(
                    'attr'=>array(
                        'placeholder' => 'Address',
                        'class' => 'form-control',
                        'name' => 'address'
                    )
                ))
                ->add('country', CountryType::class, array(
                    'attr'=>array(
                        'placeholder'=> 'Country',
                        'class'=>'form-control',
                        'name'=>'country'
                    )
                ))
                ->add('zip', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Zip Code',
                        'class' => 'form-control',
                        'name' => 'zip'
                    )
                ))
                ->add('send', SubmitType::class)
                ->getForm();
        }
        else
        {
            $form = $this->createFormBuilder($application)
                ->add('email', EmailType::class, array(
                    'attr' => array(
                        'placeholder' => 'Email',
                        'class' => 'form-control',
                        'name' => 'email'
                    )
                ))
                ->add('firstname', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'First Name',
                        'class' => 'form-control',
                        'name' => 'firstname'
                    )
                ))
                ->add('lastname', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Last Name',
                        'class' => 'form-control',
                        'name' => 'lastname'
                    )
                ))
                    ->add('address', TextType::class, array(
                    'attr'=>array(
                        'placeholder' => 'Address',
                        'class' => 'form-control',
                        'name' => 'address'
                    )
                ))
                    ->add('zip', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Zip Code',
                        'class' => 'form-control',
                        'name' => 'zip'
                    )
                ))
                ->add('country', CountryType::class, array(
                    'attr'=>array(
                        'placeholder'=> 'Country',
                        'class'=>'form-control',
                        'name'=>'country'
                    )
                ))
                ->add('q1', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'A few sentences will do the trick',
                        'class' => 'form-control',
                        'name' => 'q[0]'
                    )
                ))
                ->add('q2', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'A few sentences will do the trick',
                        'class' => 'form-control',
                        'name' => 'q[1]'
                    )
                ))
                ->add('q3', ChoiceType::class, array(
                    'choices'=>$choicesOne,
                    'choice_attr' => function($choiceValue, $key, $value) {
                        return ['class' => 'form-control col-sm-2'];
                    },
                    'expanded'=>true,
                    'multiple'=>false,
                    'attr'=>array(
                        'class'=>'form-row',
                        'name'=>'q[2]'
                    )
                ))
                ->add('q4', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'A Url will work',
                        'class' => 'form-control',
                        'name' => 'q[1]'
                    )
                ))
                ->add('resumeFile', VichFileType::class, array(
                    'label' => 'Upload Your Resume (PDF format)',
                    'attr' => array(
                        'class' => 'form-control',
                        'name' => 'resume'
                    )
                ))
                ->add('send', SubmitType::class)
                ->getForm();
                $requestform = $formFactory->createNamedBuilder('info_form','Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType',$infoRequest)
                ->add('email', EmailType::class, array(
                    'attr' => array(
                        'placeholder' => 'Email',
                        'class' => 'form-control',
                        'name' => 'email',
                    )
                ))
                ->add('firstname', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'First Name',
                        'class' => 'form-control',
                        'name' => 'firstname'
                    )
                ))
                ->add('lastname', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Last Name',
                        'class' => 'form-control',
                        'name' => 'lastname'
                    )
                ))
                ->add('address', TextType::class, array(
                    'attr'=>array(
                        'placeholder' => 'Address',
                        'class' => 'form-control',
                        'name' => 'address'
                    )
                ))
                ->add('country', CountryType::class, array(
                    'attr'=>array(
                        'placeholder'=> 'Country',
                        'class'=>'form-control',
                        'name'=>'country'
                    )
                ))
                ->add('zip', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Zip Code',
                        'class' => 'form-control',
                        'name' => 'zip'
                    )
                ))
                ->add('send', SubmitType::class)
                ->getForm();
        }

        $requestform->handleRequest($request);
        $form->handleRequest($request);
        if($requestform->isSubmitted() && $requestform->isValid())
        {
            $email = $requestform->get('email')->getData();
            $firstname = $requestform->get('firstname')->getData();
            $lastname = $requestform->get('lastname')->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($infoRequest);
            $em->flush();
            
            $name = $firstname . ' ' . $lastname;
            $this->sendInformationEmail($name, $email, $mailer);
            $this->addFlash('success', 'Your Request for Information was submitted successfully!');
            return $this->redirectToRoute('home');
        }
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // get the form data
            $email = $form->get('email')->getData();
            $firstname = $form->get('firstname')->getData();
            $lastname = $form->get('lastname')->getData();
            $application->setAppid(1);
            $em->persist($application);
            $em->flush();
            $name = $firstname . ' ' . $lastname;
            $this->sendApplicationEmail($name, $email, $mailer);
            $this->addFlash('success', 'Your Application was submitted successfully!');
            return $this->redirectToRoute('home');
        }
        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
            'infoform' => $requestform->createView()
        ]);
    }
    
    private function sendInformationEmail(string $name, string $email, \Swift_mailer $mailer)
    {
        $message = (new \Swift_Message('We recieved your request for information'))
        ->setFrom('noreply@disciple-builder.com')
        ->setTo($email)
        ->setBody(
            $this->renderView(
                // templates/emails/registration.html.twig
                'email/info-request-email.html.twig',
                array('name' => $name)
            ),
            'text/html'
        )
                //plain txt version
        ->addPart(
            $this->renderView(
                'email/info-request-email.txt.twig',
                array('name' => $name)
            ),
            'text/plain'
        );

        $mailer->send($message);
    }
    
    private function sendApplicationEmail(string $name, string $email, \Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Your Application Has Been Submitted'))
        ->setFrom('noreply@disciple-builder.com')
        ->setTo($email)
        ->setBody(
            $this->renderView(
                // templates/emails/registration.html.twig
                'email/application-email.html.twig',
                array('name' => $name)
            ),
            'text/html'
        )
                //plain txt version
        ->addPart(
            $this->renderView(
                'email/application-email.txt.twig',
                array('name' => $name)
            ),
            'text/plain'
        );

        $mailer->send($message);
    }
    
    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
   
}
