<?php

namespace app\admin\model;

use think\Db;
use think\Model;
use think\Request;
use think\Validate;

class Article extends Model
{
    //查询文章类型列表
    public function getList()
    {
        $list = Db::name('article_type')
            ->order('id')
            ->select();
        return $list;
    }

    //增加文章类型
    public function addType()
    {
        $request = Request::instance();
        $data = $request->param();

        $validate = new Validate(
            [
                'type_name' => 'require',
                'type_description' => 'require'
            ],
            [
                'type_name.require' => '请输入类型名称',
                'type_description.require' => '请输入类型描述'
            ]
        );

        if (!$validate->check($data)) {
            $this->error = $validate->getError();
            return false;
        }

        //判断类型名称是否已存在
        $type_name = Db::name('article_type')
            ->where('type_name', '=', $data['type_name'])
            ->value('type_name');
        if ($type_name) {
            $this->error = '类型名称已存在';
            return false;
        }

        $insert = array();
        $insert['type_name'] = $data['type_name'] ?? '';
        $insert['type_description'] = $data['type_description'] ?? '';
        $insert['sort'] = $data['sort'] ?? 0;
        $insert['status'] = $data['status'] ?? 1;

        $res = Db::name('article_type')->insert($insert);

        if (!$res) {
            $this->error = '添加失败';
            return false;
        }

        return true;
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
