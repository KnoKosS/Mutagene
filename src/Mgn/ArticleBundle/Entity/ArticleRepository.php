<?php

namespace Mgn\ArticleBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class ArticleRepository extends EntityRepository
{
	public function getArticlesIndex($page, $limit)
	{
		$query = $this
			->createQueryBuilder('a')
			->leftjoin('a.category', 'cat')
			->addSelect('cat')
			->leftjoin('a.author', 'u')
			->addSelect('u')
			->orderBy('a.dateTop', 'DESC')
			->where('a.status = :status')->setParameter('status', 'publish')
			->setFirstResult(($page-1) * $limit)
			->setMaxResults($limit)
			->getQuery()
			;

		return $query->getResult();
	}

	public function findOneArticle($id)
	{
		$qb = $this
			->createQueryBuilder('a')
			->leftjoin('a.category', 'cat')
	        ->addSelect('cat')
			->leftjoin('a.author', 'u')
	        ->addSelect('u')
			->leftjoin('a.contents', 'c')
	        ->addSelect('c')
			->leftjoin('a.messages', 'm')
			->addSelect('m')
			->leftjoin('m.author', 'ma')
			->addSelect('ma')
			->orderBy('c.position', 'ASC')
			->where('a.id = :id')->setParameter('id', $id)
			;

        return $qb->getQuery()->getOneOrNullResult();
	}

	public function findArticlesByCategory($id)
	{
		$qb = $this->createQueryBuilder('a');
		$qb->leftjoin('a.category', 'c');
		$qb->addSelect('c');
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
		$qb->andWhere('a.status = :status')
			->setParameter('status', 'publish');
	                // Enfin, on retourne le résultat.
	        return $qb->getQuery()
	                   ->getResult();
       
	}
}
