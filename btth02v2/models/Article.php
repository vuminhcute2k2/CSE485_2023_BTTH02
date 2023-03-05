<?php
class Article{
    // Thuộc tính

    private $title;
    private $summary;
    private $cat_name;
    private $content;


    public function __construct($title, $summary,$cat_name, $content){
        $this->title = $title;
        $this->summary = $summary;
        $this->cat_name = $cat_name;
        $this->content = $content;
    }

    // Setter và Getter
    public function getTitle(){
        return $this->title;
    }
    public function setTitle($newTitle){
        return $this->title = $newTitle;
    }
    public function getsummary(){
        return $this->summary;
    }
    public function setsummary($newsummary){
        return $this->summary = $newsummary;
    }
    public function getcat_name(){
        return $this->cat_name;
    }
    public function setcat_name($newcat_name){
        return $this->cat_name = $newcat_name;
    }
    public function getcontent(){
        return $this->content;
    }
    public function setcontent($newcontent){
        return $this->content = $newcontent;
    }

}