<?php
/*
	task
	1. Напишите функцию подготовки строки, которая заполняет шаблон данными из указанного объекта
	2. Пришлите код целиком, чтобы можно его было проверить
	3. Придерживайтесь code style текущего задания
	4. По необходимости - можете дописать код, методы
	5. Разместите код в гите и пришлите ссылку
*/

require_once "Api.php";

$user =
    [
        'id' => 20,
        'name' => 'John Dow',
        'role' => 'QA',
        'salary' => 100
    ];

$api_path_templates =
    [
        "/api/items/%id%/%name%",
        "/api/items/%id%/%role%",
        "/api/items/%id%/%salary%"
    ];

$api = new Api($user);

$api_paths = array_map(function ($api_path_template) use ($api) {
    return $api->getApiPath($api_path_template);
}, $api_path_templates);

echo json_encode($api_paths, JSON_UNESCAPED_UNICODE);

$expected_result = ['/api/items/20/John%20Dow', '/api/items/20/QA', '/api/items/20/100'];
