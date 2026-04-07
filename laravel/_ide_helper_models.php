<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace Modules\Cms\Models{
/**
 * ---
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $slug
 * @property string $disk
 * @property array $attachment
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $created_by
 * @property string $updated_by
 * @property Carbon $deleted_at
 * @property string $deleted_by
 * @property ProfileContract $created_by_profile
 * @property ProfileContract $updated_by_profile
 * @property ProfileContract $deleted_by_profile
 * @property ProfileContract $created_by_profile
 * @property ProfileContract $updated_by_profile
 * @property ProfileContract $deleted_by_profile
 * @property-read mixed $translations
 * @method static \Modules\Cms\Database\Factories\AttachmentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Attachment extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace Modules\Cms\Models{
/**
 * Modules\Cms\Models\Conf.
 *
 * @property int $id
 * @property string|null $name
 * @method static Builder|Conf newModelQuery()
 * @method static Builder|Conf newQuery()
 * @method static Builder|Conf query()
 * @method static Builder|Conf whereId($value)
 * @method static Builder|Conf whereName($value)
 * @mixin \Eloquent
 */
	class Conf extends \Eloquent {}
}

namespace Modules\Cms\Models{
/**
 * Modules\Cms\Models\Menu.
 *
 * @property int $id
 * @property string $name
 * @property array|null $items
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder|Menu newModelQuery()
 * @method static Builder|Menu newQuery()
 * @method static Builder|Menu onlyTrashed()
 * @method static Builder|Menu query()
 * @method static Builder|Menu whereCreatedAt($value)
 * @method static Builder|Menu whereCreatedBy($value)
 * @method static Builder|Menu whereDeletedAt($value)
 * @method static Builder|Menu whereDeletedBy($value)
 * @method static Builder|Menu whereId($value)
 * @method static Builder|Menu whereItems($value)
 * @method static Builder|Menu whereName($value)
 * @method static Builder|Menu whereUpdatedAt($value)
 * @method static Builder|Menu whereUpdatedBy($value)
 * @method static Builder|Menu withTrashed()
 * @method static Builder|Menu withoutTrashed()
 * @property string $title
 * @property int|null $parent_id
 * @property Collection|Menu[] $children
 * @property int|null $children_count
 * @property MediaCollection<int, Media> $media
 * @property int|null $media_count
 * @property Menu|null $parent
 * @property Collection|Menu[] $ancestors The model's recursive parents.
 * @property int|null $ancestors_count
 * @property Collection|Menu[] $ancestorsAndSelf The model's recursive parents and itself.
 * @property int|null $ancestors_and_self_count
 * @property Collection|Menu[] $bloodline The model's ancestors, descendants and itself.
 * @property int|null $bloodline_count
 * @property Collection|Menu[] $childrenAndSelf The model's direct children and itself.
 * @property int|null $children_and_self_count
 * @property Collection|Menu[] $descendants The model's recursive children.
 * @property int|null $descendants_count
 * @property Collection|Menu[] $descendantsAndSelf The model's recursive children and itself.
 * @property int|null $descendants_and_self_count
 * @property Collection|Menu[] $parentAndSelf The model's direct parent and itself.
 * @property int|null $parent_and_self_count
 * @property Menu|null $rootAncestor The model's topmost parent.
 * @property Collection|Menu[] $siblings The parent's other children.
 * @property int|null $siblings_count
 * @property Collection|Menu[] $siblingsAndSelf All the parent's children.
 * @property int|null $siblings_and_self_count
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Menu breadthFirst()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Menu depthFirst()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Menu doesntHaveChildren()
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Menu getExpressionGrammar()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Menu hasChildren()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Menu hasParent()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Menu isLeaf()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Menu isRoot()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Menu tree($maxDepth = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Menu treeOf((Model|callable) $constraint, $maxDepth = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Menu whereDepth($operator, $value = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Menu whereParentId($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Menu whereTitle($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Menu withGlobalScopes(array $scopes)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Menu withRelationshipExpression($direction, callable $constraint, $initialDepth, $from = null, $maxDepth = null)
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static MenuFactory factory($count = null, $state = [])
 * @property-read int $depth
 * @property-read string $path
 * @mixin \Eloquent
 */
	class Menu extends \Eloquent implements \Modules\Xot\Contracts\HasRecursiveRelationshipsContract {}
}

namespace Modules\Cms\Models{
/**
 * Modules\Cms\Models\Module.
 *
 * @property int $id
 * @property string|null $name
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static ModuleFactory factory($count = null, $state = [])
 * @method static Builder|Module newModelQuery()
 * @method static Builder|Module newQuery()
 * @method static Builder|Module query()
 * @method static Builder|Module whereId($value)
 * @method static Builder|Module whereName($value)
 * @mixin \Eloquent
 */
	class Module extends \Eloquent {}
}

namespace Modules\Cms\Models{
/**
 * Modules\Cms\Models\Page.
 *
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $slug
 * @property string $title
 * @property string|null $description
 * @property string $content
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property array|null $content_blocks
 * @method static Builder|Page newModelQuery()
 * @method static Builder|Page newQuery()
 * @method static Builder|Page onlyTrashed()
 * @method static Builder|Page query()
 * @method static Builder|Page whereContent($value)
 * @method static Builder|Page whereContentBlocks($value)
 * @method static Builder|Page whereCreatedAt($value)
 * @method static Builder|Page whereCreatedBy($value)
 * @method static Builder|Page whereDeletedAt($value)
 * @method static Builder|Page whereDeletedBy($value)
 * @method static Builder|Page whereId($value)
 * @method static Builder|Page whereSlug($value)
 * @method static Builder|Page whereTitle($value)
 * @method static Builder|Page whereUpdatedAt($value)
 * @method static Builder|Page whereUpdatedBy($value)
 * @method static Builder|Page withTrashed()
 * @method static Builder|Page withoutTrashed()
 * @property array|null $sidebar_blocks
 * @property array $footer_blocks
 * @method static Builder|Page whereFooterBlocks($value)
 * @method static Builder|Page whereSidebarBlocks($value)
 * @property mixed $translations
 * @method static Builder|Page whereLocale(string $column, string $locale)
 * @method static Builder|Page whereLocales(string $column, array $locales)
 * @method static Builder|Page whereJsonContainsLocale(string $column, string $locale, ?mixed $value)
 * @method static Builder|Page whereJsonContainsLocales(string $column, array $locales, ?mixed $value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static PageFactory factory($count = null, $state = [])
 * @property array<array-key, mixed>|null $middleware
 * @method static Builder<static>|Page whereMiddleware($value)
 * @method static Builder<static>|Page whereDescription($value)
 * @method static string|null getMiddlewareBySlug(string $slug)
 * @mixin \Eloquent
 */
	class Page extends \Eloquent {}
}

namespace Modules\Cms\Models{
/**
 * Modules\Cms\Models\PageContent.
 *
 * @property array|null $blocks
 * @property string|null $id
 * @property array|null $name
 * @property string|null $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property ProfileContract|null $creator
 * @property mixed $translations
 * @property ProfileContract|null $updater
 * @method static PageContentFactory factory($count = null, $state = [])
 * @method static Builder|PageContent newModelQuery()
 * @method static Builder|PageContent newQuery()
 * @method static Builder|PageContent query()
 * @method static Builder|PageContent whereBlocks($value)
 * @method static Builder|PageContent whereCreatedAt($value)
 * @method static Builder|PageContent whereCreatedBy($value)
 * @method static Builder|PageContent whereId($value)
 * @method static Builder|PageContent whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder|PageContent whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static Builder|PageContent whereLocale(string $column, string $locale)
 * @method static Builder|PageContent whereLocales(string $column, array $locales)
 * @method static Builder|PageContent whereName($value)
 * @method static Builder|PageContent whereSlug($value)
 * @method static Builder|PageContent whereUpdatedAt($value)
 * @method static Builder|PageContent whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class PageContent extends \Eloquent {}
}

namespace Modules\Cms\Models{
/**
 * Modules\Cms\Models\Section
 *
 * @property array|null $blocks
 * @property string|null $id
 * @property array|null $name
 * @property string|null $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property mixed $translations
 * @method static SectionFactory factory($count = null, $state = [])
 * @method static Builder|Section newModelQuery()
 * @method static Builder|Section newQuery()
 * @method static Builder|Section query()
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @method static Builder<static>|Section whereBlocks($value)
 * @method static Builder<static>|Section whereCreatedAt($value)
 * @method static Builder<static>|Section whereCreatedBy($value)
 * @method static Builder<static>|Section whereId($value)
 * @method static Builder<static>|Section whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|Section whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|Section whereLocale(string $column, string $locale)
 * @method static Builder<static>|Section whereLocales(string $column, array $locales)
 * @method static Builder<static>|Section whereName($value)
 * @method static Builder<static>|Section whereSlug($value)
 * @method static Builder<static>|Section whereUpdatedAt($value)
 * @method static Builder<static>|Section whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Section extends \Eloquent {}
}

namespace Modules\Fixcity\Models{
/**
 * Modules\Fixcity\Models\Faq
 *
 * @property int $id
 * @property int $category_id
 * @property string $question
 * @property string $answer
 * @property array|null $related_links
 * @property int $order
 * @property bool $is_published
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read FaqCategory $category
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @method static Builder<static>|Faq newModelQuery()
 * @method static Builder<static>|Faq newQuery()
 * @method static Builder<static>|Faq onlyTrashed()
 * @method static Builder<static>|Faq ordered()
 * @method static Builder<static>|Faq published()
 * @method static Builder<static>|Faq query()
 * @method static Builder<static>|Faq withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|Faq withoutTrashed()
 * @mixin \Eloquent
 */
	class Faq extends \Eloquent {}
}

namespace Modules\Fixcity\Models{
/**
 * Modules\Fixcity\Models\FaqCategory
 *
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property string|null $description
 * @property int $order
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection|Faq[] $faqs
 * @property-read int|null $faqs_count
 * @property-read Collection<int, \Modules\Fixcity\Models\Faq> $publishedFaqs
 * @property-read int|null $published_faqs_count
 * @method static Builder<static>|FaqCategory active()
 * @method static Builder<static>|FaqCategory newModelQuery()
 * @method static Builder<static>|FaqCategory newQuery()
 * @method static Builder<static>|FaqCategory onlyTrashed()
 * @method static Builder<static>|FaqCategory ordered()
 * @method static Builder<static>|FaqCategory query()
 * @method static Builder<static>|FaqCategory withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|FaqCategory withoutTrashed()
 * @mixin \Eloquent
 */
	class FaqCategory extends \Eloquent {}
}

namespace Modules\Fixcity\Models{
/**
 * PushSubscription Model.
 * 
 * Gestisce subscription per notifiche push PWA.
 *
 * @property int $id
 * @property int $user_id
 * @property string $endpoint
 * @property string|null $p256dh
 * @property string|null $auth
 * @property string|null $user_agent
 * @property string|null $ip_address
 * @property \Carbon\Carbon|null $last_used_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PushSubscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PushSubscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PushSubscription query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PushSubscription whereAuth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PushSubscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PushSubscription whereEndpoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PushSubscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PushSubscription whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PushSubscription whereLastUsedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PushSubscription whereP256dh($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PushSubscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PushSubscription whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PushSubscription whereUserId($value)
 * @mixin \Eloquent
 */
	class PushSubscription extends \Eloquent {}
}

namespace Modules\Fixcity\Models{
/**
 * Modules\Fixcity\Models\Ticket.
 *
 * @property string                          $name
 * @property string                          $slug
 * @property int                             $id
 * @property string                          $content
 * @property string|null                     $description
 * @property string                          $owner_id
 * @property string|null                     $responsible_id
 * @property int                             $status_id
 * @property string|null                     $code
 * @property string|null                     $ticket_prefix
 * @property int                             $order
 * @property int                             $priority_id
 * @property int|null                        $project_id
 * @property float|null                      $estimation
 * @property int|null                        $epic_id
 * @property int|null                        $sprint_id
 * @property float|null                      $latitude
 * @property float|null                      $longitude
 * @property string|null                     $address
 * @property Carbon|null                     $deleted_at
 * @property Carbon|null                     $created_at
 * @property Carbon|null                     $updated_at
 * @property int|null                        $type_id
 * @property int|null                        $category_id
 * @property string|null                     $updated_by
 * @property string|null                     $created_by
 * @property string|null                     $deleted_by
 * @property float|null                      $distance              Dynamic property added by distance queries
 * @property Collection<int, TicketActivity> $activities
 * @property int|null                        $activities_count
 * @property TicketCategory|null             $category
 * @property Collection<int, TicketComment>  $comments
 * @property int|null                        $comments_count
 * @property mixed                           $completude_percentage
 * @property mixed                           $estimation_for_humans
 * @property mixed                           $estimation_in_seconds
 * @property mixed                           $estimation_progress
 * @property Collection<int, TicketHour>     $hours
 * @property int|null                        $hours_count
 * @property MediaCollection<int, Media>     $media
 * @property int|null                        $media_count
 * @property User|null                       $owner
 * @property \Modules\Fixcity\Enums\TicketPriorityEnum|null         $priority
 * @property Collection<int, TicketRelation> $relations
 * @property int|null                        $relations_count
 * @property User|null                       $responsible
 * @property \Modules\Fixcity\Enums\TicketStatusEnum|null           $status
 * @property Collection<int, User>           $subscribers
 * @property int|null                        $subscribers_count
 * @property mixed                           $total_logged_hours
 * @property mixed                           $total_logged_in_hours
 * @property mixed                           $total_logged_seconds
 * @property \Modules\Fixcity\Enums\TicketTypeEnum|null             $type
 * @property int|null                        $votes_count
 * @method static TicketFactory  factory($count = null, $state = [])
 * @method static Builder|Ticket newModelQuery()
 * @method static Builder|Ticket newQuery()
 * @method static Builder|Ticket onlyTrashed()
 * @method static Builder|Ticket query()
 * @method static Builder|Ticket whereCode($value)
 * @method static Builder|Ticket whereContent($value)
 * @method static Builder|Ticket whereCreatedAt($value)
 * @method static Builder|Ticket whereCreatedBy($value)
 * @method static Builder|Ticket whereDeletedAt($value)
 * @method static Builder|Ticket whereDeletedBy($value)
 * @method static Builder|Ticket whereEpicId($value)
 * @method static Builder|Ticket whereEstimation($value)
 * @method static Builder|Ticket whereId($value)
 * @method static Builder|Ticket whereLatitude($value)
 * @method static Builder|Ticket whereLongitude($value)
 * @method static Builder|Ticket whereName($value)
 * @method static Builder|Ticket whereOrder($value)
 * @method static Builder|Ticket whereOwnerId($value)
 * @method static Builder|Ticket wherePriorityId($value)
 * @method static Builder|Ticket whereProjectId($value)
 * @method static Builder|Ticket whereResponsibleId($value)
 * @method static Builder|Ticket whereSprintId($value)
 * @method static Builder|Ticket whereStatusId($value)
 * @method static Builder|Ticket whereTicketPrefix($value)
 * @method static Builder|Ticket whereTypeId($value)
 * @method static Builder|Ticket whereUpdatedAt($value)
 * @method static Builder|Ticket whereUpdatedBy($value)
 * @method static Builder|Ticket withTrashed()
 * @method static Builder|Ticket withoutTrashed()
 * @property Collection<int, Status> $statuses
 * @property int|null                $statuses_count
 * @method static Builder|Ticket currentStatus(...$names)
 * @method static Builder|Ticket otherCurrentStatus(...$names)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static Builder|Ticket wherePriority($value)
 * @method static Builder|Ticket whereSlug($value)
 * @method static Builder|Ticket whereStatus($value)
 * @method static Builder|Ticket whereType($value)
 * @property Collection<int, CommentNotificationSubscription> $notificationSubscriptions
 * @property int|null                                         $notification_subscriptions_count
 * @method static Builder<static>|Ticket whereAddress($value)
 * @method static Builder<static>|Ticket whereDescription($value)
 * @mixin \Eloquent
 */
	class Ticket extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace Modules\Fixcity\Models{
/**
 * Modules\Fixcity\Models\TicketCategory.
 *
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $icon
 * @property string|null $color
 * @property int $order
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Fixcity\Models\Ticket> $tickets
 * @property-read int|null $tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketCategory active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketCategory ordered()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketCategory query()
 * @mixin \Eloquent
 */
	class TicketCategory extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * Modello per i comuni italiani con Sushi.
 * 
 * Implementa il pattern Facade per fornire un'interfaccia unificata a tutti i dati geografici:
 * regioni, province, città, CAP, codici ISTAT, ecc.
 * Tutti i dati sono estratti da file JSON e gestiti tramite Sushi.
 *
 * @property int $id
 * @property string $nome
 * @property string $codice
 * @property string $regione
 * @property string $provincia
 * @property string $sigla_provincia
 * @property string $cap
 * @property string $codice_catastale
 * @property int $popolazione
 * @property string $zona_altimetrica
 * @property int $altitudine
 * @property float $superficie
 * @property float $lat
 * @property float $lng
 * @property array<array-key, mixed>|null $zona
 * @property string|null $sigla
 * @property string|null $codiceCatastale
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|Comune newModelQuery()
 * @method static Builder<static>|Comune newQuery()
 * @method static Builder<static>|Comune query()
 * @method static Builder<static>|Comune whereCap($value)
 * @method static Builder<static>|Comune whereCodice($value)
 * @method static Builder<static>|Comune whereCodiceCatastale($value)
 * @method static Builder<static>|Comune whereId($value)
 * @method static Builder<static>|Comune whereNome($value)
 * @method static Builder<static>|Comune wherePopolazione($value)
 * @method static Builder<static>|Comune whereProvincia($value)
 * @method static Builder<static>|Comune whereRegione($value)
 * @method static Builder<static>|Comune whereSigla($value)
 * @method static Builder<static>|Comune whereZona($value)
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $content
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @method static \Modules\Geo\Database\Factories\ComuneFactory factory($count = null, $state = [])
 * @method static Builder<static>|Comune whereContent($value)
 * @method static Builder<static>|Comune whereCreatedAt($value)
 * @method static Builder<static>|Comune whereCreatedBy($value)
 * @method static Builder<static>|Comune whereSlug($value)
 * @method static Builder<static>|Comune whereTitle($value)
 * @method static Builder<static>|Comune whereUpdatedAt($value)
 * @method static Builder<static>|Comune whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Comune extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * Modules\Geo\Models\GeoNamesCap.
 *
 * @method static Builder|GeoNamesCap newModelQuery()
 * @method static Builder|GeoNamesCap newQuery()
 * @method static Builder|GeoNamesCap query()
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @mixin \Eloquent
 */
	class GeoNamesCap extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * @property int|null $region_id
 * @property int|null $province_id
 * @property string|null $name
 * @property int $id
 * @property string|null $postal_code
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @method static Builder<static>|Locality newModelQuery()
 * @method static Builder<static>|Locality newQuery()
 * @method static Builder<static>|Locality query()
 * @method static Builder<static>|Locality whereId($value)
 * @method static Builder<static>|Locality whereName($value)
 * @method static Builder<static>|Locality wherePostalCode($value)
 * @method static Builder<static>|Locality whereProvinceId($value)
 * @method static Builder<static>|Locality whereRegionId($value)
 * @method static \Modules\Geo\Database\Factories\LocalityFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class Locality extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * @property int|null $region_id
 * @property int $id
 * @property string|null $name
 * @property-read ProfileContract|null $creator
 * @property-read Collection<int, Locality> $localities
 * @property-read int|null $localities_count
 * @property-read Region|null $region
 * @property-read ProfileContract|null $updater
 * @method static Builder<static>|Province newModelQuery()
 * @method static Builder<static>|Province newQuery()
 * @method static Builder<static>|Province query()
 * @method static Builder<static>|Province whereId($value)
 * @method static Builder<static>|Province whereName($value)
 * @method static Builder<static>|Province whereRegionId($value)
 * @method static \Modules\Geo\Database\Factories\ProvinceFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class Province extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * @property int $id
 * @property string|null $name
 * @property-read ProfileContract|null $creator
 * @property-read Collection<int, Province> $provinces
 * @property-read int|null $provinces_count
 * @property-read ProfileContract|null $updater
 * @method static Builder<static>|Region newModelQuery()
 * @method static Builder<static>|Region newQuery()
 * @method static Builder<static>|Region query()
 * @method static Builder<static>|Region whereId($value)
 * @method static Builder<static>|Region whereName($value)
 * @method static \Modules\Geo\Database\Factories\RegionFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class Region extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Class TaskComment.
 *
 * @property int $id
 * @property int $task_id
 * @property int $user_id
 * @property string $comment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Task $task
 * @property-read User $user
 * @method static \Modules\Job\Database\Factories\TaskCommentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComment withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskComment withoutTrashed()
 * @mixin \Eloquent
 */
	class TaskComment extends \Eloquent {}
}

namespace Modules\Lang\Models{
/**
 * @property string|null $key
 * @property string|null $path
 * @property string|null $id
 * @property string|null $name
 * @property array<array-key, mixed>|null $content
 * @method static \Modules\Lang\Database\Factories\TranslationFileFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TranslationFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TranslationFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TranslationFile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TranslationFile whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TranslationFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TranslationFile whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TranslationFile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TranslationFile wherePath($value)
 */
	class TranslationFile extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * @method static Builder<static>|NotificationType newModelQuery()
 * @method static Builder<static>|NotificationType newQuery()
 * @method static Builder<static>|NotificationType query()
 * @mixin \Eloquent
 */
	class NotificationType extends \Eloquent {}
}

namespace Modules\Tenant\Models{
/**
 * Modello di test per il trait SushiToJson.
 * 
 * Utilizzato esclusivamente per i test del trait.
 *
 * @property int                          $id
 * @property string|null                  $name
 * @property string|null                  $description
 * @property string|null                  $status
 * @property array<array-key, mixed>|null $metadata
 * @property Carbon|null                  $created_at
 * @property Carbon|null                  $updated_at
 * @method static TestSushiModelFactory          factory($count = null, $state = [])
 * @method static Builder<static>|TestSushiModel newModelQuery()
 * @method static Builder<static>|TestSushiModel newQuery()
 * @method static Builder<static>|TestSushiModel query()
 * @method static Builder<static>|TestSushiModel whereCreatedAt($value)
 * @method static Builder<static>|TestSushiModel whereDescription($value)
 * @method static Builder<static>|TestSushiModel whereId($value)
 * @method static Builder<static>|TestSushiModel whereMetadata($value)
 * @method static Builder<static>|TestSushiModel whereName($value)
 * @method static Builder<static>|TestSushiModel whereStatus($value)
 * @method static Builder<static>|TestSushiModel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class TestSushiModel extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Authentication Model.
 * 
 * Tracks user authentication attempts and sessions.
 *
 * @property int             $id
 * @property string          $type                 Type of authentication (e.g., 'login', 'logout')
 * @property string|null     $ip_address           IP address used for authentication
 * @property string|null     $user_agent           User agent string from the request
 * @property string|null     $location             Geographic location derived from IP
 * @property bool            $login_successful     Whether the login attempt was successful
 * @property Carbon|null     $login_at             When the login attempt occurred
 * @property Carbon|null     $logout_at            When the logout occurred
 * @property string          $authenticatable_type The class name of the authenticatable model
 * @property string          $authenticatable_id   The ID of the authenticatable model
 * @property Carbon|null     $created_at           When the record was created
 * @property Carbon|null     $updated_at           When the record was last updated
 * @property Model|\Eloquent $authenticatable      The authenticatable model instance
 * @method static Builder<static>|Authentication newModelQuery()
 * @method static Builder<static>|Authentication newQuery()
 * @method static Builder<static>|Authentication query()
 * @method static Builder<static>|Authentication whereCreatedAt($value)
 * @method static Builder<static>|Authentication whereId($value)
 * @method static Builder<static>|Authentication whereIpAddress($value)
 * @method static Builder<static>|Authentication whereLocation($value)
 * @method static Builder<static>|Authentication whereType($value)
 * @method static Builder<static>|Authentication whereUpdatedAt($value)
 * @method static Builder<static>|Authentication whereUserAgent($value)
 * @method static Builder<static>|Authentication whereLoginAt($value)
 * @method static Builder<static>|Authentication whereLogoutAt($value)
 * @method static Builder<static>|Authentication whereLoginSuccessful($value)
 * @method static Builder<static>|Authentication whereAuthenticatableType($value)
 * @method static Builder<static>|Authentication whereAuthenticatableId($value)
 * @method static \Modules\User\Database\Factories\AuthenticationFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class Authentication extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * Represents a table in the INFORMATION_SCHEMA.TABLES.
 * 
 * Provides metadata and statistics about database tables.
 *
 * @property string|null $TABLE_CATALOG
 * @property string|null $TABLE_SCHEMA
 * @property string|null $TABLE_NAME
 * @property string|null $TABLE_TYPE
 * @property string|null $ENGINE
 * @property int|null $VERSION
 * @property string|null $ROW_FORMAT
 * @property int|null $table_rows
 * @property int|null $AVG_ROW_LENGTH
 * @property int|null $DATA_LENGTH
 * @property int|null $MAX_DATA_LENGTH
 * @property int|null $INDEX_LENGTH
 * @property int|null $DATA_FREE
 * @property int|null $AUTO_INCREMENT
 * @property Carbon|null $CREATE_TIME
 * @property Carbon|null $UPDATE_TIME
 * @property Carbon|null $CHECK_TIME
 * @property string|null $TABLE_COLLATION
 * @property int|null $CHECKSUM
 * @property string|null $CREATE_OPTIONS
 * @property string|null $TABLE_COMMENT
 * @property int $id
 * @method static Builder<static>|InformationSchemaTable newModelQuery()
 * @method static Builder<static>|InformationSchemaTable newQuery()
 * @method static Builder<static>|InformationSchemaTable query()
 * @method static Builder<static>|InformationSchemaTable whereAUTOINCREMENT($value)
 * @method static Builder<static>|InformationSchemaTable whereAVGROWLENGTH($value)
 * @method static Builder<static>|InformationSchemaTable whereCHECKSUM($value)
 * @method static Builder<static>|InformationSchemaTable whereCHECKTIME($value)
 * @method static Builder<static>|InformationSchemaTable whereCREATEOPTIONS($value)
 * @method static Builder<static>|InformationSchemaTable whereCREATETIME($value)
 * @method static Builder<static>|InformationSchemaTable whereDATAFREE($value)
 * @method static Builder<static>|InformationSchemaTable whereDATALENGTH($value)
 * @method static Builder<static>|InformationSchemaTable whereENGINE($value)
 * @method static Builder<static>|InformationSchemaTable whereINDEXLENGTH($value)
 * @method static Builder<static>|InformationSchemaTable whereId($value)
 * @method static Builder<static>|InformationSchemaTable whereMAXDATALENGTH($value)
 * @method static Builder<static>|InformationSchemaTable whereROWFORMAT($value)
 * @method static Builder<static>|InformationSchemaTable whereTABLECATALOG($value)
 * @method static Builder<static>|InformationSchemaTable whereTABLECOLLATION($value)
 * @method static Builder<static>|InformationSchemaTable whereTABLECOMMENT($value)
 * @method static Builder<static>|InformationSchemaTable whereTABLENAME($value)
 * @method static Builder<static>|InformationSchemaTable whereTABLEROWS($value)
 * @method static Builder<static>|InformationSchemaTable whereTABLESCHEMA($value)
 * @method static Builder<static>|InformationSchemaTable whereTABLETYPE($value)
 * @method static Builder<static>|InformationSchemaTable whereUPDATETIME($value)
 * @method static Builder<static>|InformationSchemaTable whereVERSION($value)
 * @property string|null $table_schema
 * @property string|null $table_name
 * @property string|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_at
 * @property string|null $created_by
 * @method static Builder<static>|InformationSchemaTable whereCreatedAt($value)
 * @method static Builder<static>|InformationSchemaTable whereCreatedBy($value)
 * @method static Builder<static>|InformationSchemaTable whereTableName($value)
 * @method static Builder<static>|InformationSchemaTable whereTableRows($value)
 * @method static Builder<static>|InformationSchemaTable whereTableSchema($value)
 * @method static Builder<static>|InformationSchemaTable whereUpdatedAt($value)
 * @method static Builder<static>|InformationSchemaTable whereUpdatedBy($value)
 * @property string|null $model_class
 * @method static Builder<static>|InformationSchemaTable whereModelClass($value)
 * @mixin \Eloquent
 */
	class InformationSchemaTable extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * @property string|null $id
 * @property string|null $name
 * @property int|null $size
 * @property-read string|null $file_content
 * @method static \Modules\Xot\Database\Factories\LogFactory factory($count = null, $state = [])
 * @method static Builder<static>|Log newModelQuery()
 * @method static Builder<static>|Log newQuery()
 * @method static Builder<static>|Log query()
 * @method static Builder<static>|Log whereId($value)
 * @method static Builder<static>|Log whereName($value)
 * @method static Builder<static>|Log whereSize($value)
 * @mixin \Eloquent
 */
	class Log extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property bool|null $status
 * @property int|null $priority
 * @property string|null $path
 * @method static Builder|Module newModelQuery()
 * @method static Builder|Module newQuery()
 * @method static Builder|Module query()
 * @method static Builder|Module whereDescription($value)
 * @method static Builder|Module whereId($value)
 * @method static Builder|Module whereName($value)
 * @method static Builder|Module wherePath($value)
 * @method static Builder|Module wherePriority($value)
 * @method static Builder|Module whereStatus($value)
 * @property string|null $icon
 * @property array<string, string>|null $colors
 * @method static Builder|Module whereColors($value)
 * @method static Builder|Module whereIcon($value)
 * @mixin \Eloquent
 */
	class Module extends \Eloquent {}
}

