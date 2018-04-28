<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    //$level = array("1"=>"admin","2"=>"siswa","3"=>"guru","4"=>"orangtua");

    //if(Yii::$app->user->isGuest) $judul="Remask";
    //else $judul = $level[Yii::$app->user->identity->level];

    NavBar::begin([
        'brandLabel' => 'Remask',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    }
    else {

        $menuItems = [
            ['label' => 'siswa', 'items'=>[
                    ['label' => 'Tugas', 'url' => ['/siswatugas/index']],
                    ['label' => 'Tugas Pendidikan', 'url' => ['/siswatugaspendidikan/index']],
                    ['label' => 'Histori Tugas', 'url' => ['/siswahistoritugas/index']],
                    ['label' => 'Skala Prioritas', 'url' => ['/siswaskalaprioritastugas/index']],
                    ['label' => 'Lihat Grafik', 'url' => ['/siswalihatgrafik/index']],
                ]
            ],
            ['label' => 'guru', 'items'=>[
                    ['label' => 'Profil', 'url' => ['/guruprofil/index']],
                    ['label' => 'Tugas Pendidikan', 'url' => ['/gurutugaspendidikan/index']],
                    ['label' => 'Group', 'url' => ['/gurugroup/index']],
                    ['label' => 'Lihat Grafik', 'url' => ['/gurulihatgrafik/index']],
                ]
            ],
            ['label' => 'orangtua', 'items'=>[
                    ['label' => 'Daftar Tugas', 'url' => ['/orangtuatugas/index']],
                    ['label' => 'Lihat Grafik', 'url' => ['/orangtualihatgrafik/index']],
                ]
            ]
            
        ];

        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Kila Kiantari - Teknik Informatika (<a target="_blank" href="https://pens.ac.id/">PENS</a>) <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
