<?php
namespace app\common\model;

use think\Model;

class Info extends Model
{
    protected $autoWriteTimestamp = true;
    // 关闭自动写入update_time字段
    protected $updateTime = false;

}
