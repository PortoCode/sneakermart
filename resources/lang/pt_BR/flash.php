<?php

return [

    // Models
    'updated'                  => '[m] atualizado com sucesso!                                         |[f] atualizada com sucesso!',
    'updated_plural'           => '[m] atualizados com sucesso!                                        |[f] atualizadas com sucesso!',
    'not_updated'              => '[m] não atualizado.                                                 |[f] não atualizada.',

    'saved'                    => '[m] criado com sucesso!                                             |[f] criada com sucesso!',
    'saved_plural'             => '[m] criados com sucesso!                                            |[f] criadas com sucesso!',

    'deleted'                  => '[m] deletado com sucesso!                                           |[f] deletada com sucesso!',
    'deleted_plural'           => '[m] deletados com sucesso!                                          |[f] deletadas com sucesso!',
    'not_deleted'              => '[m] não pode ser deletado pois há outros registros atrelados a ele. |[f] não pode ser deletada pois há outros registros atrelados a ela.',

    'added'                    => '[m] adicionado com sucesso!                                         |[f] adicionada com sucesso!',
    'added_plural'             => '[m] adicionados com sucesso!                                        |[f] adicionadas com sucesso!',

    'removed'                  => '[m] removido com sucesso!                                           |[f] removida com sucesso!',
    'removed_plural'           => '[m] removidos com sucesso!                                          |[f] removidas com sucesso!',

    'not_found'                => '[m] não encontrado.                                                 |[f] não encontrada.',
    'not_found_plural'         => '[m] não encontrados.                                                |[f] não encontradas.',

    'completed'                => '[m] completado com sucesso!                                         |[f] completada com sucesso!',
    'inactivated'              => '[m] inativado com sucesso!                                          |[f] inativada com sucesso!',
    'activated'                => '[m] ativado com sucesso!                                            |[f] ativada com sucesso!',
    'imported'                 => '[m] importados com sucesso!                                         |[f] importadas com sucesso!',

    // Infos
    'define_permissions'        => 'Selecione abaixo as permissões de acesso deste usuário.',
    'close_and_select_item'     => 'Ele já está disponível na lista de itens, você pode fechar essa janela ou cadastrar outro se preferir.',
    'close_and_select_expense'  => 'Ela já está disponível na lista de despesas, você pode fechar essa janela ou cadastrar outra se preferir.',

    // Errors
    '403'                       => 'Você não tem permissão para acessar a página requisitada.',
    '404'                       => 'A página requisitada não existe.',
    'invalid_role'              => 'O perfil selecionado não é válido.',
    'invalid_login'             => 'Você não tem permissão para acessar o sistema.',
    'self_delete'               => 'Você não pode deletar o seu próprio usuário!',
    'inactive_user'             => 'Seu usuário foi desativado.',

    'zipcode_not_found'         => 'O CEP informado não foi encontrado.',
    'leaflet_marker'            => 'O marcador do mapa não pôde ser atualizado.',
    'leaflet_address'           => 'Os campos de endereço não puderam ser atualizados.',

    'upload_success'            => 'Upload realizado com sucesso! O arquivo está em processamento...',
    'upload_invalid_csv'        => 'Arquivo inválido! Faça o upload de um <b>arquivo.csv</b>.',
    'invalid_file'              => 'Você não selecionou um arquivo para importar, tente novamente.',

    'invalid_sectors_id'         => 'Selecione cada setor apenas uma vez.',
    'invalid_sectors_value'      => 'A soma dos valores dos setores deve ser igual ao valor da despesa.',
    'invalid_sectors_percentage' => 'A soma das porcentagens dos setores deve ser igual a 100%.',
    'invalid_sector_id'          => 'Selecione um setor para cada valor informado.',
    'invalid_sector_value'       => 'Informe um valor para cada setor selecionado.',
    'invalid_sector_percentage'  => 'Informe uma porcentagem para cada setor selecionado.',

    'invalid_item_type_item_id' => 'Informe tipo de item para cada item',
    'invalid_item_name'         => 'Informe nome para cada item',
    'invalid_item_value'        => 'Informe valor para cada item',
    'invalid_item_quantity'     => 'Informe quantidade para cada item',

    'invalid_expense_name'       => 'Informe descrição resumida para cada despesa',
    'invalid_expense_value'      => 'Informe valor para cada despesa',
    'invalid_expense_competency' => 'Informe competência para cada despesa',
    'invalid_expense_due_date'   => 'Informe data de vencimento para cada despesa',

    'invalid_invoice_number'               => 'Informe número para cada nota fiscal.',
    'invalid_invoice_date'                 => 'Informe data para cada nota fiscal.',
    'invalid_invoice_total_value'          => 'Informe valor total para cada nota fiscal.',
    'invalid_invoice_payment_slip_number'  => 'Informe nº do boleto para cada nota fiscal.',
    'invalid_invoice_installment_value'    => 'Informe valor da parcela para cada nota fiscal.',
    'invalid_invoice_installment_due_date' => 'Informe data de vencimento da parcela para cada nota fiscal.',

    'no_subsidiaries_in_company'         => 'A empresa selecionada não possui filiais',
    'no_operations_in_company'           => 'A empresa selecionada não possui operações',
    'no_vehicles_in_company'             => 'A empresa selecionada não possui veículos',
    'no_account_companies_in_company'    => 'A empresa selecionada não possui contas da empresa',
    'no_departments_in_subsidiary'       => 'A filial selecionada não possui departamentos',
    'no_employees_in_subsidiary'         => 'A filial selecionada não possui funcionários',
    'no_contracts_in_subsidiary'         => 'A filial selecionada não possui contratos',
    'no_purchases_in_subsidiary'         => 'A filial selecionada não possui compras',
    'no_sectors_in_department'           => 'O departamento selecionado não possui setores',
    'no_sections_in_sector'              => 'O setor selecionado não possui seções',
    'no_items_in_expense'                => 'A despesa selecionada não possui items',
    'no_expenses'                        => 'Não há despesas com o texto informado',
    'no_operation_location_in_operation' => 'A operação selecionada não possui locais de operação',

    'invalid_account_name'         => 'Informe nome para cada conta.',
    'invalid_account_agency'       => 'Informe agência para cada conta.',
    'invalid_account_agency_digit' => 'Informe dígito da agência para cada conta.',
    'invalid_account_number'       => 'Informe número para cada conta.',
    'invalid_account_number_digit' => 'Informe dígito para cada conta.',

    'invalid_quote_provider' => 'Informe fornecedor para cada cotação',
    'invalid_quote_value'    => 'Informe valor para cada cotação',
];
