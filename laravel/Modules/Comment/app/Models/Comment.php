<?php

declare(strict_types=1);

namespace Modules\Comment\Models;

use Closure;
use Illuminate\Contracts\Database\Query\Expression;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Modules\Comment\Database\Factories\CommentFactory;
use Modules\Xot\Contracts\ProfileContract;
use Spatie\Comments\Models\Collections\ReactionCollection;
use Spatie\Comments\Models\Comment as BaseComment;
use Spatie\Comments\Models\CommentNotificationSubscription;
use Spatie\Comments\Models\Reaction;

/**
 * @property int $id
 * @property string $comment
 * @property int $post_id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $parent_id
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property string|null $commentable_type
 * @property string|null $commentable_id
 * @property string|null $commentator_type
 * @property string|null $commentator_id
 * @property string $text
 * @property string|null $extra
 * @property string|null $approved_at
 * @property string $original_text
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static CommentFactory factory($count = null, $state = [])
 * @method static Builder|Comment newModelQuery()
 * @method static Builder|Comment newQuery()
 * @method static Builder|Comment query()
 * @method static Builder|Comment whereApprovedAt($value)
 * @method static Builder|Comment whereComment($value)
 * @method static Builder|Comment whereCommentableId($value)
 * @method static Builder|Comment whereCommentableType($value)
 * @method static Builder|Comment whereCommentatorId($value)
 * @method static Builder|Comment whereCommentatorType($value)
 * @method static Builder|Comment whereCreatedAt($value)
 * @method static Builder|Comment whereCreatedBy($value)
 * @method static Builder|Comment whereDeletedAt($value)
 * @method static Builder|Comment whereDeletedBy($value)
 * @method static Builder|Comment whereExtra($value)
 * @method static Builder|Comment whereId($value)
 * @method static Builder|Comment whereOriginalText($value)
 * @method static Builder|Comment whereParentId($value)
 * @method static Builder|Comment wherePostId($value)
 * @method static Builder|Comment whereText($value)
 * @method static Builder|Comment whereUpdatedAt($value)
 * @method static Builder|Comment whereUpdatedBy($value)
 * @method static Builder|Comment whereUserId($value)
 * @property Model|\Eloquent $commentable
 * @property Model|\Eloquent $commentator
 * @property Collection<int, BaseComment> $comments
 * @property int|null $comments_count
 * @property Collection<int, BaseComment> $nestedComments
 * @property int|null $nested_comments_count
 * @property Collection<int, CommentNotificationSubscription> $notificationSubscriptions
 * @property int|null $notification_subscriptions_count
 * @property BaseComment|null $parentComment
 * @property ReactionCollection<int, Reaction> $reactions
 * @property int|null $reactions_count
 * @property ReactionCollection<int, Reaction> $unsortedReactionCounts
 * @property int|null $unsorted_reaction_counts_count
 * @method static Builder<static>|Comment approved()
 * @method static Builder<static>|Comment pending()
 * @method static Builder<static>|Comment topLevel()
 * @method static Comment|null first()
 * @method static Collection<int, Comment> get()
 * @method static Comment create(array $attributes = [])
 * @method static Comment firstOrCreate(array $attributes = [], array $values = [])
 * @method static Builder<static>|Comment where((string|Closure) $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static Builder<static>|Comment whereNotNull((string|Expression) $columns)
 * @method static int count(string $columns = '*')
 * @mixin \Eloquent
 */
class Comment extends BaseComment
{
    /** @var string */
    protected $connection = 'comment';
}
