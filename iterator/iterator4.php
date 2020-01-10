<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
/*
     Object Iteration

     The PHP arrays are the most frequent collection structure used in PHP. We can squeeze pretty much anything into an array, ranging
     from scalar values of objects. Iterating through elements of such a structure is trivially easy using foreach statement. However 
     arrays are the only iterable types, as objects themselves are iterables.


*/

     //Let's take a look at the following example array-based.

     $user = ['name' => 'John', 'age' => 90, 'salary' => 42.000];

     foreach($user as $k => $v) {

             echo "key: {$k} , value: {$v}<br/>" . PHP_EOL;
     } 

     echo"<br/>";  
     //Now let's take a look at the following example object-based example:

     class User {

     	   public $name = 'John';
     	   public $age = 90;
     	   public $salary = 42.000;
     }

     $user = new User();

     foreach($user as $k => $v) {

     	    echo "key: {$k} , value: {$v}<br/>" . PHP_EOL;     
     }

     // Executed on the console, both of these examples would yield an identical output
     // By default, iteration works only with public properties, excluding any protected or private properties from the list.
     // PHP provides an Iterator interface, making it possible to specify what values we want to make available for iterating.
     // The following example demostrates a simple Iterator interface implementation.

     class User2 implements Iterator {

     	   public $name = 'John';
     	   protected $age = 90;
     	   private $salary = 45.000;

     	   private $data = [];

     	   public function __construct() {

     	   	      $this->data = [
     	   	      	      'name' => $this->name,
     	   	      	      'age' => $this->age,
     	   	      	      'salary' => $this->salary
     	   	      ];

     	   }

     	   public function current() {

     	   	      return current($this->data);
     	   }

     	   public function key() {

     	   	      return key($this->data);  
     	   }

     	   public function next() {
     	   	      return next($this->data);
     	   }

     	   public function valid() {

                  $key = key($this->data);

                  return ($key !== false && $key !== null );
     	   }

     	   public function rewind() {

     	   	      return reset($this->data);
     	   }

     }

     $user = new User2();

     foreach($user as $k => $v) {

         echo "key: {$k} , value: {$v}<br/>"  . PHP_EOL;     
     }

  ?> 
