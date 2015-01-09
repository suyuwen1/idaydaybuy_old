<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2015-01-09 14:27:55
 * @version $Id$
 */
require_once("../class/Mydb_class.php");
require_once("../class/Allfunction_class.php");
class Product extends Allfunction {
    protected $dt='';
    function __construct($a){
    	Mydb::__construct();
    	$this->dt=$a['d'];
    	switch ($a['name']) {
    		case 'add':
    			$this->add();
    			break;
    		case 'change':
    			$this->change();
    			break;
    		case 'del';
    			$this->del();
    			break;
    	}
    }
    function add(){
    	var_dump($this->dt);
    	$a=$this->biao('products')->insert($this->dt);
    	if($a){
    		return true;
    	}
    }
    function change(){

    }
    function del(){

    }
}
$p=new Product($_POST);
var_dump($p->add());
?>