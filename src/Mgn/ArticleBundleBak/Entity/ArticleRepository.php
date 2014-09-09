<?php

namespace Mgn\ArticleBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends EntityRepository
{
	public function findArticlesByCategory($id)
	{
		$qb = $this->createQueryBuilder('a');
		$qb->leftjoin('a.category', 'c');
		$qb->orderBy('a.dateTop', 'DESC');
		$qb->where('c.id = :id')
			->setParameter('id', $id);
	                // Enfin, on retourne le résultat.
	        return $qb->getQuery()
	                   ->getResult();
       
	}

	public function findArticlesByCategorySlug($slug)
	{
		$qb = $this->createQueryBuilder('a');
		$qb->leftjoin('a.category', 'c');
		$qb->addSelect('c');
		$qb->leftjoin('a.author', 'u');
		$qb->addSelect('u');
		$qb->orderBy('a.dateTop', 'DESC');
		$qb->where('c.slug = :slug')
			->setParameter('slug', $slug);
	                // Enfin, on retourne le résultat.
	        return $qb->getQuery()
	                   ->getResult();
       
	}

	public function findOneArticle($id)
	{
		$qb = $this->createQueryBuilder('a');
		$qb->leftjoin('a.category', 'c');
        $qb->addSelect('c');
		$qb->leftjoin('a.author', 'u');
        $qb->addSelect('u');
		$qb->where('a.id = :id')
			->setParameter('id', $id);
	                // Enfin, on retourne le résultat.
	        return $qb->getQuery()
	                   ->getOneOrNullResult();
       
	}
}
