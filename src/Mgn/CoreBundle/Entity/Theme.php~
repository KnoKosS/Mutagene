<?php

namespace Mgn\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @author Sylvain "KnoKosS" Meunier <knokoss@gmail.com>
 * @copyright 2013 Sylvain Meunier
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 *
 * @ORM\Entity
 * @ORM\Table(name="mgn_core_themes")
 */
class Theme {

	/**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

	/**
	 * @var string
	 * @ORM\Column(name="themeTitle", type="string", nullable=false)
	 */
	protected $themeTitle;
 
    /**
     * @Gedmo\Slug(fields={"themeTitle"})
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var integer
     * @ORM\Column(name="version", type="integer", nullable=true)
     */
    protected $version;

    /**
     * @var string
     * @ORM\Column(name="author", type="string", nullable=false)
     */
    protected $author;

    /**
     * @var string
     * @ORM\Column(name="url", type="string", nullable=false)
     */
    protected $url;

    /**
     * @var text $head
     *
     * @ORM\Column(name="head", type="text", nullable=true)
     */
    private $head;

    /**
     * @var text $layout
     *
     * @ORM\Column(name="layout", type="text", nullable=true)
     */
    private $layout;

    /**
     * @var text $menu
     *
     * @ORM\Column(name="menu", type="text", nullable=true)
     */
    private $menu;

    /**
     * @var text $javascript
     *
     * @ORM\Column(name="javascript", type="text", nullable=true)
     */
    private $javascript;

    /**
     * @var text $articleBundleArticleIndex
     *
     * @ORM\Column(name="articleBundleArticleIndex", type="text", nullable=true)
     */
    private $articleBundleArticleIndex;

    /**
     * @var text $articleBundleArticleRead
     *
     * @ORM\Column(name="articleBundleArticleRead", type="text", nullable=true)
     */
    private $articleBundleArticleRead;

    /**
     * @var text $forumBundleForumsAllClassic
     *
     * @ORM\Column(name="forumBundleForumsAllClassic", type="text", nullable=true)
     */
    private $forumBundleForumsAllClassic;

    /**
     * @var text $forumBundleForumsAllBlock
     *
     * @ORM\Column(name="forumBundleForumsAllBlock", type="text", nullable=true)
     */
    private $forumBundleForumsAllBlock;

    /**
     * @var text $forumBundleForumsViewClassic
     *
     * @ORM\Column(name="forumBundleForumsViewClassic", type="text", nullable=true)
     */
    private $forumBundleForumsViewClassic;

    /**
     * @var text $forumBundleForumsViewBlock
     *
     * @ORM\Column(name="forumBundleForumsViewBlock", type="text", nullable=true)
     */
    private $forumBundleForumsViewBlock;

    /**
     * @var text $forumBundleForumsReadClassic
     *
     * @ORM\Column(name="forumBundleForumsReadClassic", type="text", nullable=true)
     */
    private $forumBundleForumsReadClassic;

    /**
     * @var text $forumBundleForumsReadBlock
     *
     * @ORM\Column(name="forumBundleForumsReadBlock", type="text", nullable=true)
     */
    private $forumBundleForumsReadBlock;

    /**
     * @var text $userBundleUserProfile
     *
     * @ORM\Column(name="userBundleUserProfile", type="text", nullable=true)
     */
    private $userBundleUserProfile;

    /**
     * @var text $userBundleUserEditProfile
     *
     * @ORM\Column(name="userBundleUserEditProfile", type="text", nullable=true)
     */
    private $userBundleUserEditProfile;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var text $articlesRead
     *
     * @ORM\Column(name="articlesRead", type="text", nullable=true)
     */
    private $articlesRead;

    /**
     * @var text $articlesReadAuthor
     *
     * @ORM\Column(name="articlesReadAuthor", type="text", nullable=true)
     */
    private $articlesReadAuthor;

    /**
     * @var text $articlesReadComments
     *
     * @ORM\Column(name="articlesReadComments", type="text", nullable=true)
     */
    private $articlesReadComments;

    /**
     * @var text $articlesReadComment
     *
     * @ORM\Column(name="articlesReadComment", type="text", nullable=true)
     */
    private $articlesReadComment;

    /**
     * @var text $articlesReadTitle
     *
     * @ORM\Column(name="articlesReadTitle", type="text", nullable=true)
     */
    private $articlesReadTitle;

    /**
     * @var text $articlesReadInfos
     *
     * @ORM\Column(name="articlesReadInfos", type="text", nullable=true)
     */
    private $articlesReadInfos;

    /**
     * @var text $articlesReadHeader
     *
     * @ORM\Column(name="articlesReadHeader", type="text", nullable=true)
     */
    private $articlesReadHeader;

    /**
     * @var text $articlesReadIntroduction
     *
     * @ORM\Column(name="articlesReadIntroduction", type="text", nullable=true)
     */
    private $articlesReadIntroduction;

    /**
     * @var text $articlesReadContents
     *
     * @ORM\Column(name="articlesReadContents", type="text", nullable=true)
     */
    private $articlesReadContents;

    /**
     * @var text $articlesReadContentSubtitle
     *
     * @ORM\Column(name="articlesReadContentSubtitle", type="text", nullable=true)
     */
    private $articlesReadContentSubtitle;

    /**
     * @var text $articlesReadContentPicture
     *
     * @ORM\Column(name="articlesReadContentPicture", type="text", nullable=true)
     */
    private $articlesReadContentPicture;

    /**
     * @var text $articlesReadContentParagraph
     *
     * @ORM\Column(name="articlesReadContentParagraph", type="text", nullable=true)
     */
    private $articlesReadContentParagraph;

    /**
     * @var text $articlesReadContentVideo
     *
     * @ORM\Column(name="articlesReadContentVideo", type="text", nullable=true)
     */
    private $articlesReadContentVideo;

    /**
     * @var text $articlesReadContentQuote
     *
     * @ORM\Column(name="articlesReadContentQuote", type="text", nullable=true)
     */
    private $articlesReadContentQuote;

    /**
     * @var text $usersLogin
     *
     * @ORM\Column(name="usersLogin", type="text", nullable=true)
     */
    private $usersLogin;


    public function __construct()
    {
        $this->themeTitle = 'Mutagène';
        $this->version = '1.0';
        $this->author = 'KnoKosS';
        $this->url = 'http://www.knokoss.com/';

        $this->head = '<meta charset="UTF-8" />

<title>{% block title %}{{ Config(\'siteTitle\') }} - {{ Config(\'siteDescription\') }}{% endblock %}</title>

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="icon" type="image/png" href="{{ asset(\'themes/\'~Config(\'theme\')~\'/favicon.png\') }}" />

<link href="{{ asset(\'themes/\'~Theme("slug")~\'/css/bootstrap.css\') }}" rel="stylesheet" media="screen">
        
<link href="{{ asset(\'css/datepicker.css\') }}" rel="stylesheet" media="screen">

<link rel="stylesheet" href="{{ asset(\'css/font-awesome.min.css\') }}" >
<link rel="stylesheet" href="{{ asset(\'css/foundation-icons.css\') }}" >

<script type="text/javascript">
  <!--
  var port = 6658;
  var width = \'100%\';
  var height = 600;
  var srv = 9;
  var cl = "000";
  var bgcolor = "fff";
  var tc = "11";
  var tu = "11";
  //-->
  </script>

<link rel="stylesheet" href="{{ asset(\'themes/\'~Theme("slug")~\'/css/style.css\') }}" />';

        $this->layout = '<div class="body">

    <div class="container">
    
        <div class="jumbotron">
        <h1>{{ Config(\'siteTitle\') }}</h1>
        <p>{{ Config(\'siteDescription\') }}</p>
        </div>
    
        <div class="row">
        
            <div class="col-lg-12">
            
            </div>
        
        </div>
    
        <div class="row">
        
            <div class="col-lg-12">
        
                {% include template_from_string(Theme(\'menu\')|raw) %}
            
            </div>
            
        </div>

        <div class="row">

                    <div class="col-lg-12">
    
                <ul class="breadcrumb">
                
                    <li><a href="{{ path("mgn_home") }}"><i class="fa fa-home"></i></a></li> {% block arianne %}{% endblock %}
                    
                </ul>
    
                    </div>
                    
                    {% if bundle is defined and bundle == \'forum\' %}
                    <div class="col-lg-12">
                    {% else %}
                    <div class="col-lg-9">
            {% endif %}
                    
                        <div class="row">
                    
                    {% if bundle is defined and bundle == \'forum\' %}

                <div class="col-lg-12">
                
                    <h1>{% block pagetitle %}{% endblock %}</h1>
                
                    {% block bundle_forum %}{% endblock %}
                
                </div>
        
            {% elseif bundle is defined and bundle == \'article\' %}

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

            {% if bundle is defined and bundle == \'forum\' %}
            {% else %}
            
            <div class="col-lg-3">
            
                <aside class="sidebar">
            
                {% if bundle is defined and bundle == \'article\' %}
                <h4>Catégories</h4>
                
                <ul class="nav nav-list primary push-bottom">
                    {{ render(controller(\'MgnArticleBundle:Article:listCategories\'))}}
                </ul>
                {% endif %}
                
                {{ render(controller(\'MgnCoreBundle:Sidebar:view\'))}}
                
                </aside>
            
            </div>
            
            {% endif %}

        </div>
        
        <div class="row footer">
        
            
            
        </div>
        
    </div>

</div>';

        $this->menu = '<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
    <ul class="nav navbar-nav">

        <li class="navbar-button{% if bundle is defined and bundle == \'article\' %} active{% endif %}">
            <a href="{% if Config(\'homepage\') == \'article\' %}{{ path("mgn_home") }}{% else %}{{ path("mgn_article") }}{% endif %}">Accueil</a>
        </li>
        <li class="navbar-button{% if bundle is defined and bundle == \'forum\' %} active{% endif %}">
            <a href="{% if Config(\'homepage\') == \'forum\' %}{{ path("mgn_home") }}{% else %}{{ path("mgn_forum") }}{% endif %}">Forums</a>
        </li>
        
    </ul>
      
    <ul class="nav navbar-nav navbar-right">
    
        {% if is_granted("IS_AUTHENTICATED_REMEMBERED") %}
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ app.user.username }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
            <li><a href="{{ path("mgn_user_profile", {\'username\': app.user.usernameCanonical}) }}"><i class="fa fa-user"></i> Mon compte</a></li>
            {% if is_granted("ROLE_ADMIN") %}
            <li class="divider"></li>
            <li><a href="{{ path("mgn_admin_homepage") }}"><i class="fa fa-wrench"></i> Administration</a></li>
            {% endif %}
            <li class="divider"></li>
            <li><a href="{{ path("logout") }}"><i class="fa fa-power-off"></i> Déconnexion</a></li>
            </ul>
        </li>
        
        {% else %}
        
            <a class="btn btn-default navbar-btn navbar-btn-login" href="{{ path("user.connexion") }}"><i class="icon-home"></i> Connexion</a>
            <a class="btn btn-primary navbar-btn navbar-btn-register" href="{{ path("user.register") }}"><i class="icon-user"></i> Inscription</a>
            
        {% endif %}
    
    </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>';

        $this->javascript = '<script src="http://code.jquery.com/jquery.js"></script>
<script src="{{ asset(\'themes/\'~Theme("slug")~\'/js/bootstrap.min.js\') }}"></script>
<script src="{{ asset(\'themes/\'~Theme("slug")~\'/js/bootstrap-datepicker.js\') }}"></script>
<script src="{{ asset(\'js/mgncode.js\') }}"></script>

<script>
    <!--
    $(document).ready(function(){

       $(".dropdown").hover(
            function() { $(\'.dropdown-menu\', this).fadeIn("fast");
            },
            function() { $(\'.dropdown-menu\', this).fadeOut("fast");
        });

        $(\'.datepicker\').datepicker();

        $(\'.tips\').tooltip();

    });
    -->
    </script>';
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set themeTitle
     *
     * @param string $themeTitle
     * @return Theme
     */
    public function setThemeTitle($themeTitle)
    {
        $this->themeTitle = $themeTitle;
    
        return $this;
    }

    /**
     * Get themeTitle
     *
     * @return string 
     */
    public function getThemeTitle()
    {
        return $this->themeTitle;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Theme
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set layout
     *
     * @param string $layout
     * @return Theme
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    
        return $this;
    }

    /**
     * Get layout
     *
     * @return string 
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * Set version
     *
     * @param integer $version
     * @return Theme
     */
    public function setVersion($version)
    {
        $this->version = $version;
    
        return $this;
    }

    /**
     * Get version
     *
     * @return integer 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Theme
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Theme
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Theme
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set javascript
     *
     * @param string $javascript
     * @return Theme
     */
    public function setJavascript($javascript)
    {
        $this->javascript = $javascript;
    
        return $this;
    }

    /**
     * Get javascript
     *
     * @return string 
     */
    public function getJavascript()
    {
        return $this->javascript;
    }

    /**
     * Set head
     *
     * @param string $head
     * @return Theme
     */
    public function setHead($head)
    {
        $this->head = $head;
    
        return $this;
    }

    /**
     * Get head
     *
     * @return string 
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * Set menu
     *
     * @param string $menu
     * @return Theme
     */
    public function setMenu($menu)
    {
        $this->menu = $menu;
    
        return $this;
    }

    /**
     * Get menu
     *
     * @return string 
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * Set articleBundleArticleIndex
     *
     * @param string $articleBundleArticleIndex
     * @return Theme
     */
    public function setArticleBundleArticleIndex($articleBundleArticleIndex)
    {
        $this->articleBundleArticleIndex = $articleBundleArticleIndex;
    
        return $this;
    }

    /**
     * Get articleBundleArticleIndex
     *
     * @return string 
     */
    public function getArticleBundleArticleIndex()
    {
        return $this->articleBundleArticleIndex;
    }

    /**
     * Set articleBundleArticleRead
     *
     * @param string $articleBundleArticleRead
     * @return Theme
     */
    public function setArticleBundleArticleRead($articleBundleArticleRead)
    {
        $this->articleBundleArticleRead = $articleBundleArticleRead;
    
        return $this;
    }

    /**
     * Get articleBundleArticleRead
     *
     * @return string 
     */
    public function getArticleBundleArticleRead()
    {
        return $this->articleBundleArticleRead;
    }

    /**
     * Set forumBundleForumsAllBlock
     *
     * @param string $forumBundleForumsAllBlock
     * @return Theme
     */
    public function setForumBundleForumsAllBlock($forumBundleForumsAllBlock)
    {
        $this->forumBundleForumsAllBlock = $forumBundleForumsAllBlock;
    
        return $this;
    }

    /**
     * Get forumBundleForumsAllBlock
     *
     * @return string 
     */
    public function getForumBundleForumsAllBlock()
    {
        return $this->forumBundleForumsAllBlock;
    }

    /**
     * Set forumBundleForumsAllClassic
     *
     * @param string $forumBundleForumsAllClassic
     * @return Theme
     */
    public function setForumBundleForumsAllClassic($forumBundleForumsAllClassic)
    {
        $this->forumBundleForumsAllClassic = $forumBundleForumsAllClassic;
    
        return $this;
    }

    /**
     * Get forumBundleForumsAllClassic
     *
     * @return string 
     */
    public function getForumBundleForumsAllClassic()
    {
        return $this->forumBundleForumsAllClassic;
    }

    /**
     * Set forumBundleForumsViewClassic
     *
     * @param string $forumBundleForumsViewClassic
     * @return Theme
     */
    public function setForumBundleForumsViewClassic($forumBundleForumsViewClassic)
    {
        $this->forumBundleForumsViewClassic = $forumBundleForumsViewClassic;
    
        return $this;
    }

    /**
     * Get forumBundleForumsViewClassic
     *
     * @return string 
     */
    public function getForumBundleForumsViewClassic()
    {
        return $this->forumBundleForumsViewClassic;
    }

    /**
     * Set forumBundleForumsViewBlock
     *
     * @param string $forumBundleForumsViewBlock
     * @return Theme
     */
    public function setForumBundleForumsViewBlock($forumBundleForumsViewBlock)
    {
        $this->forumBundleForumsViewBlock = $forumBundleForumsViewBlock;
    
        return $this;
    }

    /**
     * Get forumBundleForumsViewBlock
     *
     * @return string 
     */
    public function getForumBundleForumsViewBlock()
    {
        return $this->forumBundleForumsViewBlock;
    }

    /**
     * Set forumBundleForumsReadClassic
     *
     * @param string $forumBundleForumsReadClassic
     * @return Theme
     */
    public function setForumBundleForumsReadClassic($forumBundleForumsReadClassic)
    {
        $this->forumBundleForumsReadClassic = $forumBundleForumsReadClassic;
    
        return $this;
    }

    /**
     * Get forumBundleForumsReadClassic
     *
     * @return string 
     */
    public function getForumBundleForumsReadClassic()
    {
        return $this->forumBundleForumsReadClassic;
    }

    /**
     * Set forumBundleForumsReadBlock
     *
     * @param string $forumBundleForumsReadBlock
     * @return Theme
     */
    public function setForumBundleForumsReadBlock($forumBundleForumsReadBlock)
    {
        $this->forumBundleForumsReadBlock = $forumBundleForumsReadBlock;
    
        return $this;
    }

    /**
     * Get forumBundleForumsReadBlock
     *
     * @return string 
     */
    public function getForumBundleForumsReadBlock()
    {
        return $this->forumBundleForumsReadBlock;
    }

    /**
     * Set userBundleUserProfile
     *
     * @param string $userBundleUserProfile
     * @return Theme
     */
    public function setUserBundleUserProfile($userBundleUserProfile)
    {
        $this->userBundleUserProfile = $userBundleUserProfile;
    
        return $this;
    }

    /**
     * Get userBundleUserProfile
     *
     * @return string 
     */
    public function getUserBundleUserProfile()
    {
        return $this->userBundleUserProfile;
    }

    /**
     * Set userBundleUserEditProfile
     *
     * @param string $userBundleUserEditProfile
     * @return Theme
     */
    public function setUserBundleUserEditProfile($userBundleUserEditProfile)
    {
        $this->userBundleUserEditProfile = $userBundleUserEditProfile;
    
        return $this;
    }

    /**
     * Get userBundleUserEditProfile
     *
     * @return string 
     */
    public function getUserBundleUserEditProfile()
    {
        return $this->userBundleUserEditProfile;
    }

    /**
     * Set articlesReadAuthor
     *
     * @param string $articlesReadAuthor
     * @return Theme
     */
    public function setArticlesReadAuthor($articlesReadAuthor)
    {
        $this->articlesReadAuthor = $articlesReadAuthor;

        return $this;
    }

    /**
     * Get articlesReadAuthor
     *
     * @return string 
     */
    public function getArticlesReadAuthor()
    {
        return $this->articlesReadAuthor;
    }

    /**
     * Set articlesReadComments
     *
     * @param string $articlesReadComments
     * @return Theme
     */
    public function setArticlesReadComments($articlesReadComments)
    {
        $this->articlesReadComments = $articlesReadComments;

        return $this;
    }

    /**
     * Get articlesReadComments
     *
     * @return string 
     */
    public function getArticlesReadComments()
    {
        return $this->articlesReadComments;
    }

    /**
     * Set articlesReadComment
     *
     * @param string $articlesReadComment
     * @return Theme
     */
    public function setArticlesReadComment($articlesReadComment)
    {
        $this->articlesReadComment = $articlesReadComment;

        return $this;
    }

    /**
     * Get articlesReadComment
     *
     * @return string 
     */
    public function getArticlesReadComment()
    {
        return $this->articlesReadComment;
    }

    /**
     * Set articlesRead
     *
     * @param string $articlesRead
     * @return Theme
     */
    public function setArticlesRead($articlesRead)
    {
        $this->articlesRead = $articlesRead;

        return $this;
    }

    /**
     * Get articlesRead
     *
     * @return string 
     */
    public function getArticlesRead()
    {
        return $this->articlesRead;
    }

    /**
     * Set articlesReadTitle
     *
     * @param string $articlesReadTitle
     * @return Theme
     */
    public function setArticlesReadTitle($articlesReadTitle)
    {
        $this->articlesReadTitle = $articlesReadTitle;

        return $this;
    }

    /**
     * Get articlesReadTitle
     *
     * @return string 
     */
    public function getArticlesReadTitle()
    {
        return $this->articlesReadTitle;
    }

    /**
     * Set articlesReadInfos
     *
     * @param string $articlesReadInfos
     * @return Theme
     */
    public function setArticlesReadInfos($articlesReadInfos)
    {
        $this->articlesReadInfos = $articlesReadInfos;

        return $this;
    }

    /**
     * Get articlesReadInfos
     *
     * @return string 
     */
    public function getArticlesReadInfos()
    {
        return $this->articlesReadInfos;
    }

    /**
     * Set articlesReadHeader
     *
     * @param string $articlesReadHeader
     * @return Theme
     */
    public function setArticlesReadHeader($articlesReadHeader)
    {
        $this->articlesReadHeader = $articlesReadHeader;

        return $this;
    }

    /**
     * Get articlesReadHeader
     *
     * @return string 
     */
    public function getArticlesReadHeader()
    {
        return $this->articlesReadHeader;
    }

    /**
     * Set articlesReadIntroduction
     *
     * @param string $articlesReadIntroduction
     * @return Theme
     */
    public function setArticlesReadIntroduction($articlesReadIntroduction)
    {
        $this->articlesReadIntroduction = $articlesReadIntroduction;

        return $this;
    }

    /**
     * Get articlesReadIntroduction
     *
     * @return string 
     */
    public function getArticlesReadIntroduction()
    {
        return $this->articlesReadIntroduction;
    }

    /**
     * Set articlesReadContents
     *
     * @param string $articlesReadContents
     * @return Theme
     */
    public function setArticlesReadContents($articlesReadContents)
    {
        $this->articlesReadContents = $articlesReadContents;

        return $this;
    }

    /**
     * Get articlesReadContents
     *
     * @return string 
     */
    public function getArticlesReadContents()
    {
        return $this->articlesReadContents;
    }

    /**
     * Set articlesReadContentSubtitle
     *
     * @param string $articlesReadContentSubtitle
     * @return Theme
     */
    public function setArticlesReadContentSubtitle($articlesReadContentSubtitle)
    {
        $this->articlesReadContentSubtitle = $articlesReadContentSubtitle;

        return $this;
    }

    /**
     * Get articlesReadContentSubtitle
     *
     * @return string 
     */
    public function getArticlesReadContentSubtitle()
    {
        return $this->articlesReadContentSubtitle;
    }

    /**
     * Set articlesReadContentPicture
     *
     * @param string $articlesReadContentPicture
     * @return Theme
     */
    public function setArticlesReadContentPicture($articlesReadContentPicture)
    {
        $this->articlesReadContentPicture = $articlesReadContentPicture;

        return $this;
    }

    /**
     * Get articlesReadContentPicture
     *
     * @return string 
     */
    public function getArticlesReadContentPicture()
    {
        return $this->articlesReadContentPicture;
    }

    /**
     * Set articlesReadContentParagraph
     *
     * @param string $articlesReadContentParagraph
     * @return Theme
     */
    public function setArticlesReadContentParagraph($articlesReadContentParagraph)
    {
        $this->articlesReadContentParagraph = $articlesReadContentParagraph;

        return $this;
    }

    /**
     * Get articlesReadContentParagraph
     *
     * @return string 
     */
    public function getArticlesReadContentParagraph()
    {
        return $this->articlesReadContentParagraph;
    }

    /**
     * Set articlesReadContentVideo
     *
     * @param string $articlesReadContentVideo
     * @return Theme
     */
    public function setArticlesReadContentVideo($articlesReadContentVideo)
    {
        $this->articlesReadContentVideo = $articlesReadContentVideo;

        return $this;
    }

    /**
     * Get articlesReadContentVideo
     *
     * @return string 
     */
    public function getArticlesReadContentVideo()
    {
        return $this->articlesReadContentVideo;
    }

    /**
     * Set articlesReadContentQuote
     *
     * @param string $articlesReadContentQuote
     * @return Theme
     */
    public function setArticlesReadContentQuote($articlesReadContentQuote)
    {
        $this->articlesReadContentQuote = $articlesReadContentQuote;

        return $this;
    }

    /**
     * Get articlesReadContentQuote
     *
     * @return string 
     */
    public function getArticlesReadContentQuote()
    {
        return $this->articlesReadContentQuote;
    }

    /**
     * Set usersLogin
     *
     * @param string $usersLogin
     * @return Theme
     */
    public function setUsersLogin($usersLogin)
    {
        $this->usersLogin = $usersLogin;

        return $this;
    }

    /**
     * Get usersLogin
     *
     * @return string 
     */
    public function getUsersLogin()
    {
        return $this->usersLogin;
    }
}
