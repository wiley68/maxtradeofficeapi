<?php

namespace App\Services\V1;

use Illuminate\Http\Request;

class TaskQuery {
    protected $safeParms = [
        'userId' => ['eq'],
        'name' => ['like'],
        'description' => ['like'],
        'status' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'parentId' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'info' => ['like'],
        'createdAt' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'updatedAt' => ['eq', 'lt', 'lte', 'gt', 'gte']
    ];

    protected $columnMap = [
        'userId' => 'user_id',
        'parentId' => 'parent_id',
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'like' => 'like'
    ];

    public function transform(Request $request): array
    {
        $eloQuery = [];
        foreach ($this->safeParms as $parm => $operators) {
            $query = $request->query($parm);
            if (!isset($query)){
                continue;
            }
            $column = $this->columnMap[$parm] ?? $parm;
            foreach ($operators as $operator) {
                if (isset($query[$operator])){
                    if ($operator == 'like'){
                        $eloQuery[] = [$column, $this->operatorMap[$operator], '%' . $query[$operator] . '%'];
                    }else{
                        $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                    }
                }
            }
        }
        return $eloQuery;
    }
}