<?php
//测试
function helpers_test(){
    echo 'success';
}
// 引入路由对应的样式
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}
