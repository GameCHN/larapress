<?php

namespace YCMS\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/**
 * 用户模型
 *
 * @author raoyc <raoyc2009@gmail.com>
 * @property integer $id id
 * @property string $username 用户登录名
 * @property string $password 用户密码
 * @property string $nickname 用户屏显昵称，可以不同用户登录名
 * @property string $email 用户邮箱
 * @property string $realname 用户真实姓名
 * @property string $pid 用户身份证号
 * @property string $pid_card_thumb1 身份证证件正面（印有国徽图案、签发机关和有效期限）照片
 * @property string $pid_card_thumb2 身份证证件反面（印有个人基本信息和照片）照片
 * @property string $avatar 用户个人图像
 * @property string $phone 固定/移动电话
 * @property string $address 联系地址
 * @property string $emergency_contact 紧急联系人信息
 * @property integer $servicer_id 专属客服id，（为0表示其为无专属客服的管理用户）
 * @property string $deleted_at 被软删除时间
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 修改更新时间
 * @property boolean $is_lock 是否锁定限制用户登录，1锁定,0正常
 * @property string $user_type 用户类型：visitor 游客, customer 投资客户, manager 管理型用户
 * @property string $confirmation_code 确认码
 * @property boolean $confirmed 是否已通过验证 0：未通过 1：通过
 * @property string $remember_token Laravel 追加的记住令牌
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('entrust.role[] $roles 
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User whereNickname($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User whereRealname($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User wherePid($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User wherePidCardThumb1($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User wherePidCardThumb2($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User whereAvatar($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User whereEmergencyContact($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User whereServicerId($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User whereIsLock($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User whereUserType($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User whereConfirmationCode($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User whereConfirmed($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User manager()
 * @method static \Illuminate\Database\Query\Builder|\YCMS\Models\User customer()
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    
    use Authenticatable, CanResetPassword;
    use EntrustUserTrait;
    
    protected $table = 'users';
    protected $fillable = ['nickname', 'email', 'realname', 'gender', 'pid', 'pid_card_thumb1', 'pid_card_thumb2', 'avatar', 'phone', 'address', 'emergency_contact'];
    protected $hidden = ['password', 'confirmation_code', 'remember_token'];
    

    #********
    #* 此表为复合型的用户数据表，根据type不同确定不同用户
    #* type : Manager 管理型用户
    #* type : Customer 投资型客户
    #********
    //限定管理型用户
    public function scopeManager($query)
    {
        return $query->where('user_type', '=', 'manager');
    }

    //限定投资型客户
    public function scopeCustomer($query)
    {
        return $query->where('user_type', '=', 'customer');
    }
}
