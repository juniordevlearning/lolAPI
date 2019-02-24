<?php
// Get container key as controller -> Constructor injection in container
$app->get('/', 'HomeController:index');
$app->post('/', 'HomeController:show');
