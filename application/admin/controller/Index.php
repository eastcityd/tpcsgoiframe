<?php

namespace app\admin\controller;

use app\common\controller\Base;
use app\admin\model\Index as M;

class Index extends Base
{
    private $m;

    public function __construct()
    {
        parent::__construct();
        $this->m = new M();
    }

    public function index()
    {
        //获取导航列表
        $arr = $this->m->getNav();

        $this->assign('arr', $arr);

        return $this->fetch();
    }

}
