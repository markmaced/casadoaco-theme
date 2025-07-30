<?php
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

function render_importador_tabelas()
{
    ?>
    <div class="wrap">
        <h1>Importador de Tabelas</h1>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="xlsx_tabela" accept=".xlsx" required>
            <input type="submit" class="button button-primary" name="importar_tabela" value="Importar Tabela">
        </form>
    </div>
    <?php

    if (isset($_POST['importar_tabela']) && !empty($_FILES['xlsx_tabela']['tmp_name'])) {
        require_once __DIR__ . '/../vendor/autoload.php';

        $file = $_FILES['xlsx_tabela']['tmp_name'];
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();

        $titulo_tabela = $sheet->getCell('A1')->getFormattedValue();

        $table = '<div class="relative overflow-x-auto">';
        $table .= '<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border border-gray-200">';

        $mergedCells = $sheet->getMergeCells();
        $skipCells = [];

        $rowCount = 0;

        foreach ($sheet->getRowIterator() as $row) {
            $rowIndex = $row->getRowIndex();
            $bgColor = ($rowIndex % 2 == 0) ? '#f1f1f1' : '#ffffff';

            if ($rowIndex == 1) {
                $table .= '<tr>';
            } else {
                $table .= '<tr class="group hover:bg-casadoaco-orange transition-all duration-200 cursor-pointer row-table-style" style="background-color:' . $bgColor . ';">';
            }

            foreach ($row->getCellIterator() as $cell) {
                $colIndex = $cell->getColumn();
                $cellCoord = $colIndex . $rowIndex;

                if (in_array($cellCoord, $skipCells)) {
                    continue;
                }

                $value = $cell->getFormattedValue();
                $attributes = ' class="border px-6 py-3 group-hover:text-white"';

                $colspan = 1;
                $rowspan = 1;
                foreach ($mergedCells as $mergeRange) {
                    if ($cellCoord === explode(':', $mergeRange)[0]) {
                        [$start, $end] = explode(':', $mergeRange);
                        $startCell = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::coordinateFromString($start);
                        $endCell = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::coordinateFromString($end);
                        $colspan = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($endCell[0]) - \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startCell[0]) + 1;
                        $rowspan = $endCell[1] - $startCell[1] + 1;

                        for ($r = $startCell[1]; $r <= $endCell[1]; $r++) {
                            for ($c = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startCell[0]); $c <= \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($endCell[0]); $c++) {
                                $coord = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($c) . $r;
                                if ($coord !== $cellCoord) {
                                    $skipCells[] = $coord;
                                }
                            }
                        }
                        break;
                    }
                }

                if ($colspan > 1)
                    $attributes .= ' colspan="' . $colspan . '"';
                if ($rowspan > 1)
                    $attributes .= ' rowspan="' . $rowspan . '"';

                if ($rowIndex == 1) {
                    $table .= '<th scope="col" style="background-color:#f1f1f1;"' . $attributes . '>' . esc_html($value) . '</th>';
                } else {
                    $table .= '<td' . $attributes . '>' . esc_html($value) . '</td>';
                }
            }

            $table .= '</tr>';
        }

        $table .= '</table></div>';

        // Cria o post com o título da célula A1
        $post_id = wp_insert_post([
            'post_title' => $titulo_tabela ?: 'Tabela Importada',
            'post_type' => 'tabelas',
            'post_status' => 'publish',
            'post_content' => $table,
        ]);

        if ($post_id) {
            $shortcode = '[tabela_produto id="' . $post_id . '"]';
            wp_update_post([
                'ID' => $post_id,
                'post_title' => $titulo_tabela . ' ' . $shortcode,
            ]);
            echo '<div class="notice notice-success"><p>Tabela importada com sucesso! Use o shortcode: <code>' . $shortcode . '</code></p></div>';
        }
    }
}

function tabela_admin_menu()
{
    add_submenu_page(
        'edit.php?post_type=tabelas',
        'Importador de Tabelas',
        'Importador de Tabelas',
        'manage_options',
        'importador-tabelas',
        'render_importador_tabelas'
    );
}
add_action('admin_menu', 'tabela_admin_menu');