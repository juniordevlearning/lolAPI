<?php
// Get container key as controller -> Constructor injection in container
$app->get('/', 'ApiController:index');