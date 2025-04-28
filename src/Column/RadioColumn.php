<?php

namespace Lai3221\LaravelCrud\Column;

use Lai3221\LaravelCrud\Column;

class RadioColumn extends Column
{
    public $grid;

    public function renderData($model, $index, $field)
    {
        $value = $originValue = $model->{$field['attribute']};
        if (isset($field['list']['value'])) {
            $value = $field['list']['value']($model);
        }
        $logic = $originValue ? ($field['list']['attr']['yes'] ?? []) : ($field['list']['attr']['no'] ?? []);
        return '<span '.render_form_attributes($logic).'>'.$value.'</span>';
    }

    protected function getRouteParams($routeParams, $model)
    {
        $params = [];

        foreach ($routeParams as $key => $value) {
            $params[$key] = $model->{$value};
        }

        return $params;
    }
}
