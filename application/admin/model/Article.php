<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class Article extends Model
{
    //查询文章类型列表
    public function getList()
    {
        $list = Db::name('article_type');
    }

    //增加文章类型
    public function addType()
    {

    }

    //更新文章类型
    public function updateType()
    {

    }

    //删除文章类型
    public function delType()
    {

    }
}
