<?php

// +----------------------------------------------------------------------
// | framework
// +----------------------------------------------------------------------
// | 版权所有 2014~2018 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: http://framework.thinkadmin.top
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/zoujingli/framework
// +----------------------------------------------------------------------

namespace app\store\controller;

use library\Controller;

/**
 * 会员信息管理
 * Class Member
 * @package app\store\controller
 */
class Member extends Controller
{
    /**
     * 绑定数据表
     * @var string
     */
    protected $table = 'StoreMember';

    /**
     * 会员信息管理
     * @auth true
     * @menu true
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function index()
    {
        $this->title = '会员信息管理';
        $query = $this->_query($this->table)->like('nickname,phone')->equal('vip_level');
        $query->dateBetween('create_at')->order('id desc')->page();
    }

    /**
     * 数据列表处理
     * @param array $data
     */
    protected function _page_filter(&$data = [])
    {
        foreach ($data as &$vo) {
            $vo['nickname'] = emoji_decode($vo['nickname']);
        }
    }

}