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
    protected $i='';
    function __construct($a){
    	Mydb::__construct();
    	$this->dt=$a['d'];
    	switch ($a['name']) {
    		case 'add':
    			$this->add();
    			break;
    		case 'change':
                $this->i=$a['i'];
    			$this->change();
    			break;
    		case 'del':
    			$this->del();
    			break;
            case 'sel':
                $this-sel();
                break;
    	}
    }
    // function sel($a){
    //     $s=$this->biao('products')->where('id'>0)->order()->select();
    //     if ($s) {
    //         $ss='';
    //         foreach ($s as $key => $value) {
    //             $ss.='<div>'.$value['title '].'</div>';
    //         }
    //         $this->rdt=array(1,$ss);
    //     }else{
    //         $this->rdt=array(0,'未找到数据！');
    //     }
    // }
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
        $c=$this->biao('products')->where('id="'.$this->i.'"')->update($this->dt);
        if ($c) {
            // echo $c;
            $this->rdt=array(1,'修改成功！');
        }else{
            $this->rdt=array(0,'修改失败，请稍后再试！');
        }
    }
    function del(){
        $d=$this->biao('products')->where('id="'.$this->dt.'"')->delete();
        if ($d) {
            $this->rdt=array(1,'删除成功！');
        }else{
            $this->rdt=array(0,'删除失败，请稍后再试！');
        }
    }
    function info(){
        echo json_encode($this->rdt);
    }
}
$p=new Product($_POST);
$p->info();
?>