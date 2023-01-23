<?php
namespace App\Utils;

class Constants {
    // Conditions
    const REQUIRED          = 'Campo Obrigatório;';
    const UNIQUE            = 'Registro em Duplicidade;';
    const MIN_LENGTH        = 'Tamanho Mínimo Obrigatório;';
    const MAX_LENGTH        = 'Tamanho Máximo Excedido;';

    // Types
    const STRING            = 'Deve ser Texto;';
    const NUMERIC           = 'Deve ser Numérico;';
    const DATE              = 'Deve ser uma Data (yyyy-mm-dd hh:ii:ss);';
    const EMAIL             = 'Deve ser um email válido;';

    // Misc
    const SAVE_SUCCESS      = 'Registro Salvo!';
    const SAVE_FAIL         = 'Registro Não Salvo!';
    const DELETE_SUCCESS    = 'Registro removido com sucesso!';
    const DELETE_FAIL       = 'Este item não existe ou não é válido!';
}
