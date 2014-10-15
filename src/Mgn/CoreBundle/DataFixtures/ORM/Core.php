<?php
// src/Mgn/CoreBundle/DataFixtures/ORM/Config.php
 
namespace Mgn\CoreBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Mgn\CoreBundle\Entity\Config;
use Mgn\CoreBundle\Entity\Theme;
 
class Configs implements FixtureInterface
{
  public function load(ObjectManager $manager)
  {
    $layout = '
      <div class="body">

    <div class="container">
    
        <div class="jumbotron">
        <h1>{{ Config('siteTitle') }}</h1>
        <p>{{ Config('siteDescription') }}</p>
        </div>
    
        <div class="row">
        
            <div class="col-lg-12">
            
            </div>
        
        </div>
    
        <div class="row">
        
            <div class="col-lg-12">
        
                {% include template_from_string(Theme('menu')|raw) %}
            
            </div>
            
        </div>

        <div class="row">

                    <div class="col-lg-12">
    
                <ul class="breadcrumb">
                
                    <li><a href="{{ path("mgn_home") }}"><i class="fa fa-home"></i></a></li> {% block arianne %}{% endblock %}
                    
                </ul>
    
                    </div>
                    
                    {% if bundle is defined and bundle == 'forum' %}
                    <div class="col-lg-12">
                    {% else %}
                    <div class="col-lg-9">
            {% endif %}
                    
                        <div class="row">
                    
                    {% if bundle is defined and bundle == 'forum' %}

                <div class="col-lg-12">
                
                    <h1>{% block pagetitle %}{% endblock %}</h1>
                
                    {% block bundle_forum %}{% endblock %}
                
                </div>
        
            {% elseif bundle is defined and bundle == 'article' %}

                <div class="col-lg-12">
                
                    {% block bundle_article %}{% endblock %}
                
                </div>
        
            {% else %}

                <div class="col-lg-12">
                
                    {% block body %}{% endblock %}
                
                </div>
            
            {% endif %}
            
                </div>
                    
                    </div>

            {% if bundle is defined and bundle == 'forum' %}
            {% else %}
            
            <div class="col-lg-3">
            
                <aside class="sidebar">
            
                {% if bundle is defined and bundle == 'article' %}
                <h4>Catégories</h4>
                
                <ul class="nav nav-list primary push-bottom">
                    {{ render(controller('MgnArticleBundle:Article:listCategories'))}}
                </ul>
                {% endif %}
                
                {{ render(controller('MgnCoreBundle:Sidebar:view'))}}
                
                </aside>
            
            </div>
            
            {% endif %}

        </div>
        
        <div class="row footer">
        
            
            
        </div>
        
    </div>

</div>
    ';

    $theme = new Theme;
 
    $theme->setThemeTitle('Mutagène');
    $theme->setLayout($layout);
    $theme->setVersion('1.0');
    $theme->setAuthor('KnoKosS');
    $theme->setUrl('http://www.knokoss.com/');


    $manager->persist($theme);
 
    // On déclenche l'enregistrement
    $manager->flush();

    $config = new Config;
 
    // Le nom d'utilisateur et le mot de passe sont identiques
    $config->setCms('mutagene');
    $config->setSiteTitle('Mutagène');
    $config->setSiteDescription('Un CMS nouvelle génération');
    $config->setEmail('demo@mutagene.fr');
    $config->setCmsForum(true);
    $config->setCmsArticle(true);
    $config->setTheme('mutagene');
    $config->setThemeDate(new \Datetime());
    $config->setTotalArticles(0);
    $config->setTotalArticlesPublish(0);
    $config->setTotalArticlesPending(0);
    $config->setTotalArticlesDraft(0);
    $config->setForumIndexLigne(2);
    $config->setForumPostPage(20);

    // On le persiste
    $manager->persist($config);
 
    // On déclenche l'enregistrement
    $manager->flush();
  }
}