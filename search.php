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
		<div id="c"><div id="c-c" style="padding-top:0px">
				<?php
				$f=12;    //显示几页
				$n=isset($_GET['n'])?$_GET['n']:1;
				$sum=$M->sel_str('select count(*) as a from products where '.$w);
				$s=$M->biao('products')->where($w)->limit(($n-1)*$f,$f)->order('sort')->select();
				if ($s) {
					echo '<div id="search_t_i">共找到 '.$sum['a'].' 件包含 “'.$_GET['s'].'” 的宝贝：</div>';
					foreach ($s as $k => $v) {
						if ($k>=$f) {
							break;
						}
						// echo $k;
						//$vv=mb_substr($v['description'], 0, 200, 'utf-8');
						echo <<< END
						<div class="c-li"><a href="{$v['id']}.html"><div class="c-li-img"><img src="{$v['img']}"></div></a><div class="c-li-info"><div class="title"><a href="{$v['id']}.html">{$v['title']}</a></div><div class="qita"><div class="price_l"><div class="rmb">&yen;</div><div class="price">{$v['price']}</div></div><div class="old_price_l">&yen; {$v['old_price']}</div></div></div></div>
END;
					}
				} else {
					echo '<span style="color:red;">没有找到"'.$_GET['s'].'"!</span>';
				}

				?>
		</div></div>
		<?php
			if ($s) {
				$ss=ceil($sum['a']/$f);
				if ($ss!=1) {
					echo '<div id="fanye">';
					$M->fengyan($ss,$n,'',$f);
					echo '</div>';
				}
			}
		?>
<?php include('footer.php');?>