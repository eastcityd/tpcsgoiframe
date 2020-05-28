<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class Index extends Model
{
    //导航列表
    public function getNav()
    {
        $nav = Db::name('nav')
            ->order('sort')
            ->order('ids')
            ->select();

        $arr = $this->navChild($nav);

        foreach ($arr as $key => $val) {
            $arr[$key]['next'] = $this->navChild($nav, $val['id']);
        }
        return $arr;
    }


    //循环遍历导航
    public function navChild($data, $pid = 0)
    {
        $arr = [];
        foreach ($data as $k => $v) {
            if ($v['pid'] == $pid) {
                $c['id'] = $v['id'];
                $c['name'] = $v['nav_name'];
                $c['pid'] = $v['pid'];
                $c['url'] = '/admin/' . $v['controller_name'] . '/' . $v['action_name'];
                $arr[$k] = $c;
            }
        }
        return $arr;
    }
}
