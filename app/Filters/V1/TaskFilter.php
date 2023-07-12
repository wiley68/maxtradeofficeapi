<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class TaskFilter extends ApiFilter {
    protected $safeParms = [
        'userId' => ['eq', 'ne'],
        'name' => ['like'],
        'description' => ['like'],
        'status' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte'],
        'parentId' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte'],
        'info' => ['like'],
        'createdAt' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte'],
        'updatedAt' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte']
    ];

    protected $columnMap = [
        'userId' => 'user_id',
        'parentId' => 'parent_id',
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at'
    ];
}