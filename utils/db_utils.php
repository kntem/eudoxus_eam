<?php

// Creates mapping between db tables and objects
// Every class is a db table with their private data being the db columns

class Book {

    private $id;
    private $type;
    private $cover_image;
    private $authors;
    private $edition;
    private $isbn;
    private $publisher;
    private $webpage;
    private $location;
    private $dimensions;
    private $pages;
    private $abstract;

    function __construct() {
        // Gets book from db and calls set_book
    }


    function set_book($id, $type, $cover_image, $authors, $edition, $isbn,
                      $publisher, $webpage, $location, $cover, $dimensions,
                      $pages, $abstract){
        $this->id = $id;
        $this->type= $type;
        $this->cover_image = $cover_image;
        $this->authors = $authors;
        $this->edition = $isbn;
        $this->publisher = $publisher;
        $this->webpage = $location;
        $this->cover = $dimensions;
        $this->pages = $pages;
        $this->abstract= $abstract;
    }


    function get_id(){
        return $this->id;
    }

    function get_type(){
        return $this->type;
    }

    function get_cover_image(){
        return $this->cover_image;
    }

    function get_authors(){
        return $this->authors;
    }

    function get_edition(){
        return $this->edition;
    }

    function get_isbn(){
        return $this->edition;
    }

    function get_publisher(){
        return $this->publisher;
    }

    function get_webpage(){
        return $this->webpage;
    }

    function get_location(){
        return $this->location;
    }

    function get_dimensions(){
        return $this->dimensions;
    }

    function get_pages(){
        return $this->pages;
    }

    function get_abstract(){
        return $this->abstract;
    }
}

class Publisher {
}

?>
