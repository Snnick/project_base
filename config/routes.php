<?php

return array(
    'person/([0-9]+)/page-([0-9]+)' => 'person/view/$1/$2',
    'person/([0-9]+)' => 'person/view/$1',
    'man/([1-2])/page-([0-9]+)' => 'person/man/$1/$2',
    'man/([1-2])' => 'person/man/$1',
    'country/([0-9]+)/page-([0-9]+)' => 'person/country/$1/$2',
    'country/([0-9]+)' => 'person/country/$1',
    'city/([0-9]+)/page-([0-9]+)' => 'person/city/$1/$2',
    'city/([0-9]+)' => 'person/city/$1',
    'education/([0-9]+)/page-([0-9]+)' => 'person/education/$1/$2',
    'education/([0-9]+)' => 'person/education/$1',
    'family/([0-9]+)/page-([0-9]+)' => 'person/family/$1/$2',
    'family/([0-9]+)' => 'person/family/$1',
    'smok/([0-9]+)/page-([0-9]+)' => 'person/smok/$1/$2',
    'smok/([0-9]+)' => 'person/smok/$1',


    'department/([0-9]+)/page-([0-9]+)' => 'catalog/department/$1/$2',
    'department/([0-9]+)' => 'catalog/department/$1',
    'department' => 'catalog/index',


    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    // Управление cотрудниками:
    'admin/person/create' => 'adminPerson/create',
    'admin/person/update/([0-9]+)' => 'adminPerson/update/$1',
    'admin/person/delete/([0-9]+)' => 'adminPerson/delete/$1',
    'admin/person' => 'adminPerson/index',

    // Управление отделами:
    'admin/department/create' => 'adminDepartment/create',
    'admin/department/update/([0-9]+)' => 'adminDepartment/update/$1',
    'admin/department/delete/([0-9]+)' => 'adminDepartment/delete/$1',
    'admin/department' => 'adminDepartment/index',

    // Админпанель:
    'admin' => 'admin/index',

    'contacts' => 'base/contact',
    'search' => 'base/search',
    'about' => 'base/about',
    'about/([0-9]+)' => 'base/about/$1',

    '' => 'base/index',
);