<?php

namespace YCMS\Models;

use Eloquent;

/**
 * 元模型
 *
 * @author raoyc <raoyc2009@gmail.com>
 * @property integer $id id
 * @property string $name meta名
 * @property string $thumb meta缩略图
 * @property string $slug meta缩略名
 * @property string $type meta类型: [category]-分类，[tag]-标签
 * @property string $description meta描述
 * @property integer $count meta被使用的次数
 * @property integer $sort meta排序，数字越大排序越靠前
 * @property-read \YCMS\Models\Content $content 
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Meta whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Meta whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Meta whereThumb($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Meta whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Meta whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Meta whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Meta whereCount($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Meta whereSort($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Meta category()
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Meta tag()
 */
class Meta extends Eloquent
{
    
    protected $table = 'metas';
    
    public $timestamps = false;  //关闭自动更新时间戳


    #********
    #* 此表为复合型的元（Meta）数据表，根据type不同确定不同元模型
    #* type : CATEGORY 分类
    #* type : TAG 标签
    #********
    //限定分类
    public function scopeCategory($query)
    {
        return $query->where('type', '=', 'category');
    }
    //限定标签
    public function scopeTag($query)
    {
        return $query->where('type', '=', 'tag');
    }

    /**
     * 内容
     * 模型对象关系：分类对应的文章内容[一个分类下可以多篇文章]
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function content()
    {
        return $this->belongsTo('YCMS\Models\Content', 'id', 'category_id');
    }
}
