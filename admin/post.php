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
    protected $rdt='';
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
    /*function sel($a,$b='',$c='',$d=''){
        if ($c='') {
            $s=$this->biao('products')->where($a)->order($b)->select('id');
        }
        $s=$this->biao('products')->where($a)->order($c)->select('id');
    }*/
    function add(){
    	//var_dump($this->dt);
        $s=$this->biao('products')->where('title="'.$this->dt['title'].'"')->limit(0,1)->select('id');
        if (!$s) {
            $a=$this->biao('products')->insert($this->dt);
            if($a){
                $this->rdt=array(1,'提交成功！');
            }else{
                $this->rdt=array(0,'提交失败，请稍后再试！');
            }
        }else{
            $this->rdt=array(0,'已存在！');
        }
    }
    function change(){

    }
    function del(){

    }
    function info(){
        echo json_encode($this->rdt);
    }
}
$p=new Product($_POST);
$p->info();
?>