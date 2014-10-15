<?php
// src/Mgn/CoreBundle/Twig/Extension/ConfigExtension.php
 
namespace Mgn\CoreBundle\Twig\Extension;

use Mgn\CoreBundle\Entity\Theme;

use Symfony\Component\Security\Core\SecurityContextInterface;
 
class ThemeExtension extends \Twig_Extension
{
	protected $doctrine;
	protected $securityContext;
	protected $config;
	protected $theme;
	protected $em;
	
	public function getName()
	{
		return 'mgn.theme';
	}
	
	public function getFunctions()
    {
        return array(
           'Theme' => new \Twig_Function_Method($this, 'Theme'),
        );
    }
	
	public function __construct(SecurityContextInterface $securityContext, $doctrine, $config)
	{
		$this->securityContext = $securityContext;
		$this->config = $config;
		$this->doctrine = $doctrine;
		
		if ( $this->securityContext->getToken() !== null AND $this->securityContext->isGranted('ROLE_USER') )
		{
			if ( $this->config->get('themeDate') >= $this->securityContext->getToken()->getUser()->getThemeDate() )
			{
				$themeSelect = $this->config->get('theme');
			}
			else
			{
				$themeSelect = $this->securityContext->getToken()->getUser()->getTheme();
			}
		}
		else
		{
			$themeSelect = $this->config->get('theme');
		}

		$themeConstruct = $this->doctrine->getManager()->getRepository('MgnCoreBundle:Theme')->findOneBy(array('slug' => $themeSelect));

        if ($themeConstruct === null)
        {
        	$themeNew = new Theme;

		    // Enregistrement en bdd pour générer un id    
		    $this->em = $doctrine->getManager();
			$this->em->persist($themeNew);

			$this->em->flush();

			$themeConstruct = $themeNew;
        }

		$this->theme = $themeConstruct;
	}

	public function get($variable)
	{
		$get = 'get'.$variable;
		
    	return $this->theme->$get();
	}
	
	/**
	* @param string $test
	*/
	public function theme($variable)
    {
    	$get = 'get'.$variable;
		
    	return $this->theme->$get();
    }
}
