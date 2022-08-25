<?php

namespace App\Repositories\Api;

use Illuminate\Database\Eloquent\Model;

class AbstractRepository {

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function selectAttributesRelation($attributes){
        $this->model = $this->model->with($attributes);
    }

    public function where_filters($filters){
        $filters = explode(';',$filters);

        foreach($filters as $key => $condition){

            $conditions = explode(':',$condition);
            $this->model = $this->model->where($conditions[0],$conditions[1],$conditions[2]);
        }
    }

    public function selectAttributes($attributes){
        $this->model = $this->model->selectRaw($attributes);
    }

    public function getResult(){
        return $this->model->get();
    }
}

?>
