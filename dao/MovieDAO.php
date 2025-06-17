<?php

require_once "models/Movie.php";
require_once "models/Message.php";

//Review DAO
require_once "dao/ReviewDAO.php";

class MovieDAO implements MovieDAOInterface {

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url) {
        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);
    }

    public function buildMovie($data) {

        $movie = new Movie();

        $movie->id = $data["id"];
        $movie->title = $data["title"];
        $movie->description = $data["description"];
        $movie->image = $data["image"];
        $movie->trailer = $data["trailer"];
        $movie->category = $data["category"];
        $movie->length = $data["length"];
        $movie->users_id = $data["users_id"];

        //Recebe as ratings do filme
        $reviewDao = new ReviewDAO($this->conn, $this->url);

        $rating = $reviewDao->getRatings($movie->id);

        $movie->rating = $rating;

        return $movie;
    }

    public function findAll() {

    }

    public function getLatestMovies() {
        $movies = [];

        $stmt = $this->conn->query("SELECT * FROM movies ORDER BY id DESC");

        $stmt->execute();

        if($stmt->rowCount() > 0) {

            $moviesArray = $stmt->fetchAll();

            foreach($moviesArray as $movie) {
                $movies[] = $this->buildMovie($movie);
            }
        }

        return $movies;
    }

    public function getMoviesByCategory($category) {

        $movies = [];

        $stmt=$this->conn->prepare("SELECT * FROM movies
        WHERE category=:category
        ORDER BY id DESC");

        $stmt->bindParam(":category", $category);

        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $moviesArray = $stmt->fetchAll();

            foreach($moviesArray as $movie) {
                $movies[] = $this->buildMovie($movie);
            }
        }

        return $movies;
    }

    public function getMoviesByUserId($id) {

        $movies=[];

        $stmt = $this->conn->prepare("SELECT * FROM movires WHERE users_id=:users_id");

        $stmt->execute();

        if($stmt->rowCount() > 0) {

            $moviesArray = $stmt->fetchAll();

            foreach($moviesArray as $movie) {
                $movies[] = $this->buildMovie($movie);
            }
        }

        return $movies;
    }

    public function findById($id) {

        $movie = [];

        $stmt = $this->conn->prepare("SELECT * FROM movies WHERE id=:id");

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        if($stmt->rowCount() > 0) {
            
            $movieData = $stmt->fetch();

            $movie = $this->buildMovie($movieData);

            return $movie;
        } else {
            return false;
        }
    }

    public function findByTitle($title) {

        
    }
}