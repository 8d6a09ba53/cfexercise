<?php

namespace AppBundle\Controller;

//use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {

        // if visitor is not authenticated, redirect to login page
        // I'm pretty sure there is a better way to do this. Adding the same code in every single action isn't ideal
        if (!$this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('fos_user_security_login');
        }

        $libraryHandler = $this->container->get('app.library_handler');
        $books = $libraryHandler->getBooksListing($this->isGranted('ROLE_ADMIN'), false);

        // render template and return it
        return $this->render('exercise/booklisting.html.twig', [
            'books' => $books,
            'showbutton' => true,
        ]);
         
    }

    /**
     * @Route("/all", name="all_books")
     */
    public function allAction()
    {

        // if visitor is not authenticated, redirect to login page
        if (!$this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('fos_user_security_login');
        }

        $libraryHandler = $this->container->get('app.library_handler');
        $books = $libraryHandler->getBooksListing($this->isGranted('ROLE_ADMIN'), true);

        // render template and return it
        return $this->render('exercise/booklisting.html.twig', [
            'books' => $books,
            'showbutton' => false,
        ]);

    }

    /**
     * @Route("/book/{name}", name="show_book")
     */
    public function bookAction($name)
    {

        // if visitor is not authenticated, redirect to login page
        if (!$this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('fos_user_security_login');
        }

        $libraryHandler = $this->container->get('app.library_handler');
        $book = $libraryHandler->getBook($name);

        // render template and return it
        return $this->render('exercise/book.html.twig', [
            'book' => $book,
        ]);

    }

    /**
     * @Route("/genre/{name}", name="show_genre")
     */
    public function genreAction($name)
    {

        // if visitor is not authenticated, redirect to login page
        if (!$this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('fos_user_security_login');
        }

        $libraryHandler = $this->container->get('app.library_handler');
        $genre = $libraryHandler->getGenre($name);

        // render template and return it
        return $this->render('exercise/genre.html.twig', [
            'genre' => $genre,
        ]);

    }
}
