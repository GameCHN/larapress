<?php

namespace YCMS\Http\Controllers\Admin;

use YCMS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use YCMS\Cache\SystemOptionCache;
use YCMS\Repositories\SystemOptionRepository;

/**
 * 系统配置控制器
 *
 * @author raoyc <raoyc2009@gmail.com>
 */
class AdminSystemOptionController extends BackController
{

    /**
     * The SettingRepository instance.
     *
     * @var YCMS\Repositories\SettingRepository
     */
    protected $option;

    public function __construct(
        SystemOptionRepository $option)
    {
        parent::__construct();
        $this->option = $option;
        
        if (! user('object')->can('manage_system')) {
            $this->middleware('deny403');
        }
    }

    public function getIndex()
    {
        //
        $system_options = $this->option->index();
        foreach ($system_options as $so) {
            $data[$so['name']] = $so['value'];
        }

        return view('back.system_option.index', compact('data'));
    }


    public function putUpdate(Request $request)
    {
        $data = $request->input('data');
        if ($data && is_array($data)) {
            $this->option->batchUpdate($data);
            //更新系统静态缓存
            SystemOptionCache::cacheStatic();
            return redirect()->route('admin.system_option.index')->with('message', '成功更新系统配置！');
        } else {
            return redirect()->back()->with('fail', '提交过来的数据异常！');
        }
    }
}
