<?php

namespace Douyasi\Models;

use Zizaco\Entrust\EntrustPermission;

/**
 * 权限许可模型
 *
 * @author raoyc <raoyc2009@gmail.com>
 * @property integer $id id
 * @property string $name 权限名
 * @property string $display_name 权限展示名
 * @property string $description 
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 修改更新时间
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('entrust.role[] $roles 
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Permission whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Permission whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Permission whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Permission whereUpdatedAt($value)
 */
class Permission extends EntrustPermission
{
}
