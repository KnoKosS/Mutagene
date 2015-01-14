<?php
namespace Mgn\ForumBundle\Entity;

use Doctrine\ORM\EntityRepository;

class TopicRepository extends EntityRepository
{
	public function getWithMessages($id, $page, $limit)
    {
    	$query = $this
			->createQueryBuilder('t')
			->leftJoin('t.forum', 'f')
	        ->addSelect('f')
			->leftJoin('f.category', 'c')
	        ->addSelect('c')
			->leftJoin('t.messages', 'm')
			->addSelect('m')
			->leftJoin('m.author', 'u')
			->addSelect('u')
			->orderBy('m.date', '')
			->where('t.id = :id')->setParameter('id', $id)
			->setFirstResult(($page-1) * $limit)
			->setMaxResults($limit)
			->getQuery()
			;

		return $query->getOneorNullResult();
    }

    public function findOneByIdWithLastPost($topicId)
    {
    	$qb = $this->createQueryBuilder('t');
		$qb->leftJoin('t.lastMessage', 'l');
        $qb->addSelect('l');
		$qb->where('t.id = :id')
			->setParameter('id', $topicId);
	                // Enfin, on retourne le résultat.
	        return $qb->getQuery()
	                   ->getOneorNullResult();
    }
}
