/**
 * Feedback global al enviar formularios / acciones AJAX:
 * deshabilita botones y muestra "Procesando..." + spinner.
 *
 * Opt-out formularios: <form data-no-procesando>
 * Helpers AJAX: marcarBotonProcesando / restaurarBotonProcesando
 * Sin botón (drag): mostrarOverlayProcesando / ocultarOverlayProcesando
 */
(function (window, $) {
    'use strict';

    if (!$) {
        return;
    }

    var OVERLAY_ID = 'avaluamos-procesando-overlay';

    function botonesSubmit($form) {
        return $form.find('button[type="submit"], input[type="submit"]');
    }

    function botonesCancelar($contexto) {
        return $contexto.find(
            'button[data-bs-dismiss="modal"], button.btn-close, button[title="Cancelar"], a[data-bs-dismiss="modal"]'
        );
    }

    function marcarProcesando($form) {
        if ($form.data('procesando-activo')) {
            return;
        }

        $form.data('procesando-activo', true);

        botonesSubmit($form).each(function () {
            var $btn = $(this);

            $btn.prop('disabled', true);

            if ($btn.is('button')) {
                $btn.html("Procesando... <i class='fa fa-spinner fa-spin'></i>");
            } else {
                $btn.val('Procesando...');
            }
        });

        botonesCancelar($form).prop('disabled', true);
    }

    function marcarBotonProcesando($btn, texto) {
        $btn = $($btn);

        if (!$btn.length) {
            return;
        }

        if ($btn.data('html-original') === undefined) {
            $btn.data('html-original', $btn.html());
        }

        $btn.prop('disabled', true)
            .html((texto || 'Procesando...') + " <i class='fa fa-spinner fa-spin'></i>");

        var $modal = $btn.closest('.modal');
        if ($modal.length) {
            botonesCancelar($modal).prop('disabled', true);
        }
    }

    function restaurarBotonProcesando($btn) {
        $btn = $($btn);

        if (!$btn.length) {
            return;
        }

        var original = $btn.data('html-original');

        if (original !== undefined) {
            $btn.html(original);
        }

        $btn.prop('disabled', false);

        var $modal = $btn.closest('.modal');
        if ($modal.length) {
            botonesCancelar($modal).prop('disabled', false);
        }
    }

    function asegurarOverlay() {
        var $overlay = $('#' + OVERLAY_ID);

        if ($overlay.length) {
            return $overlay;
        }

        $overlay = $(
            '<div id="' + OVERLAY_ID + '" style="' +
            'display:none;position:fixed;inset:0;z-index:2000;' +
            'background:rgba(255,255,255,0.55);' +
            'align-items:center;justify-content:center;">' +
            '<div style="background:#21277B;color:#fff;padding:0.85rem 1.25rem;' +
            'border-radius:0.5rem;font-size:1rem;box-shadow:0 4px 16px rgba(0,0,0,0.2);">' +
            '<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> ' +
            '<span class="avaluamos-procesando-texto">Procesando...</span>' +
            '</div></div>'
        );

        $('body').append($overlay);

        return $overlay;
    }

    function mostrarOverlayProcesando(mensaje) {
        var $overlay = asegurarOverlay();
        $overlay.find('.avaluamos-procesando-texto').text(mensaje || 'Procesando...');
        $overlay.css('display', 'flex');
    }

    function ocultarOverlayProcesando() {
        $('#' + OVERLAY_ID).hide();
    }

    $(document).on('submit', 'form:not([data-no-procesando])', function (e) {
        var $form = $(this);

        // Dejar que otros handlers (validación) puedan preventDefault primero.
        window.setTimeout(function () {
            if (e.isDefaultPrevented()) {
                return;
            }

            marcarProcesando($form);
        }, 0);
    });

    window.marcarFormularioProcesando = function (form) {
        marcarProcesando($(form));
    };

    window.marcarBotonProcesando = marcarBotonProcesando;
    window.restaurarBotonProcesando = restaurarBotonProcesando;
    window.mostrarOverlayProcesando = mostrarOverlayProcesando;
    window.ocultarOverlayProcesando = ocultarOverlayProcesando;
})(window, window.jQuery);
