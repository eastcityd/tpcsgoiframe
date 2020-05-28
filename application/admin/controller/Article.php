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

    public function type()
    {
        return$this->fetch();
    }
}
