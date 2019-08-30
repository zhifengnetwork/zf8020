<?php

namespace app\admin\controller;


use app\common\model\Member as MemberModel;
use app\common\model\User as UserModel;
use app\common\model\Withdrawals;
use app\common\model\Users;
use app\common\model\AgentInfo;
use think\Request;
use think\Db;
use think\Loader;

class Bonuspools extends Common
{


    public function index()
    {
        $list = Db::name('bonus_setting')->select();
        $this->assign('list', $list);
        $this->assign('meta_title', '奖金池设置');
        return $this->fetch();
    }

    public function edit()
    {

        $id   = input('id', 0);

        $info = Db::table('bonus_setting')->where('id', $id)->find();

        if (request()->isPost()) {

            $recommend      = input('recommend/f', 0);
//            $pingji_level       = input('pingji_level/f', 0);
//            $layer_number       = input('layer_number/f', 0);
            $upgrade       = input('upgrade', '');
            $levelname  = input('levelname', '');
            $desc  = input('desc', '');

            if (empty($levelname)) {
                $this->error('等级名称不能为空！');
            }

            if (empty($levelname)) {
                $this->error('等级名称不能为空！');
            }
            $data['proportion']  = $recommend;
//            $data['pingji_level']   = $pingji_level / 100;
//            $data['direct_num']   = $layer_number;
            $data['direct_num']   = $upgrade;
            $data['bonusname']  = $levelname;
            $data['desc']  = $desc;
            $res = Db::table('bonus_pool_setting')->where(['id' => $id])->update($data);
//    print_r($res);die;
            if ($res !== false) {
                $this->success('操作成功', url('bonuspools/level'));
            } else {
                $this->error('失败！');
            }
        };


        return $this->fetch('', [
            'meta_title'    =>  '编辑奖金池设置',
            'info'          =>  $info,
        ]);
    }





    public function add()
    {

        $id   = input('id', 0);

        $info = Db::table('bonus_setting')->where('id', $id)->find();

        if (request()->isPost()) {

            $recommend      = input('recommend/f', 0);
//            $pingji_level       = input('pingji_level/f', 0);
//            $layer_number       = input('layer_number/f', 0);
            $upgrade       = input('upgrade', '');
            $levelname  = input('levelname', '');
            $desc  = input('desc', '');

            if (empty($levelname)) {
                $this->error('等级名称不能为空！');
            }

            if (empty($levelname)) {
                $this->error('等级名称不能为空！');
            }
            $data['proportion']  = $recommend;
//            $data['pingji_level']   = $pingji_level / 100;
//            $data['direct_num']   = $layer_number;
            $data['direct_num']   = $upgrade;
            $data['bonusname']  = $levelname;
            $data['desc']  = $desc;
            $res = Db::table('bonus_pool_setting')->where(['id' => $id])->insert($data);
            if ($res !== false) {
                $this->success('操作成功', url('bonuspools/level'));
            } else {
                $this->error('失败！');
            }
        };


        return $this->fetch('', [
            'meta_title'    =>  '增加奖金池设置',
            'info'          =>  $info,
        ]);
    }








    public function level()
    {
        $list = Db::name('bonus_pool_setting')->select();
        $this->assign('list', $list);
        $this->assign('meta_title', '奖金池设置');
        return $this->fetch();
    }


    public function level_edit()
    {

        $id   = input('id', 0);

        $info = Db::table('bonus_pool_setting')->where('id', $id)->find();

        if (request()->isPost()) {

            $recommend      = input('recommend/f', 0);
//            $pingji_level       = input('pingji_level/f', 0);
//            $layer_number       = input('layer_number/f', 0);
            $upgrade       = input('upgrade', '');
            $levelname  = input('levelname', '');
            $desc  = input('desc', '');

            if (empty($levelname)) {
                $this->error('等级名称不能为空！');
            }

            if (empty($levelname)) {
                $this->error('等级名称不能为空！');
            }
            $data['proportion']  = $recommend;
//            $data['pingji_level']   = $pingji_level / 100;
//            $data['direct_num']   = $layer_number;
            $data['direct_num']   = $upgrade;
            $data['bonusname']  = $levelname;
            $data['desc']  = $desc;
            $res = Db::table('bonus_pool_setting')->where(['id' => $id])->update($data);
//    print_r($res);die;
            if ($res !== false) {
                $this->success('操作成功', url('bonuspools/level'));
            } else {
                $this->error('失败！');
            }
        };


        return $this->fetch('', [
            'meta_title'    =>  '编辑奖金池设置',
            'info'          =>  $info,
        ]);
    }



    public function level_add()
    {

        $id   = input('id', 0);

        $info = Db::table('bonus_pool_setting')->where('id', $id)->find();

        if (request()->isPost()) {

            $recommend      = input('recommend/f', 0);
//            $pingji_level       = input('pingji_level/f', 0);
//            $layer_number       = input('layer_number/f', 0);
            $upgrade       = input('upgrade', '');
            $levelname  = input('levelname', '');
            $desc  = input('desc', '');

            if (empty($levelname)) {
                $this->error('等级名称不能为空！');
            }

            if (empty($levelname)) {
                $this->error('等级名称不能为空！');
            }
            $data['proportion']  = $recommend;
//            $data['pingji_level']   = $pingji_level / 100;
//            $data['direct_num']   = $layer_number;
            $data['direct_num']   = $upgrade;
            $data['bonusname']  = $levelname;
            $data['desc']  = $desc;
            $res = Db::table('bonus_pool_setting')->where(['id' => $id])->insert($data);
            if ($res !== false) {
                $this->success('操作成功', url('bonuspools/level'));
            } else {
                $this->error('失败！');
            }
        };


        return $this->fetch('', [
            'meta_title'    =>  '增加奖金池设置',
            'info'          =>  $info,
        ]);
    }




}
