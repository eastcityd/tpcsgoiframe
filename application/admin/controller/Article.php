<?php

namespace app\admin\controller;

use app\common\controller\Base;
use app\admin\model\Article as M;

class Article extends Base
{
    private $m;

    public function __construct()
    {
        parent::__construct();

        $this->m = new M();
    }

    public function index()
    {
        return $this->fetch();
    }

    //获取文章类型列表
    public function type()
    {
        $list = $this->m->getTypeList();
        $this->assign('list', $list);
        return $this->fetch();
    }

    //添加文章类型
    public function addType()
    {
        if (request()->isPost()) {
            if ($this->m->addType()) {
                $this->success('添加成功', 'index');
            } else {
                $this->error($this->m->getError());
            }
        }
        return $this->fetch();
    }

    //编辑文章类型
    public function editType()
    {
        if (request()->isPost()) {
            if ($this->m->updateType()) {
                $this->success('编辑成功', 'index');
            } else {
                $this->error($this->m->getError());
            }
        }
        return $this->fetch();
    }

    //删除文章类型
    public function delType()
    {
        if (request()->isPost()) {
            if ($this->m->delType()) {
                $this->success('删除成功', 'index');
            } else {
                $this->error($this->m->getError());
            }
        }
        return true;
    }

}
