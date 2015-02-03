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
				$s=$M->biao('products')->where('id>0')->limit(($n-1)*$f,$f)->order('sort')->select('id,title,price,store,img,links,description');
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
					$M->fengyan(ceil($sum['a']/$f),$n,'',$f);
					echo '</div>';
				} else {
					echo '没有找到数据!';
				}

				?>
			</ul>
		</div>
<?php include('footer.php');?>