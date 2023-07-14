<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class CommentFilter extends ApiFilter {
    protected $safeParms = [
        'task_id' => ['eq', 'ne'],
        'user_id' => ['eq', 'ne'],
        'subject' => ['like'],
        'info' => ['like'],
        'created_at' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte'],
        'updated_at' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte']
    ];
}