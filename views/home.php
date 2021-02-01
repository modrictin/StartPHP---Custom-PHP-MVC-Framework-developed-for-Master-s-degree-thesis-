<?php

$this->layout('layouts/main', [
    'title' => $this->e($PAGE_TITLE),
    'VIEW_NAME' => $this->e($VIEW_NAME),
    'PACKAGES' => $PACKAGES
]) ?>

<h1>User Profile</h1>
<p>Hello, <?= $this->e($VIEW_NAME) ?>
<pre>
