<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170519122521 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {

        $books = array(
            array('id' =>  1, 'title' => "Doctor With Big Eyes", 'rdate' => "2016-02-01", 'pages' => 200, 'userread' => 1, 'adminread' => 1),
            array('id' =>  2, 'title' => "Hunger Of My Town", 'rdate' => "2016-05-02", 'pages' => 10, 'userread' => 1, 'adminread' => 1),
            array('id' =>  3, 'title' => "Colleagues And Demons", 'rdate' => "2015-04-06", 'pages' => 30, 'userread' => 1, 'adminread' => 1),
            array('id' =>  4, 'title' => "Humans In The Library", 'rdate' => "1982-06-15", 'pages' => 600, 'userread' => 0, 'adminread' => 1),
            array('id' =>  5, 'title' => "Founders Of Evil", 'rdate' => "1530-08-30", 'pages' => 900, 'userread' => 1, 'adminread' => 1),
            array('id' =>  6, 'title' => "Ancestor With Horns", 'rdate' => "2019-10-10", 'pages' => 1000, 'userread' => 1, 'adminread' => 1),
            array('id' =>  7, 'title' => "Age Of The Light", 'rdate' => "1923-12-06", 'pages' => 234, 'userread' => 1, 'adminread' => 1),
            array('id' =>  8, 'title' => "Learning With The River", 'rdate' => "1965-02-02", 'pages' => 200, 'userread' => 1, 'adminread' => 1),
            array('id' =>  9, 'title' => "Lord And Buffoon", 'rdate' => "2001-07-09", 'pages' => 240, 'userread' => 1, 'adminread' => 1),
            array('id' => 10, 'title' => "The 10th Book", 'rdate' => "2017-05-16", 'pages' => 42, 'userread' => 1, 'adminread' => 1),
        );

        foreach ($books as $book) {
            $this->addSql('INSERT INTO books (id, title, release_date, length, readable_by_user, readable_by_admin) VALUES (:id, :title, :rdate, :pages, :userread, :adminread);', $book);
        }

        $genres = array(
            array('id' => 1, 'title' => "Police"),
            array('id' => 2, 'title' => "Comedy"),
            array('id' => 3, 'title' => "Non-fiction"),
            array('id' => 4, 'title' => "Horror"),
            array('id' => 5, 'title' => "Drama"),
            array('id' => 6, 'title' => "Tragedy"),
            array('id' => 7, 'title' => "Children"),
            array('id' => 8, 'title' => "Fiction"),
            array('id' => 9, 'title' => "Satire"),
        );

        foreach ($genres as $genre) {
            $this->addSql('INSERT INTO genre (id, name) VALUES (:id, :title);', $genre);
        }

        $books_genres = array(
            array('book' => 1, 'genre' => 1),
            array('book' => 2, 'genre' => 2),
            array('book' => 3, 'genre' => 5),
            array('book' => 4, 'genre' => 3),
            array('book' => 4, 'genre' => 4),
            array('book' => 5, 'genre' => 5),
            array('book' => 6, 'genre' => 5),
            array('book' => 7, 'genre' => 6),
            array('book' => 8, 'genre' => 7),
            array('book' => 8, 'genre' => 8),
            array('book' => 9, 'genre' => 4),
            array('book' => 9, 'genre' => 9),
            array('book' =>10, 'genre' => 9),
        );

        foreach ($books_genres as $book_genre) {
            $this->addSql('INSERT INTO books_genres (book_id, genre_id) VALUES (:book, :genre);', $book_genre);
        }

        $users = array(
            array('name' => 'user', 'email' => 'user@example.org', 'pw' => '$2y$13$UV.w9PCkzj1XPEowuVzEweQIxB11xUixSpvf.iMZ5vXOSbMwy4BHK', 'role' => serialize(array())),
            array('name' => 'admin', 'email' => 'admin@example.org', 'pw' => '$2y$13$hF6Vv9CQYuNB2O/ez2nKleAZsPSzkmYNnIEPx743qdEwMQivMoy5G', 'role' => serialize(array('ROLE_ADMIN'))),
        );

        foreach ($users as $user) {
            $this->addSql('INSERT INTO fos_user (username, username_canonical, email, email_canonical, password, roles, enabled) VALUES (:name, :name, :email, :email, :pw, :role, 1);', $user);
        }

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('TRUNCATE books_genres');
        $this->addSql('TRUNCATE books;');
        $this->addSql('TRUNCATE genre');


    }
}
