<?php

namespace YCMS\Models;

use Eloquent;

/**
 * 内容模型
 *
 * @author raoyc <raoyc2009@gmail.com>
 * @property integer $id id
 * @property string $flag 推荐位
 * @property string $title 文章/单页/碎片/备忘标题
 * @property string $thumb 文章/单页缩略图
 * @property string $content 文章/单页/碎片/备忘正文
 * @property string $slug 网址缩略名，文章、单页与碎片模型有缩略名，其它模型暂无
 * @property string $type 内容类型：article文章模型 page单页模型 fragment碎片模型 memo备忘模型
 * @property integer $user_id 文章编辑用户id
 * @property boolean $is_top 是否置顶：1置顶，0不置顶
 * @property integer $owner_id 归属用户id:一般备忘有归属用户id，0表示无任何归属
 * @property string $outer_link 外链地址
 * @property integer $category_id 文章分类id
 * @property string $deleted_at 被软删除时间
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 修改更新时间
 * @property-read \YCMS\Models\Meta $meta 
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content whereFlag($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content whereThumb($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content whereIsTop($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content whereOwnerId($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content whereOuterLink($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content article()
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content page()
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content fragment()
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\Content memo()
 */
class Content extends Eloquent
{
    protected $table = 'contents';

    #********
    #* 此表为复合型的内容数据表，根据type不同确定不同内容模型
    #* type : article 文章模型
    #* type : page 单页模型
    #* type : fragment 碎片模型
    #* type : memo 备忘模型
    #********
    //限定文章
    public function scopeArticle($query)
    {
        return $query->where('type', '=', 'article');
    }

    //限定单页
    public function scopePage($query)
    {
        return $query->where('type', '=', 'page');
    }

    //限定碎片
    public function scopeFragment($query)
    {
        return $query->where('type', '=', 'fragment');
    }

    //限定备忘
    public function scopeMemo($query)
    {
        return $query->where('type', '=', 'memo');
    }

    /**
     * 分类
     * 模型对象关系：内容对应的分类[仅文章存在分类]
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function meta()
    {
        //模型名 外键 本键
        return $this->hasOne('YCMS\Models\Meta', 'id', 'category_id');
    }

    /**
     * 标签
     * 暂未完成 TODO
     * 模型对象关系：内容对应的标签[文章、单页等均存在标签]
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag()
    {
    }
}
