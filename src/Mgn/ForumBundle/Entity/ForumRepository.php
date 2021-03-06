<?php

namespace Mgn\ForumBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ForumRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ForumRepository extends EntityRepository
{
	public function getAllWithCategories()
    {
    	$query = $this
			->createQueryBuilder('f')
			->leftJoin('f.category', 'c')
	        ->addSelect('c')
			->leftJoin('f.lastTopic', 't')
			->addSelect('t')
			->leftJoin('t.lastMessage', 'm')
			->addSelect('m')
			->leftJoin('m.author', 'a')
			->addSelect('a')
			->orderBy('c.sort', '')
			->addOrderBy('f.sort', '')
			->getQuery()
			;

		return $query->getResult();
    }

    public function getForum($id)
    {
    	$query = $this
    		->createQueryBuilder('f')
			->leftJoin('f.category', 'c')
	        ->addSelect('c')
			->leftJoin('f.topics', 't')
	        ->addSelect('t')
			->leftJoin('t.firstMessage', 'fm')
	        ->addSelect('fm')
			->leftJoin('fm.author', 'fa')
			->addSelect('fa')
			->leftJoin('t.lastMessage', 'lm')
	        ->addSelect('lm')
			->leftJoin('lm.author', 'la')
			->addSelect('la')
			->where('f.id = :id')->setParameter('id', $id)
			->orderBy('t.typeTopic', 'DESC')
			->addOrderBy('lm.date', 'DESC')
			->getQuery()
			;

		return $query->getOneOrNullResult();
    }

    public function findOneByIdWithLastMessage($forumId)
    {
    	$qb = $this->createQueryBuilder('f');
		$qb->leftJoin('f.lastMessage', 'l');
        $qb->addSelect('l');
		$qb->where('f.id = :id')
			->setParameter('id', $forumId);
	                // Enfin, on retourne le résultat.
	        return $qb->getQuery()
	                   ->getOneorNullResult();
    }
}
