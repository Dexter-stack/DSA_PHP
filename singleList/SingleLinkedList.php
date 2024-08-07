<?php

require "Node.php";

class SingleLinkedList
{

    public  $head;

    public function __construct($head)
    {
        $this->head = $head;
    }

    public function getHead()
    {

        return $this->head;
    }




    public function display()
    {

        if ($this->head == null) {
            return null;
        }
        $currentNode = $this->head;
        while ($currentNode != null) {

            echo "$currentNode->data ->";
            $currentNode = $currentNode->nextNode;
        }
        echo "null";
    }



    public function insertFirst($data)
    {

        $newNode = new Node($data);
        if ($this->head == null) {
            $this->head  = $newNode;
        }

        $newNode->nextNode = $this->head; // link the newNode to the head 
        $this->head = $newNode; // then shift the head to the newNode

    }

    public function insertLast($data)
    {
        $newNode = new Node($data);

        if ($this->head == null) {
            $this->head =  $newNode;
        }
        $currentNode = $this->head;
        while ($currentNode->nextNode != null) {
            $currentNode =  $currentNode->nextNode;
        }
        $currentNode->nextNode = $newNode; // link the new node with the current node 
        $newNode->nextNode = null;  // then link the new node before the null

    }


    public function insertNthPosition($position, $data)
    {

        $newNode  = new Node($data);
        if ($position == 1) {
            $newNode->nextNode = $this->head;
            $this->head = $newNode;
        } else {

            $count = 1;
            $previousNode = $this->head;  // the previous is pointing

            while ($count < $position - 1) {

                $previousNode = $previousNode->nextNode;
                $count = $count + 1;
            }
            $currentNode = $previousNode->nextNode;  // keep the current node here 
            $previousNode->nextNode = $newNode;   // link the new node with the previous node 
            $newNode->nextNode = $currentNode;   // shift the new node before the current node 



        }
    }



    public function deleteFirst()
    {
        if ($this->head == null || $this->head->nextNode == null) {
            return $this->head;
        }

        $tempNode =  $this->head;
        $this->head =  $this->head->nextNode;
        $tempNode->nextNode = null;
        return $tempNode;
    }



    public function deleteLast()
    {
        if ($this->head == null) {
            return null;
        }
        $currentNode = $this->head;
        $previousNode = null;
        while ($currentNode->nextNode != null) {
            $previousNode = $currentNode;
            $currentNode = $currentNode->nextNode;
        }

        $previousNode->nextNode = null;
        return $currentNode;
    }


    /*
    Q. Implement method to delete a node at a given position. Assuming position to be valid and starting from 1.
     */

    public function deleteNthPostion($position)
    {
        if ($position == 1) {
            $this->head = $this->head->nextNode;
        }

        $count = 1;
        $previousNode = $this->head;

        while ($count < $position - 1) {

            $previousNode = $previousNode->nextNode;
            $count++;
        }
        $currentNode = $previousNode->nextNode;
        $previousNode->nextNode = $currentNode->nextNode;
        return $currentNode;
    }

    public function search($searchKey)
    {

        if ($this->head == null) {
            return false;
        }

        $currentNode = $this->head;
        while ($currentNode != null) {
            if ($currentNode->data == $searchKey) {
                return true;
            }
            $currentNode = $currentNode->nextNode;
        }
        return false;
    }


    public function reverse()
    {

        if ($this->head == null) {
            return null;
        }

        $nextNode = null;
        $currentNode = $this->head;
        $previousNode = null;

        while ($currentNode != null) {
            $nextNode = $currentNode->nextNode;
            $currentNode->nextNode = $previousNode;
            $previousNode = $currentNode;
            $currentNode = $nextNode;
        }

        $this->head = $previousNode;
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

/*
implementing the insertFirst($data) function
*/
$list->insertFirst(34);
$list->insertFirst(67);

/*
implementing the insertLast($data) function
*/
$list->insertLast(46);
$list->insertLast(68);

$list->insertNthPosition(3, 200);
$list->display();

echo "Deleted data : " . $list->deleteFirst()->data  . "<br>";

$list->display();

echo "Deleted data : " . $list->deleteLast()->data  . "<br>";
$list->display();

echo "Deleted data : " . $list->deleteNthPostion(3)->data  . "<br>";





$list->display();

echo "<br>";

if ($list->search(78)) {
    echo "key found";
} else {
    echo "key not founcd";
}

$list->reverse();
echo "<br>";
echo "The reversed List : ";
$list->display();
