<?php


namespace AppBundle\Service;


class LibraryHandler {

    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
      $this->em = $em;
    }

    public function getBooksListing($includeAdminBooks = false, $completeList = false) {

        $qb = $this->em->createQueryBuilder();

        $qb->select('b')
            ->from('AppBundle:Book','b')
            ->orderBy('b.id', 'ASC');

        if ($includeAdminBooks) {
            $qb->where('b.readableByAdmin = 1');
        } else {
            $qb->where('b.readableByUser = 1');
        }

        if (!$completeList) {
            $qb->setMaxResults(5);
        }

        $query = $qb->getQuery();
        $books = $query->getResult();
        
        return $books;
    }

    public function getBook($name) {

        $qb = $this->em->createQueryBuilder();

        $qb->select('b')
           ->from('AppBundle:Book','b')
           ->where('b.title = :name')
           ->setParameter('name', $name);

        $query = $qb->getQuery();
        $book = $query->getResult();

        return $book[0];
    }
    
    public function getGenre($name) {

        $qb = $this->em->createQueryBuilder();

        $qb->select('g')
           ->from('AppBundle:Genre','g')
           ->where('g.name = ?1')
           
           ->setParameter(1, $name);

        $query = $qb->getQuery();
        $genre = $query->getResult();

        return $genre[0];
    }
}