<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class TaskFilter extends ApiFilter {
    protected $safeParms = [
        'user_id' => ['eq', 'ne'],
        'name' => ['like'],
        'description' => ['like'],
        'status' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte'],
        'parent_id' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte'],
        'info' => ['like'],
        'created_at' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte'],
        'updated_at' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte']
    ];
}