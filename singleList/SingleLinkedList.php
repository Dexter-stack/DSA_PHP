<?php

require "Node.php";

class SingleLinkedList{

    public  $head;

    public function __construct($head)
    {
        $this->head = $head;
    }

    public function getHead()  {

        return $this->head;
        
    }

    


    public function display(){

        if($this->head == null){
            return null;
        }
        $currentNode = $this->head;
        while($currentNode != null){
           
            echo "$currentNode->data ->";
            $currentNode = $currentNode->nextNode;
           
        }
        echo "null";
    }


}

$head =  new Node(57);

$list =  new SingleLinkedList($head);

$first = new Node(20);
$second = new Node(30);
$third = new Node(45);

$head->nextNode = $first;
$first->nextNode = $second;
$second->nextNode = $third;
$third->nextNode = null;


$list->display();




















?>