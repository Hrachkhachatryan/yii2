<?php
use \opus\ecom\Basket;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
	<div class="wrap">
		<?php
			NavBar::begin([
				'brandLabel' => 'yii2-app-ecom',
				'brandUrl' => Yii::$app->homeUrl,
				'options' => [
					'class' => 'navbar-inverse navbar-fixed-top',
				],
			]);
			echo Nav::widget([
				'options' => ['class' => 'navbar-nav navbar-right'],
				'items' => [
                    ['label' => 'Dashboard', 'url' => ['/site/index']],
                    ['label' => sprintf('Basket (%d)', \Yii::$app->ecom->basket->getCount(Basket::ITEM_PRODUCT)), 'url' => ['/basket/index']],
                    ['label' => 'Orders & invoices', 'url' => ['/order/list']],
					['label' => 'Payment log', 'url' => ['/payment/list']],
				],
			]);
			NavBar::end();
		?>

		<div class="container">
			<?= $content ?>
		</div>
	</div>

	<footer class="footer">
		<div class="container">
			<p class="pull-right"><?= Yii::powered() ?></p>
		</div>
	</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
