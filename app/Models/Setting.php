<?php

namespace Douyasi\Models;

use Eloquent;

/**
 * 动态设置模型
 *
 * @author raoyc <raoyc2009@gmail.com>
 * @property integer $id id
 * @property string $name 设置项名
 * @property string $value 设置项值
 * @property boolean $status 状态 0未启用 1启用 其它数字表示异常
 * @property integer $type_id 设置所属类型id 0表示无任何归属类型
 * @property integer $sort 设置排序，数字越大排序越靠前
 * @property-read \Douyasi\Models\SettingType $setting_type 
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Setting whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Setting whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Setting whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Setting whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Setting whereTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Setting whereSort($value)
 */
class Setting extends Eloquent
{
    
    protected $table = 'settings';
    
    public $timestamps = false;  //关闭自动更新时间戳

    /**
     * 动态设置分组
     * 模型对象关系：动态设置对应的分组
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function setting_type()
    {
        return $this->belongsTo('Douyasi\Models\SettingType');
    }
}
