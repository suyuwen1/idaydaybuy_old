<?php
function __autoload($className){
	include 'class/'.$className.'_class.php';
}
$M=new Allfunction();
$page='index';
?>
<?php include('header.php');?>
		<div id="c">
			<ul>
				<?php
				$f=10;    //显示几页
				$n=isset($_GET['n'])?$_GET['n']:1;
				$sum=$M->sel_str('select count(*) as a from products');
				$s=$M->biao('products')->where('id>0')->limit(($n-1)*$f,$f)->order('sort')->select();
				if ($s) {
					foreach ($s as $k => $v) {
						if ($k>=$f) {
							break;
						}
						// echo $k;
						echo <<< END
						<li class="c-li"><div class="c-li-img"><img src="img/123.png"></div><div class="c-li-info"><div class="title">{$v['title']}</div><div class="content">{$v['content']}</div><div class="qita"><div class="price_l"><div class="rmb">&yen;</div><div class="price">{$v['price']}</div><div class="store">{$v['store']}</div></div><div class="links"><a target="_blank" href="{$v['links']}">购买</a></div></div></div></li>
END;
					}
					echo '<div id="fanye">';
					$M->fengyan(ceil($sum['a']/$f),$n,'',$f);
					echo '</div>';
				} else {
					echo '没有找到数据!';
				}

				?>
			</ul>
		</div>
<?php include('footer.php');?>