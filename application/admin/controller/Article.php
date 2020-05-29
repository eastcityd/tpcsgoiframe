<?php

namespace app\admin\controller;

use app\common\controller\Base;
use app\admin\model\Article as M;
use think\View;

class Article extends Base
{
    private $m;
    protected $view;

    public function __construct()
    {
        parent::__construct();

        $this->m = new M();
        $this->view = new View();
    }

    public function index()
    {
        $list = $this->m->getList();
        $this->view->assign('list', $list);
        return $this->fetch();
    }

    public function type()
    {
        return $this->fetch();
    }

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
}
