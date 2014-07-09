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
	private $cover;
	private $dimensions;
	private $pages;
    private $contents;

    function __construct($id) {
    }

   function get_book($id){
    }

    function set_book($id, $type, $cover_image, $authors, $edition, $isbn,
                      $publisher, $webpage, $location, $cover, $dimensions,
                      $pages, $contents){
    }
}

class Publisher {
}

?>
