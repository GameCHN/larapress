<?php

namespace Douyasi\Models;

use Eloquent;

/**
 * 推荐位Flag模型
 * 参考织梦(DEDE)CMS，实现简单的文章推荐属性
 *
 * @author raoyc <raoyc2009@gmail.com>
 * @property integer $id id
 * @property string $attr 属性名
 * @property string $attr_full_name 属性全称名
 * @property string $display_name 展示名
 * @property string $description 
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Flag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Flag whereAttr($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Flag whereAttrFullName($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Flag whereDisplayName($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Flag whereDescription($value)
 */
class Flag extends Eloquent
{

    protected $table = 'flags';
    public $timestamps = false;  //关闭自动更新时间戳

}
