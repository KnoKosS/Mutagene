<?php
// src/Mgn/CoreBundle/Twig/Extension/ConfigExtension.php
 
namespace Mgn\CoreBundle\Twig\Extension;

use Mgn\CoreBundle\Entity\Config;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
 
class ConfigExtension extends \Twig_Extension
{
	protected $doctrine;
	protected $config;
	protected $em;
	private $container;
	
	public function getName()
	{
		return 'mgn.config';
	}
	
	public function getFunctions()
    {
        return array(
           'Config' => new \Twig_Function_Method($this, 'Config'),
        );
    }
	
	public function __construct($doctrine,Container $container)
	{
		$this->doctrine = $doctrine;
		$this->container = $container;
		
		if ($this->config === null) {
			$configConstruct = $this->doctrine
                         ->getManager()
                         ->getRepository('MgnCoreBundle:Config')
                         ->findOneBy(array('cms' => 'mutagene'));

            if ($configConstruct === null)
            {
            	$configNew = new Config;

			    // Enregistrement en bdd pour générer un id    
			    $this->em = $doctrine->getManager();
				$this->em->persist($configNew);

				$this->em->flush();

				$configConstruct = $configNew;
            }

            $this->config = $configConstruct;

            $activeTheme = $this->container->get('liip_theme.active_theme');
            $activeTheme->setName($this->config->getTheme());
		}
	}

	public function get($variable)
	{
		$get = 'get'.$variable;
		
    	return $this->config->$get();
	}
	
	/**
	* @param string $test
	*/
	public function config($variable)
    {
    	$get = 'get'.$variable;
		
    	return $this->config->$get();
    }
}
