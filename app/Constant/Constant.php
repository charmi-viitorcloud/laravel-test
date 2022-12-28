<?php

namespace App\Constant;
use App\Models\Blog;
use App\Models\User;

class Constant
{
    public const STATUS_TEN = 10;
    public const STATUS_ONEHUNDRED= 100;
    public const STATUS_THREE= 3;


    
    /**
     * Status
     */
    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';
    public const STATUS_CREATE = 'create';
    public const STATUS_UPDATE = 'update';
    public const STATUS_DELETE = 'delete';
    public const STATUS_ALL = 'all';
    public const STATUS_TRUE = true;
    public const STATUS_FALSE = false;
    public const NULL = null;
    public const STATUS_ONE = 1;
    public const STATUS_ZERO = 0;

    /**
     * Typographical Symbols
     */
    public const BACK_SLASH = '\\';
    public const SLASH = '/';
    public const UNDERSCORE = '_';
    public const HYPHEN = '-';
    public const AT_SIGN = '@';

    public const BLOG_ACTIVITY_LOG = 'blog';

    /**
     * Blog Logs
     */
    public const CREATE_BLOG_ACTIVITY_LOG = 'create-blog';
    public const UPDATE_BLOG_ACTIVITY_LOG = 'update-blog';
    public const DELETE_BLOG_ACTIVITY_LOG = 'delete-blog';

    /**
     * Blog Command
     */
    public const BLOG_DESCRIPTION_COMMAND = 'Delete blogs older than the last 30 days and whose status is Inactive';
    public const BLOG_DESCRIPTION_PROCESS_START_COMMAND = 'Blog delete process started......';
    public const BLOG_DESCRIPTION_PROCESS_END_COMMAND = 'Blog delete successfully.';

    public const BlOG = Blog::class;

    public const USER = User::class;

}

?>