<?php
add_action('wp_ajax_enviar_proposta', 'handle_enviar_proposta');
add_action('wp_ajax_nopriv_enviar_proposta', 'handle_enviar_proposta');

function handle_enviar_proposta() {
    $envio = sanitize_text_field($_POST['envio']);
    $nome = sanitize_text_field($_POST['nome']);
    $empresa = sanitize_text_field($_POST['empresa']);
    $cnpj = sanitize_text_field($_POST['cnpj']);
    $contato = sanitize_text_field($_POST['contato']);
    $cart = isset($_POST['cart']) ? $_POST['cart'] : [];

    $para = 'marcos@wave.pro.br';
    $assunto = 'Nova Proposta Recebida';

    // Monta a tabela
    $tabela = '<table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; width: 100%;">';
    $tabela .= '<thead>
                    <tr style="background-color: #f97316; color: #fff;">
                        <th>Material</th>
                        <th>Formato</th>
                        <th>Medidas</th>
                        <th>Quantidade</th>
                    </tr>
                </thead><tbody>';

    if (is_array($cart)) {
        foreach ($cart as $item) {
            $material = sanitize_text_field($item['material']);
            $formato = sanitize_text_field($item['formato']);
            $quantidade = intval($item['quantidade']);
            
            // Monta as medidas
            $medidas = '';
            if (!empty($item['medidas']) && is_array($item['medidas'])) {
                foreach ($item['medidas'] as $key => $medida) {
                    if (!empty($medida['label']) && !empty($medida['value'])) {
                        $medidas .= '<strong>' . esc_html($medida['label']) . ':</strong> ' . esc_html($medida['value']) . '<br>';
                    }
                }
            }

            $tabela .= "<tr>
                            <td>{$material}</td>
                            <td>{$formato}</td>
                            <td>{$medidas}</td>
                            <td>{$quantidade}</td>
                        </tr>";
        }
    }

    $tabela .= '</tbody></table>';

    $mensagem = '
        <div style="font-family: Arial, sans-serif; color: #333;">
            <h2 style="color: #f97316;">Nova proposta recebida</h2>
            <p><strong>Deseja receber retorno em:</strong> ' . esc_html($envio) . '</p>
            <p><strong>Nome:</strong> ' . esc_html($nome) . '</p>
            <p><strong>Empresa:</strong> ' . esc_html($empresa) . '</p>
            <p><strong>CNPJ:</strong> ' . esc_html($cnpj) . '</p>
            <p><strong>Contato:</strong> ' . esc_html($contato) . '</p>

            <h3 style="margin-top: 20px;">Produtos</h3>
            ' . $tabela . '
        </div>
    ';

    $headers = array('Content-Type: text/html; charset=UTF-8');

    $enviado = wp_mail($para, $assunto, $mensagem, $headers);

    if($enviado) {
        wp_send_json_success('Proposta enviada com sucesso.');
    } else {
        wp_send_json_error('Erro ao enviar proposta.');
    }

    wp_die();
}