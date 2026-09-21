<?php

declare(strict_types=1);

return [
    'navigation' => [
        'group' => [
            'name' => 'Уведомления',
<<<<<<< HEAD
            'description' => 'Управление email уведомлениями и их шаблонами'],
=======
            'description' => 'Управление email уведомлениями и их шаблонами',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'label' => 'Email шаблоны',
        'plural' => 'Email шаблоны',
        'singular' => 'Email шаблон',
        'icon' => 'heroicon-o-envelope',
        'sort' => '1',
<<<<<<< HEAD
        'name' => 'Email шаблон'],
=======
        'name' => 'Email шаблон',
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'fields' => [
        'id' => [
            'label' => 'ID',
            'helper_text' => 'Уникальный идентификатор шаблона',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'mailable' => [
            'label' => 'Класс Mailable',
            'placeholder' => 'Введите имя класса Mailable',
            'help' => 'PHP класс, который обрабатывает отправку email',
            'helper_text' => 'PHP класс, управляющий отправкой email',
            'description' => 'mailable',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'subject' => [
            'label' => 'Тема',
            'placeholder' => 'Введите тему письма',
            'help' => 'Тема, которая появится в письме',
            'helper_text' => 'Тема письма',
            'description' => 'subject',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'html_template' => [
            'label' => 'HTML содержимое',
            'placeholder' => 'Введите HTML содержимое письма',
            'help' => 'Содержимое письма в формате HTML',
            'helper_text' => 'HTML содержимое email шаблона',
            'description' => 'html_template',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'text_template' => [
            'label' => 'Текстовое содержимое',
            'placeholder' => 'Введите текстовое содержимое письма',
            'help' => 'Текстовая версия письма для клиентов, не поддерживающих HTML',
            'helper_text' => 'Текстовая версия email шаблона',
            'description' => 'text_template',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'version' => [
            'label' => 'Версия',
            'help' => 'Номер версии шаблона',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'created_at' => [
            'label' => 'Создано',
            'helper_text' => 'Дата создания шаблона',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'updated_at' => [
            'label' => 'Последнее изменение',
            'helper_text' => 'Дата последнего изменения шаблона',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'from_email' => [
            'label' => 'Email отправителя',
            'helper_text' => 'Адрес электронной почты отправителя',
            'placeholder' => 'noreply@example.com',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'from_name' => [
            'label' => 'Имя отправителя',
            'helper_text' => 'Отображаемое имя отправителя',
            'placeholder' => 'Название компании',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'variables' => [
            'label' => 'Доступные переменные',
            'helper_text' => 'Список переменных, которые можно использовать в шаблоне',
            'placeholder' => 'напр: {{name}}, {{email}}',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'is_markdown' => [
            'label' => 'Использовать Markdown',
            'helper_text' => 'Указывает, использует ли шаблон синтаксис Markdown',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'status' => [
            'label' => 'Статус',
            'helper_text' => 'Текущий статус шаблона',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'toggleColumns' => [
            'label' => 'toggleColumns',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'resetFilters' => [
            'label' => 'resetFilters',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'applyFilters' => [
            'label' => 'applyFilters',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'openFilters' => [
            'label' => 'openFilters',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'layout' => [
            'label' => 'layout',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'slug' => [
            'label' => 'slug',
            'description' => 'slug',
            'helper_text' => 'slug',
            'placeholder' => 'slug',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'name' => [
            'description' => 'Название шаблона',
            'helper_text' => 'Описательное имя для идентификации шаблона',
            'placeholder' => 'Напр: Добро пожаловать, Подтверждение заказа, Сброс пароля',
            'label' => 'Название шаблона',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'params' => [
            'label' => 'Параметры',
            'helper_text' => 'Введите параметры, разделенные запятыми, которые можно использовать в шаблоне',
            'placeholder' => 'name, email, date, company',
            'description' => 'Доступные параметры для email шаблона',
<<<<<<< HEAD
            'tooltip' => '']],
=======
            'tooltip' => '',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'filters' => [
        'search_placeholder' => 'Поиск шаблонов...',
        'version' => [
            'label' => 'Версия',
<<<<<<< HEAD
            'placeholder' => 'Выбрать версию']],
=======
            'placeholder' => 'Выбрать версию',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'actions' => [
        'create' => [
            'label' => 'Новый шаблон',
            'modal' => [
                'heading' => 'Создать email шаблон',
                'description' => 'Введите данные для нового email шаблона',
<<<<<<< HEAD
                'submit' => 'Создать']],
=======
                'submit' => 'Создать',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'edit' => [
            'label' => 'Редактировать',
            'modal' => [
                'heading' => 'Редактировать email шаблон',
                'description' => 'Изменить данные email шаблона',
<<<<<<< HEAD
                'submit' => 'Сохранить']],
=======
                'submit' => 'Сохранить',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'delete' => [
            'label' => 'Удалить',
            'modal' => [
                'heading' => 'Удалить email шаблон',
                'description' => 'Вы уверены, что хотите удалить этот шаблон? Это действие нельзя отменить.',
<<<<<<< HEAD
                'submit' => 'Удалить']],
        'restore' => [
            'label' => 'Восстановить'],
=======
                'submit' => 'Удалить',
            ],
        ],
        'restore' => [
            'label' => 'Восстановить',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'force_delete' => [
            'label' => 'Полное удаление',
            'modal' => [
                'heading' => 'Полное удаление email шаблона',
                'description' => 'Вы уверены, что хотите полностью удалить этот шаблон? Это действие нельзя отменить.',
<<<<<<< HEAD
                'submit' => 'Полное удаление']],
=======
                'submit' => 'Полное удаление',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'new_version' => [
            'label' => 'Новая версия',
            'modal' => [
                'heading' => 'Создать новую версию',
                'description' => 'Создать новую версию email шаблона',
<<<<<<< HEAD
                'submit' => 'Создать версию']],
=======
                'submit' => 'Создать версию',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'preview' => [
            'label' => 'Предварительный просмотр',
            'tooltip' => 'Посмотреть предварительный просмотр письма',
            'success_message' => 'Предварительный просмотр успешно создан',
<<<<<<< HEAD
            'error_message' => 'Ошибка при создании предварительного просмотра'],
=======
            'error_message' => 'Ошибка при создании предварительного просмотра',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'test' => [
            'label' => 'Отправить тест',
            'tooltip' => 'Отправить тестовое письмо',
            'success_message' => 'Тестовое письмо успешно отправлено',
<<<<<<< HEAD
            'error_message' => 'Ошибка при отправке тестового письма'],
=======
            'error_message' => 'Ошибка при отправке тестового письма',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'duplicate' => [
            'label' => 'Дублировать',
            'tooltip' => 'Создать копию шаблона',
            'success_message' => 'Шаблон успешно дублирован',
<<<<<<< HEAD
            'error_message' => 'Ошибка при дублировании шаблона'],
=======
            'error_message' => 'Ошибка при дублировании шаблона',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'export' => [
            'label' => 'Экспорт',
            'tooltip' => 'Экспортировать шаблон в формат JSON',
            'success_message' => 'Шаблон успешно экспортирован',
<<<<<<< HEAD
            'error_message' => 'Ошибка при экспорте шаблона'],
=======
            'error_message' => 'Ошибка при экспорте шаблона',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'import' => [
            'label' => 'Импорт',
            'tooltip' => 'Импортировать шаблон из JSON файла',
            'success_message' => 'Шаблон успешно импортирован',
<<<<<<< HEAD
            'error_message' => 'Ошибка при импорте шаблона']],
=======
            'error_message' => 'Ошибка при импорте шаблона',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'messages' => [
        'created' => 'Email шаблон успешно создан.',
        'updated' => 'Email шаблон успешно обновлен.',
        'deleted' => 'Email шаблон успешно удален.',
        'restored' => 'Email шаблон успешно восстановлен.',
        'force_deleted' => 'Email шаблон полностью удален.',
        'version_created' => 'Новая версия шаблона успешно создана.',
        'success' => 'Операция успешно выполнена',
        'error' => 'Произошла ошибка во время операции',
        'confirmation' => 'Вы уверены, что хотите продолжить эту операцию?',
        'template_created' => 'Email шаблон был успешно создан',
        'template_updated' => 'Email шаблон был успешно обновлен',
<<<<<<< HEAD
        'template_deleted' => 'Email шаблон был успешно удален'],
    'sections' => [
        'template' => [
            'label' => 'Шаблон',
            'description' => 'Основная информация шаблона'],
        'versions' => [
            'label' => 'Версии',
            'description' => 'История версий шаблона'],
        'logs' => [
            'label' => 'Журналы',
            'description' => 'История отправки шаблона'],
=======
        'template_deleted' => 'Email шаблон был успешно удален',
    ],
    'sections' => [
        'template' => [
            'label' => 'Шаблон',
            'description' => 'Основная информация шаблона',
        ],
        'versions' => [
            'label' => 'Версии',
            'description' => 'История версий шаблона',
        ],
        'logs' => [
            'label' => 'Журналы',
            'description' => 'История отправки шаблона',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'main' => 'Основная информация',
        'content' => 'Содержимое',
        'styling' => 'Стили',
        'settings' => 'Настройки',
<<<<<<< HEAD
        'variables' => 'Переменные'],
=======
        'variables' => 'Переменные',
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'status' => [
        'sent' => 'Отправлено',
        'delivered' => 'Доставлено',
        'failed' => 'Неудачно',
        'opened' => 'Открыто',
        'clicked' => 'Кликнуто',
        'bounced' => 'Возвращено',
<<<<<<< HEAD
        'spam' => 'Помечено как спам'],
    'model' => [
        'label' => 'email шаблон'],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
=======
        'spam' => 'Помечено как спам',
    ],
    'model' => [
        'label' => 'email шаблон',
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
