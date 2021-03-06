<?php

namespace Mgn\CoreBundle\Twig\Extension;

class AvatarExtension extends \Twig_Extension
{
    public function getName()
	{
		return 'mgn_avatar';
	}
	
	public function getFilters()
    {
        return array(
           'avatar' => new \Twig_Filter_Method($this, 'avatar'),
        );
    }

    public function avatar($avatarType, $avatarPath, $email, $size, $class)
    {
        if ($avatarType == 'gravatar')
        {
            return '<img src="http://www.gravatar.com/avatar/'.md5( strtolower( trim( $email ) ) ).'?s='.$size.'&r=g&d=mm" alt="avatar" class="'.$class.'" />';
        }
        elseif ($avatarType == 'personal')
        {
            return '<img src="/uploads/avatars/'.$avatarPath.'" alt="avatar" style="width: '.$size.'px;" class="'.$class.'" />';
        }
        else
        {
            return '<img src="/theme/images/avatar.png" alt="avatar" style="width: '.$size.'px;" class="'.$class.'" />';
        }
    }
}
