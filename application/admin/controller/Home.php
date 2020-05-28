<?php

namespace app\admin\controller;

use app\common\controller\Base;

class Home extends Base
{
    public function index()
    {
        return $this->fetch();
    }
}
