/**
 * Validación global de correo electrónico.
 *
 * Marca inputs con data-validar-correo.
 * Opt-out: data-no-correo-validacion en el form o en el campo.
 * Omite readonly / disabled.
 */
(function (window, $) {
    'use strict';

    if (!$) {
        return;
    }

    // Práctica (no RFC completo): local@dominio.tld, sin espacios.
    var REGEX_CORREO = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/i;
    var MENSAJE = 'Ingrese un correo válido (ejemplo: nombre@dominio.com).';

    function validarCorreo(valor) {
        var v = $.trim(valor || '').toLowerCase();

        if (!v) {
            return { ok: true, valor: v, vacio: true };
        }

        if (!REGEX_CORREO.test(v)) {
            return { ok: false, valor: v, mensaje: MENSAJE };
        }

        return { ok: true, valor: v };
    }

    function $feedbackDe($input) {
        var id = $input.attr('id');
        var $msg = $input.siblings('.correo-feedback');

        if (!$msg.length && id) {
            $msg = $input.closest('.form-group, .mb-3, .mb-4, div').find('.correo-feedback[data-for="' + id + '"]');
        }

        if (!$msg.length) {
            $msg = $('<div class="correo-feedback invalid-feedback d-none" role="alert"></div>');
            if (id) {
                $msg.attr('data-for', id);
            }
            $input.after($msg);
        }

        return $msg;
    }

    function limpiarError($input) {
        if (!$input || !$input.length) {
            return;
        }

        $input.removeClass('is-invalid');
        $feedbackDe($input).addClass('d-none').css('display', '').text('');
    }

    function mostrarError(mensaje, $input) {
        if (!$input || !$input.length) {
            return;
        }

        $input.addClass('is-invalid');
        $feedbackDe($input).removeClass('d-none').css('display', 'block').text(mensaje);
    }

    function validarCampo($input, opciones) {
        opciones = opciones || {};

        if (!$input.length) {
            return true;
        }

        if ($input.is('[data-no-correo-validacion]')) {
            return true;
        }

        if ($input.prop('readonly') || $input.prop('disabled')) {
            return true;
        }

        var resultado = validarCorreo($input.val());

        if (resultado.vacio) {
            if ($input.prop('required') && opciones.exigirRequerido) {
                if (opciones.mostrar) {
                    mostrarError('Ingrese el correo electrónico.', $input);
                }
                return false;
            }
            limpiarError($input);
            return true;
        }

        if (!resultado.ok) {
            if (opciones.mostrar) {
                mostrarError(resultado.mensaje, $input);
            }
            return false;
        }

        if (resultado.valor !== $input.val()) {
            $input.val(resultado.valor);
        }

        limpiarError($input);
        return true;
    }

    function validarFormulario($form) {
        var ok = true;

        $form.find('[data-validar-correo]').each(function () {
            if (!ok) {
                return;
            }

            if (!validarCampo($(this), { mostrar: true, exigirRequerido: false })) {
                ok = false;
            }
        });

        return ok;
    }

    $(document).on('input', '[data-validar-correo]', function () {
        limpiarError($(this));
    });

    $(document).on('focusout', '[data-validar-correo]', function () {
        var $input = $(this);

        if (!$.trim($input.val() || '')) {
            limpiarError($input);
            return;
        }

        validarCampo($input, { mostrar: true });
    });

    $(document).on('submit', 'form:not([data-no-correo-validacion])', function (e) {
        var $form = $(this);

        if (!$form.find('[data-validar-correo]').length) {
            return;
        }

        if (!validarFormulario($form)) {
            e.preventDefault();
            e.stopImmediatePropagation();
        }
    });

    window.ValidacionCorreo = {
        validarCorreo: validarCorreo,
        validarFormulario: validarFormulario
    };
})(window, window.jQuery);
