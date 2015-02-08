<?php
function __autoload($className){
	include 'class/'.$className.'_class.php';
}
$M=new Allfunction();
$page='index';
?>
<?php include('header.php');?>
		<div id="c">
			<div id="c-c">
				<?php
				$f=12;    //显示几页
				$n=isset($_GET['n'])?$_GET['n']:1;
				$sum=$M->sel_str('select count(*) as a from products');
				$s=$M->biao('products')->where('id>0')->limit(($n-1)*$f,$f)->order('sort')->select('id,title,price,old_price,store,img,links,description');
				if ($s) {
					foreach ($s as $k => $v) {
						if ($k>=$f) {
							break;
						}
						//$v['title']=mb_substr($v['title'], 0, 60, 'utf-8');
						echo <<< END
						<div class="c-li"><a href="{$v['id']}.html"><div class="c-li-img"><img src="{$v['img']}"></div></a><div class="c-li-info"><div class="title"><a href="{$v['id']}.html">{$v['title']}</a></div><div class="qita"><div class="price_l"><div class="rmb">&yen;</div><div class="price">{$v['price']}</div></div><div class="old_price_l">&yen; {$v['old_price']}</div></div></div></div>
END;
					}
				} else {
					echo '没有找到数据!';
				}

				?>
			</div>
		</div>
		<?php
			if ($s) {
				echo '<div id="fanye">';
				$M->fengyan(ceil($sum['a']/$f),$n,'',$f);
				echo '</div>';
			}
		?>
<?php include('footer.php');?>