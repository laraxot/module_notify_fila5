<?php

declare(strict_types=1);

return [
    'navigation' => [
        'group' => [
            'name' => 'Notificações',
<<<<<<< HEAD
            'description' => 'Gestão de notificações por e-mail e seus modelos'],
=======
            'description' => 'Gestão de notificações por e-mail e seus modelos',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'label' => 'Modelos de E-mail',
        'plural' => 'Modelos de E-mail',
        'singular' => 'Modelo de E-mail',
        'icon' => 'heroicon-o-envelope',
        'sort' => '1',
<<<<<<< HEAD
        'name' => 'Modelo de E-mail'],
=======
        'name' => 'Modelo de E-mail',
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'fields' => [
        'id' => [
            'label' => 'ID',
            'helper_text' => 'Identificador único do modelo',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'mailable' => [
            'label' => 'Classe Mailable',
            'placeholder' => 'Insira o nome da classe Mailable',
            'help' => 'A classe PHP que lida com o envio de e-mails',
            'helper_text' => 'Classe PHP que gerencia o envio de e-mails',
            'description' => 'mailable',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'subject' => [
            'label' => 'Assunto',
            'placeholder' => 'Insira o assunto do e-mail',
            'help' => 'O assunto que aparecerá no e-mail',
            'helper_text' => 'Assunto do e-mail',
            'description' => 'subject',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'html_template' => [
            'label' => 'Conteúdo HTML',
            'placeholder' => 'Insira o conteúdo HTML do e-mail',
            'help' => 'O conteúdo do e-mail em formato HTML',
            'helper_text' => 'Conteúdo HTML do modelo de e-mail',
            'description' => 'html_template',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'text_template' => [
            'label' => 'Conteúdo de Texto',
            'placeholder' => 'Insira o conteúdo de texto do e-mail',
            'help' => 'Versão de texto do e-mail para clientes que não suportam HTML',
            'helper_text' => 'Versão de texto do modelo de e-mail',
            'description' => 'text_template',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'version' => [
            'label' => 'Versão',
            'help' => 'Número da versão do modelo',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'created_at' => [
            'label' => 'Criado em',
            'helper_text' => 'Data de criação do modelo',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'updated_at' => [
            'label' => 'Última Modificação',
            'helper_text' => 'Data da última modificação do modelo',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'from_email' => [
            'label' => 'E-mail do remetente',
            'helper_text' => 'Endereço de e-mail do remetente',
            'placeholder' => 'noreply@exemplo.com',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'from_name' => [
            'label' => 'Nome do remetente',
            'helper_text' => 'Nome exibido do remetente',
            'placeholder' => 'Nome da Empresa',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'variables' => [
            'label' => 'Variáveis disponíveis',
            'helper_text' => 'Lista de variáveis que podem ser usadas no modelo',
            'placeholder' => 'ex: {{name}}, {{email}}',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'is_markdown' => [
            'label' => 'Usar Markdown',
            'helper_text' => 'Indica se o modelo usa sintaxe Markdown',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'status' => [
            'label' => 'Status',
            'helper_text' => 'Status atual do modelo',
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
            'description' => 'Nome do modelo',
            'helper_text' => 'Nome descritivo para identificar o modelo',
            'placeholder' => 'Ex: Bem-vindo, Confirmação de pedido, Redefinição de senha',
            'label' => 'Nome do Modelo',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'params' => [
            'label' => 'Parâmetros',
            'helper_text' => 'Insira os parâmetros separados por vírgula que podem ser usados no modelo',
            'placeholder' => 'name, email, date, company',
            'description' => 'Parâmetros disponíveis para o modelo de e-mail',
<<<<<<< HEAD
            'tooltip' => '']],
=======
            'tooltip' => '',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'filters' => [
        'search_placeholder' => 'Procurar modelos...',
        'version' => [
            'label' => 'Versão',
<<<<<<< HEAD
            'placeholder' => 'Selecionar versão']],
=======
            'placeholder' => 'Selecionar versão',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'actions' => [
        'create' => [
            'label' => 'Novo Modelo',
            'modal' => [
                'heading' => 'Criar Modelo de E-mail',
                'description' => 'Insira os detalhes para o novo modelo de e-mail',
<<<<<<< HEAD
                'submit' => 'Criar']],
=======
                'submit' => 'Criar',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'edit' => [
            'label' => 'Editar',
            'modal' => [
                'heading' => 'Editar Modelo de E-mail',
                'description' => 'Modificar os detalhes do modelo de e-mail',
<<<<<<< HEAD
                'submit' => 'Salvar']],
=======
                'submit' => 'Salvar',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'delete' => [
            'label' => 'Excluir',
            'modal' => [
                'heading' => 'Excluir Modelo de E-mail',
                'description' => 'Tem certeza de que deseja excluir este modelo? Esta ação não pode ser desfeita.',
<<<<<<< HEAD
                'submit' => 'Excluir']],
        'restore' => [
            'label' => 'Restaurar'],
=======
                'submit' => 'Excluir',
            ],
        ],
        'restore' => [
            'label' => 'Restaurar',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'force_delete' => [
            'label' => 'Excluir Permanentemente',
            'modal' => [
                'heading' => 'Excluir Permanentemente Modelo de E-mail',
                'description' => 'Tem certeza de que deseja excluir permanentemente este modelo? Esta ação não pode ser desfeita.',
<<<<<<< HEAD
                'submit' => 'Excluir Permanentemente']],
=======
                'submit' => 'Excluir Permanentemente',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'new_version' => [
            'label' => 'Nova Versão',
            'modal' => [
                'heading' => 'Criar Nova Versão',
                'description' => 'Criar uma nova versão do modelo de e-mail',
<<<<<<< HEAD
                'submit' => 'Criar Versão']],
=======
                'submit' => 'Criar Versão',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'preview' => [
            'label' => 'Pré-visualizar',
            'tooltip' => 'Visualizar prévia do e-mail',
            'success_message' => 'Pré-visualização gerada com sucesso',
<<<<<<< HEAD
            'error_message' => 'Erro ao gerar pré-visualização'],
=======
            'error_message' => 'Erro ao gerar pré-visualização',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'test' => [
            'label' => 'Enviar teste',
            'tooltip' => 'Enviar um e-mail de teste',
            'success_message' => 'E-mail de teste enviado com sucesso',
<<<<<<< HEAD
            'error_message' => 'Erro ao enviar e-mail de teste'],
=======
            'error_message' => 'Erro ao enviar e-mail de teste',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'duplicate' => [
            'label' => 'Duplicar',
            'tooltip' => 'Criar uma cópia do modelo',
            'success_message' => 'Modelo duplicado com sucesso',
<<<<<<< HEAD
            'error_message' => 'Erro ao duplicar modelo'],
=======
            'error_message' => 'Erro ao duplicar modelo',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'export' => [
            'label' => 'Exportar',
            'tooltip' => 'Exportar modelo em formato JSON',
            'success_message' => 'Modelo exportado com sucesso',
<<<<<<< HEAD
            'error_message' => 'Erro ao exportar modelo'],
=======
            'error_message' => 'Erro ao exportar modelo',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'import' => [
            'label' => 'Importar',
            'tooltip' => 'Importar modelo de um arquivo JSON',
            'success_message' => 'Modelo importado com sucesso',
<<<<<<< HEAD
            'error_message' => 'Erro ao importar modelo']],
=======
            'error_message' => 'Erro ao importar modelo',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'messages' => [
        'created' => 'Modelo de e-mail criado com sucesso.',
        'updated' => 'Modelo de e-mail atualizado com sucesso.',
        'deleted' => 'Modelo de e-mail excluído com sucesso.',
        'restored' => 'Modelo de e-mail restaurado com sucesso.',
        'force_deleted' => 'Modelo de e-mail excluído permanentemente.',
        'version_created' => 'Nova versão do modelo criada com sucesso.',
        'success' => 'Operação concluída com sucesso',
        'error' => 'Ocorreu um erro durante a operação',
        'confirmation' => 'Tem certeza de que deseja prosseguir com esta operação?',
        'template_created' => 'O modelo de e-mail foi criado com sucesso',
        'template_updated' => 'O modelo de e-mail foi atualizado com sucesso',
<<<<<<< HEAD
        'template_deleted' => 'O modelo de e-mail foi excluído com sucesso'],
    'sections' => [
        'template' => [
            'label' => 'Modelo',
            'description' => 'Informações principais do modelo'],
        'versions' => [
            'label' => 'Versões',
            'description' => 'Histórico de versões do modelo'],
        'logs' => [
            'label' => 'Registros',
            'description' => 'Histórico de envio do modelo'],
=======
        'template_deleted' => 'O modelo de e-mail foi excluído com sucesso',
    ],
    'sections' => [
        'template' => [
            'label' => 'Modelo',
            'description' => 'Informações principais do modelo',
        ],
        'versions' => [
            'label' => 'Versões',
            'description' => 'Histórico de versões do modelo',
        ],
        'logs' => [
            'label' => 'Registros',
            'description' => 'Histórico de envio do modelo',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'main' => 'Informações Principais',
        'content' => 'Conteúdo',
        'styling' => 'Estilo',
        'settings' => 'Configurações',
<<<<<<< HEAD
        'variables' => 'Variáveis'],
=======
        'variables' => 'Variáveis',
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'status' => [
        'sent' => 'Enviado',
        'delivered' => 'Entregue',
        'failed' => 'Falhou',
        'opened' => 'Aberto',
        'clicked' => 'Clicado',
        'bounced' => 'Devolvido',
<<<<<<< HEAD
        'spam' => 'Marcado como spam'],
    'model' => [
        'label' => 'modelo de e-mail'],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
=======
        'spam' => 'Marcado como spam',
    ],
    'model' => [
        'label' => 'modelo de e-mail',
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
