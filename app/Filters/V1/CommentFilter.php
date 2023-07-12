<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class CommentFilter extends ApiFilter {
    protected $safeParms = [
        'taskId' => ['eq', 'ne'],
        'userId' => ['eq', 'ne'],
        'subject' => ['like'],
        'info' => ['like'],
        'createdAt' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte'],
        'updatedAt' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte']
    ];

    protected $columnMap = [
        'taskId' => 'task_id',
        'userId' => 'user_id',
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at'
    ];
}