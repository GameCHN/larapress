<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace Douyasi\Models{
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
 * @property-read \Douyasi\Models\Meta $meta
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content whereFlag($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content whereThumb($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content whereIsTop($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content whereOwnerId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content whereOuterLink($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content article()
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content page()
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content fragment()
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Content memo()
 */
	class Content {}
}

namespace Douyasi\Models{
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
	class Flag {}
}

namespace Douyasi\Models{
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
 * @property-read \Douyasi\Models\Content $content
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Meta whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Meta whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Meta whereThumb($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Meta whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Meta whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Meta whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Meta whereCount($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Meta whereSort($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Meta category()
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\Meta tag()
 */
	class Meta {}
}

namespace Douyasi\Models{
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
	class Permission {}
}

namespace Douyasi\Models{
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
	class Role {}
}

namespace Douyasi\Models{
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
	class Setting {}
}

namespace Douyasi\Models{
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
	class SettingType {}
}

namespace Douyasi\Models{
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
 * @property-read \Douyasi\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\SystemLog whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\SystemLog whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\SystemLog whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\SystemLog whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\SystemLog whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\SystemLog whereOperatorIp($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\SystemLog whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\SystemLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\SystemLog whereUpdatedAt($value)
 */
	class SystemLog {}
}

namespace Douyasi\Models{
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
	class SystemOption {}
}

namespace Douyasi\Models{
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
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User whereNickname($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User whereRealname($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User wherePid($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User wherePidCardThumb1($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User wherePidCardThumb2($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User whereAvatar($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User whereEmergencyContact($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User whereServicerId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User whereIsLock($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User whereUserType($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User whereConfirmationCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User whereConfirmed($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User manager()
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\Models\User customer()
 */
	class User {}
}

namespace Douyasi{
/**
 * Douyasi\User
 *
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
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User whereNickname($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User whereRealname($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User wherePid($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User wherePidCardThumb1($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User wherePidCardThumb2($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User whereAvatar($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User whereEmergencyContact($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User whereServicerId($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User whereIsLock($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User whereUserType($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User whereConfirmationCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User whereConfirmed($value)
 * @method static \Illuminate\Database\Query\Builder|\Douyasi\User whereRememberToken($value)
 */
	class User {}
}

