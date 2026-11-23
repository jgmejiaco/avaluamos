/**
 * Defaults globales DataTables (Bootstrap 5):
 * - length + buscar en la misma fila
 * - info + paginación en la misma fila
 * - botones de export (B) en fila propia arriba, sin desalinear l/f
 */
(function (window, $) {
    'use strict';

    if (!$ || !$.fn || !$.fn.dataTable) {
        return;
    }

    // Misma estructura que dataTables.bootstrap5 + fila de botones
    window.dataTableDomConBotones =
        "<'row mb-2'<'col-12'B>>" +
        "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>";

    // Sin botones (p. ej. roles): layout Bootstrap 5 por defecto del plugin
    window.dataTableDomSinBotones =
        "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>";

    $.extend(true, $.fn.dataTable.defaults, {
        dom: window.dataTableDomSinBotones,
        pageLength: 10,
        lengthMenu: [[10, 15, 20, 25, 30, 35, 40, 45, 50, -1], [10, 15, 20, 25, 30, 35, 40, 45, 50, 'Todos']],
        autoWidth: false,
    });
})(window, jQuery);
