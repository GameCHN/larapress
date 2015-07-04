<?php

namespace Douyasi\Models;

use Eloquent;

/**
 * 动态设置类型模型
 *
 * @author raoyc <raoyc2009@gmail.com>
 * @property integer $id id
 * @property string $name 设置类型项名
 * @property string $value 设置类型项值
 * @property integer $sort 设置类型排序，数字越大排序越靠前
 * @property-read \Illuminate\Database\Eloquent\Collection|\Douyasi\Models\Setting[] $setting 
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\SettingType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\SettingType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\SettingType whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\SettingType whereSort($value)
 */
class SettingType extends Eloquent
{
    
    protected $table = 'setting_type';
    
    public $timestamps = false;  //关闭自动更新时间戳

     /**
     * 动态设置
     * 模型对象关系：(动态设置)分组对应的动态设置（一个分组可以有多个设置项）
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function setting()
    {
        return $this->hasMany('Douyasi\Models\Setting', 'type_id', 'id');
    }
}
