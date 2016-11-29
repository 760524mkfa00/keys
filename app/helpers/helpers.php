<?php

function sort_employee_by($column, $body)
{

    $direction = (\Request::get('direction') == 'asc') ? 'desc' : 'asc';
    return link_to_route('employee', $body, ['sortBy' => $column, 'direction' => $direction]);

}

function display_button($status)
{
    return ($status == 'completed') ? 'display:inline-block' : 'display:none';
}
