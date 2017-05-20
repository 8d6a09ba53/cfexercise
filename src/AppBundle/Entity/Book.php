<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="books")
 */
class Book
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\Column(type="date")
     */
    private $releaseDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $length;

    /**
     * @ORM\Column(type="boolean")
     */
    private $readableByUser;

    /**
     * @ORM\Column(type="boolean")
     */
    private $readableByAdmin;

    /**
     * @var ArrayCollection
     * 
     * @ORM\ManyToMany(targetEntity="Genre", mappedBy="books", fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="books_genres",
     *     joinColumns={
     *      @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *      @ORM\JoinColumn(name="genre_id", referencedColumnName="id")
     *     }
     *   )
     */
    private $genres;

    public function __construct()
    {
        $this->genres = new ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     *
     * @return Book
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set length
     *
     * @param integer $length
     *
     * @return Book
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return integer
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set readableByUser
     *
     * @param boolean $readableByUser
     *
     * @return Book
     */
    public function setReadableByUser($readableByUser)
    {
        $this->readableByUser = $readableByUser;

        return $this;
    }

    /**
     * Get readableByUser
     *
     * @return boolean
     */
    public function getReadableByUser()
    {
        return $this->readableByUser;
    }

    /**
     * Set readableByAdmin
     *
     * @param boolean $readableByAdmin
     *
     * @return Book
     */
    public function setReadableByAdmin($readableByAdmin)
    {
        $this->readableByAdmin = $readableByAdmin;

        return $this;
    }

    /**
     * Get readableByAdmin
     *
     * @return boolean
     */
    public function getReadableByAdmin()
    {
        return $this->readableByAdmin;
    }

    /**
     * Add genre
     *
     * @param \AppBundle\Entity\Genre $genre
     *
     * @return Book
     */
    public function addGenre(\AppBundle\Entity\Genre $genre)
    {
        $this->genres[] = $genre;

        return $this;
    }

    /**
     * Remove genre
     *
     * @param \AppBundle\Entity\Genre $genre
     */
    public function removeGenre(\AppBundle\Entity\Genre $genre)
    {
        $this->genres->removeElement($genre);
    }

    /**
     * Get genres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGenres()
    {
        return $this->genres;
    }
}
