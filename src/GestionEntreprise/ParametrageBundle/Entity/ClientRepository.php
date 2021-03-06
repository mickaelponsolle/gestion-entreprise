<?php

namespace GestionEntreprise\ParametrageBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ClientRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClientRepository extends EntityRepository
{
    public function findAllOrderByNom()
    {
        $qb = $this->createQueryBuilder('clt');

        $qb ->orderBy('clt.nom, clt.prenom');
			
		// Enfin, on retourne le r�sultat.
        return $qb->getQuery()->getResult();
    }
    
    public function findByNameWith($nameWith)
    {
        $qb = $this->createQueryBuilder('clt');

        $qb ->where('clt.nom like :nameWith')
			->setParameter('nameWith', '%'.$nameWith.'%')
            ->orderBy('clt.nom, clt.prenom');
			
		// Enfin, on retourne le r�sultat.
        return $qb->getQuery()->getResult();
    }
}