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
	public function findAllWithCategories()
    {
    	$qb = $this->createQueryBuilder('f');
		$qb->leftJoin('f.category', 'c');
        $qb->addSelect('c');
		$qb->leftJoin('f.lastTopic', 't');
		$qb->addSelect('t');
		$qb->leftJoin('t.lastMessage', 'm');
		$qb->addSelect('m');
		$qb->orderBy('c.sort', '');
		$qb->addOrderBy('f.sort', '');
	                // Enfin, on retourne le résultat.
	        return $qb->getQuery()
	                   ->getResult();
    }

    public function findOneForum($id)
    {
    	$qb = $this->createQueryBuilder('f');
		$qb->leftJoin('f.category', 'c');
        $qb->addSelect('c');
		$qb->leftJoin('f.topics', 't');
        $qb->addSelect('t');
		$qb->leftJoin('t.firstMessage', 'fm');
        $qb->addSelect('fm');
		$qb->leftJoin('t.lastMessage', 'lm');
        $qb->addSelect('lm');
		$qb->where('f.id = :id')
			->setParameter('id', $id);
		$qb->orderBy('t.typeTopic', 'DESC');
		$qb->addOrderBy('lm.date', 'DESC');
	                // Enfin, on retourne le résultat.
	        return $qb->getQuery()
	                   ->getOneOrNullResult();
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
