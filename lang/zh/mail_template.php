<?php

declare(strict_types=1);

return [
    'navigation' => [
        'group' => [
            'name' => '通知',
<<<<<<< HEAD
            'description' => '电子邮件通知及其模板管理'],
=======
            'description' => '电子邮件通知及其模板管理',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'label' => '邮件模板',
        'plural' => '邮件模板',
        'singular' => '邮件模板',
        'icon' => 'heroicon-o-envelope',
        'sort' => '1',
<<<<<<< HEAD
        'name' => '邮件模板'],
=======
        'name' => '邮件模板',
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'fields' => [
        'id' => [
            'label' => 'ID',
            'helper_text' => '模板的唯一标识符',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'mailable' => [
            'label' => '可邮件类',
            'placeholder' => '输入可邮件类名称',
            'help' => '处理邮件发送的PHP类',
            'helper_text' => '处理邮件发送的PHP类',
            'description' => '可邮件类',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'subject' => [
            'label' => '主题',
            'placeholder' => '输入邮件主题',
            'help' => '邮件中显示的主题',
            'helper_text' => '邮件主题',
            'description' => '主题',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'html_template' => [
            'label' => 'HTML内容',
            'placeholder' => '输入邮件HTML内容',
            'help' => 'HTML格式的邮件内容',
            'helper_text' => '邮件模板的HTML内容',
            'description' => 'HTML模板',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'text_template' => [
            'label' => '文本内容',
            'placeholder' => '输入邮件文本内容',
            'help' => '不支持HTML的邮件客户端的文本版本',
            'helper_text' => '邮件模板的文本版本',
            'description' => '文本模板',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'version' => [
            'label' => '版本',
            'help' => '模板版本号',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'created_at' => [
            'label' => '创建时间',
            'helper_text' => '模板创建日期',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'updated_at' => [
            'label' => '最后修改',
            'helper_text' => '模板最后修改日期',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'from_email' => [
            'label' => '发件人邮箱',
            'helper_text' => '发件人邮箱地址',
            'placeholder' => 'noreply@example.com',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'from_name' => [
            'label' => '发件人姓名',
            'helper_text' => '发件人显示姓名',
            'placeholder' => '公司名称',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'variables' => [
            'label' => '可用变量',
            'helper_text' => '模板中可使用的变量列表',
            'placeholder' => '例如: {{name}}, {{email}}',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'is_markdown' => [
            'label' => '使用Markdown',
            'helper_text' => '模板是否使用Markdown语法',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'status' => [
            'label' => '状态',
            'helper_text' => '模板当前状态',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'toggleColumns' => [
            'label' => '切换列',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'reorderRecords' => [
            'label' => '重新排序记录',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'resetFilters' => [
            'label' => '重置筛选器',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'applyFilters' => [
            'label' => '应用筛选器',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'openFilters' => [
            'label' => '打开筛选器',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'layout' => [
            'label' => '布局',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'slug' => [
            'label' => '别名',
            'description' => '别名',
            'helper_text' => '别名',
            'placeholder' => '别名',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'name' => [
            'description' => '模板名称',
            'helper_text' => '用于标识模板的描述性名称',
            'placeholder' => '例如: 欢迎邮件, 订单确认, 密码重置',
            'label' => '模板名称',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'params' => [
            'label' => '参数',
            'helper_text' => '输入模板中可使用的参数，用逗号分隔',
            'placeholder' => 'name, email, date, company',
            'description' => '邮件模板可用参数',
<<<<<<< HEAD
            'tooltip' => '']],
=======
            'tooltip' => '',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'filters' => [
        'search_placeholder' => '搜索模板...',
        'version' => [
            'label' => '版本',
<<<<<<< HEAD
            'placeholder' => '选择版本']],
=======
            'placeholder' => '选择版本',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'actions' => [
        'create' => [
            'label' => '新建模板',
            'modal' => [
                'heading' => '创建邮件模板',
                'description' => '输入新邮件模板的详细信息',
<<<<<<< HEAD
                'submit' => '创建']],
=======
                'submit' => '创建',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'edit' => [
            'label' => '编辑',
            'modal' => [
                'heading' => '编辑邮件模板',
                'description' => '修改邮件模板详细信息',
<<<<<<< HEAD
                'submit' => '保存']],
=======
                'submit' => '保存',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'delete' => [
            'label' => '删除',
            'modal' => [
                'heading' => '删除邮件模板',
                'description' => '您确定要删除此模板吗？此操作无法撤销。',
<<<<<<< HEAD
                'submit' => '删除']],
        'restore' => [
            'label' => '恢复'],
=======
                'submit' => '删除',
            ],
        ],
        'restore' => [
            'label' => '恢复',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'force_delete' => [
            'label' => '永久删除',
            'modal' => [
                'heading' => '永久删除邮件模板',
                'description' => '您确定要永久删除此模板吗？此操作无法撤销。',
<<<<<<< HEAD
                'submit' => '永久删除']],
=======
                'submit' => '永久删除',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'new_version' => [
            'label' => '新版本',
            'modal' => [
                'heading' => '创建新版本',
                'description' => '创建邮件模板的新版本',
<<<<<<< HEAD
                'submit' => '创建版本']],
=======
                'submit' => '创建版本',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'preview' => [
            'label' => '预览',
            'tooltip' => '查看邮件预览',
            'success_message' => '预览生成成功',
<<<<<<< HEAD
            'error_message' => '生成预览时出错'],
=======
            'error_message' => '生成预览时出错',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'test' => [
            'label' => '发送测试',
            'tooltip' => '发送测试邮件',
            'success_message' => '测试邮件发送成功',
<<<<<<< HEAD
            'error_message' => '发送测试邮件时出错'],
=======
            'error_message' => '发送测试邮件时出错',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'duplicate' => [
            'label' => '复制',
            'tooltip' => '创建模板副本',
            'success_message' => '模板复制成功',
<<<<<<< HEAD
            'error_message' => '复制模板时出错'],
=======
            'error_message' => '复制模板时出错',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'export' => [
            'label' => '导出',
            'tooltip' => '以JSON格式导出模板',
            'success_message' => '模板导出成功',
<<<<<<< HEAD
            'error_message' => '导出模板时出错'],
=======
            'error_message' => '导出模板时出错',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'import' => [
            'label' => '导入',
            'tooltip' => '从JSON文件导入模板',
            'success_message' => '模板导入成功',
<<<<<<< HEAD
            'error_message' => '导入模板时出错']],
=======
            'error_message' => '导入模板时出错',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'messages' => [
        'created' => '邮件模板创建成功。',
        'updated' => '邮件模板更新成功。',
        'deleted' => '邮件模板删除成功。',
        'restored' => '邮件模板恢复成功。',
        'force_deleted' => '邮件模板永久删除。',
        'version_created' => '新模板版本创建成功。',
        'success' => '操作成功完成',
        'error' => '操作过程中发生错误',
        'confirmation' => '您确定要执行此操作吗？',
        'template_created' => '邮件模板已成功创建',
        'template_updated' => '邮件模板已成功更新',
<<<<<<< HEAD
        'template_deleted' => '邮件模板已成功删除'],
    'sections' => [
        'template' => [
            'label' => '模板',
            'description' => '模板主要信息'],
        'versions' => [
            'label' => '版本',
            'description' => '模板版本历史'],
        'logs' => [
            'label' => '日志',
            'description' => '模板发送历史'],
=======
        'template_deleted' => '邮件模板已成功删除',
    ],
    'sections' => [
        'template' => [
            'label' => '模板',
            'description' => '模板主要信息',
        ],
        'versions' => [
            'label' => '版本',
            'description' => '模板版本历史',
        ],
        'logs' => [
            'label' => '日志',
            'description' => '模板发送历史',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'main' => '主要信息',
        'content' => '内容',
        'styling' => '样式',
        'settings' => '设置',
<<<<<<< HEAD
        'variables' => '变量'],
=======
        'variables' => '变量',
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'status' => [
        'sent' => '已发送',
        'delivered' => '已送达',
        'failed' => '失败',
        'opened' => '已打开',
        'clicked' => '已点击',
        'bounced' => '退回',
<<<<<<< HEAD
        'spam' => '标记为垃圾邮件'],
    'model' => [
        'label' => '邮件模板'],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
=======
        'spam' => '标记为垃圾邮件',
    ],
    'model' => [
        'label' => '邮件模板',
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
