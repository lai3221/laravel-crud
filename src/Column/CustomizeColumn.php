<?php

namespace Lai3221\LaravelCrud\Column;

use Lai3221\LaravelCrud\Column;

class CustomizeColumn extends Column
{
    public $grid;

    public function renderData($model, $index, $field)
    {
        $value = $model->{$field['attribute']};
        if (isset($field['list']['value'])) {
            $value = $field['list']['value']($model);
        }
        return '<span '.render_form_attributes($field['list']['attr'] ?? []).'>'.$value.'</span>';
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
