<?php

namespace Douyasi\Models;

use Zizaco\Entrust\EntrustRole;

/**
 * 用户组（角色）模型
 *
 * @author raoyc <raoyc2009@gmail.com>
 * @property integer $id id
 * @property string $name 角色名
 * @property string $display_name 角色展示名
 * @property string $description 角色描述
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 修改更新时间
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('auth.model[] $users 
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('entrust.permission[] $perms 
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Role whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Role whereDisplayName($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Role whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Role whereUpdatedAt($value)
 */
class Role extends EntrustRole
{
}
