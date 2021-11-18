<?php

//where id >= 5 AND id <= 15 and proxy_type = 'HTTP' and (ip like '%41%' OR ip like '%44%')

//[
//    [ 'id', '>=', '5'],
//    [ 'id', '<=', '15', 'AND'],
//    [ 'proxy_type ' , 'like', 'HTTP%'],
//    [ 'ip ', 'like', '%41%'],
//]

//where id >= 5 AND id <= 15 and proxy_type like 'HTTP%' and ip like '%41%'

namespace mvc\lib\database;

class advancedWhere
{

    protected $conditions;
    protected $sqlWhereStr;

    public function __construct($conditions)
    {
        $this->conditions = $conditions;
        $this->buildWhereString();
    }

    public function getWhereString()
    {

        return $this->sqlWhereStr;
    }

    private function buildWhereString()
    { $string='';
        if (is_string($this->conditions))
        {
           $this->sqlWhereStr = $this->conditions;
        } elseif (is_array($this->conditions)) {
            foreach ($this->conditions as $key=>$value) {
                if (!empty($this->sqlWhereStr))
                {
                    //TODO AND or OR
//                    [
//                        [ 'id', '=', '3'],
//                        [ 'phone' , '>', '50', 'AND']
//                    ]
                }

            }

        }

return $this->sqlWhereStr;

    }


}