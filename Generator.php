<?php

if ($argc < 2) {
    echo "Usage: composer create-view VIEW_NAME\n";
    exit(1);
}

$viewName = ucfirst($argv[1]);

$viewContent = <<<PHP
<?php \$this->layout('Layout', ['mainContent' => \$this->fetch('Layout')]) ?>

<?php \$this->start('mainContent') ?>

<!-- Add your content here to be displayed in the browser -->

<?php \$this->stop() ?>
PHP;

$path = getcwd() . '/app/Views/' . $viewName . '.php';

if (!file_exists(dirname($path))) {
    mkdir(dirname($path), 0777, true);
}

if (!file_exists($path)) {
    file_put_contents($path, $viewContent);
    echo "{$viewName}.php created successfully in app/Views\n";
} else {
    echo "{$viewName}.php already exists. Skipping...\n";
}