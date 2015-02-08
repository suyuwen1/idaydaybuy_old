<?php
function __autoload($className){
	include 'class/'.$className.'_class.php';
}
$M=new Allfunction();
$page='search';
if (empty($_GET['s'])) {
	exit;
}
$w='title like "%'.$_GET['s'].'%" or store like "%'.$_GET['s'].'%"' ;
?>
<?php include('header.php');?>
		<div id="c">
			<ul>
				<?php
				$f=10;    //显示几页
				$n=isset($_GET['n'])?$_GET['n']:1;
				$sum=$M->sel_str('select count(*) as a from products where '.$w);
				$s=$M->biao('products')->where($w)->limit(($n-1)*$f,$f)->order('sort')->select();
				if ($s) {
					foreach ($s as $k => $v) {
						if ($k>=$f) {
							break;
						}
						// echo $k;
						$vv=mb_substr($v['description'], 0, 200, 'utf-8');
						echo <<< END
						<li class="c-li"><div class="c-li-img"><img src="{$v['img']}"></div><div class="c-li-info"><div class="title"><a href="{$v['id']}.html">{$v['title']}</a></div><div class="content">{$vv}</div><div class="qita"><div class="price_l"><div class="rmb">&yen;</div><div class="price">{$v['price']}</div><div class="store">{$v['store']}</div></div><div class="links"><a target="_blank" href="{$v['links']}">购买</a></div></div></div></li>
END;
					}
					echo '<div id="fanye">';
					$M->fengyan(ceil($sum['a']/$f),$n,'&s='.$_GET['s'],$f);
					echo '</div>';
				} else {
					echo '<span style="color:red;">没有找到"'.$_GET['s'].'"!</span>';
				}

				?>
			</ul>
		</div>
<?php include('footer.php');?>