<?php

namespace YCMS\Models;

use Eloquent;

/**
 * 系统日志模型
 *
 * @author raoyc <raoyc2009@gmail.com>
 * @property integer $id 系统日志id
 * @property integer $user_id 用户id（为0表示系统级操作，其它一般为管理型用户操作）
 * @property string $type 操作类型
 * @property string $url 操作发起的url
 * @property string $content 操作内容
 * @property string $operator_ip 操作者ip
 * @property string $deleted_at 被软删除时间
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 修改更新时间
 * @property-read \YCMS\Models\User $user 
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\SystemLog whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\SystemLog whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\SystemLog whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\SystemLog whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\SystemLog whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\SystemLog whereOperatorIp($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\SystemLog whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\SystemLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\SystemLog whereUpdatedAt($value)
 */
class SystemLog extends Eloquent
{

    protected $table = 'system_log';
    
    protected $fillable = array('user_id', 'type', 'url', 'content', 'operator_ip');

     /**
     * 操作用户
     * 模型对象关系：系统日志对应的操作用户
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('YCMS\Models\User', 'user_id', 'id');
    }
}
