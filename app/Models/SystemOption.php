<?php

namespace Douyasi\Models;

use Eloquent;

/**
 * 系统配置模型
 *
 * @author raoyc <raoyc2009@gmail.com>
 * @property integer $id id
 * @property string $name 配置选项名
 * @property string $value 配置选项值
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\SystemOption whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\SystemOption whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\SystemOption whereValue($value)
 */
class SystemOption extends Eloquent
{
    
    protected $table = 'system_options';
    
    public $timestamps = false;  //关闭自动更新时间戳
}
