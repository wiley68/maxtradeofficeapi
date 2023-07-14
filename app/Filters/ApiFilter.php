<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter {
    protected $safeParms = [];

    protected $columnMap = [];

    protected $operatorMap = [
        'eq' => '=',
        'ne' => '!=',
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
            foreach ($operators as $operator) {
                if (isset($query[$operator])){
                    if ($operator == 'like'){
                        $eloQuery[] = [$parm, $this->operatorMap[$operator], '%' . $query[$operator] . '%'];
                    }else{
                        $eloQuery[] = [$parm, $this->operatorMap[$operator], $query[$operator]];
                    }
                }
            }
        }
        return $eloQuery;
    }
}