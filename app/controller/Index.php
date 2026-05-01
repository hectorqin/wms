<?php
namespace app\controller;

use app\service\SystemService;

class Index extends Base
{
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 获取系统信息接口
     * @return \think\response\Json
     */
    public function getSystemInfo()
    {
        $service = new SystemService();
        
        $data = [
            'system' => $service->getSystemInfo(),
            'php' => $service->getPhpInfo(),
            'database' => $service->getDatabaseInfo(),
            'app' => $service->getAppInfo(),
        ];
        
        return json(['code' => 0, 'data' => $data, 'msg' => 'success']);
    }
}
