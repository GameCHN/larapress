<?php

namespace YCMS\Http\Controllers\Admin;

use YCMS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use YCMS\Repositories\RoleRepository;

/**
 * 权限控制器
 *
 * @author raoyc <raoyc2009@gmail.com>
 */
class AdminPermissionController extends BackController
{

    /**
     * The RoleRepository instance.
     *
     * @var YCMS\Repositories\RoleRepository
     */
    protected $role;


    public function __construct(
        RoleRepository $role)
    {
        parent::__construct();
        $this->role = $role;
        
        if (! user('object')->can('manage_users')) {
            $this->middleware('deny403');
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $permissions = $this->role->permission();  //获取所有权限许可
        return view('back.permission.index', compact('permissions'));
    }
}
