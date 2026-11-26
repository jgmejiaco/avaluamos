/**
 * Validación global de celular con intl-tel-input.
 *
 * Marca inputs con data-validar-celular.
 * País por defecto: Colombia (+57); el usuario puede cambiarlo.
 * Se envía al servidor (input oculto con el mismo name) en formato
 * internacional E.164 (ejemplo: +573001234567).
 *
 * Opt-out: data-no-celular-validacion en el form o en el campo.
 * Omite readonly / disabled.
 *
 * API para AJAX / asignación por JS:
 *   ValidacionCelular.obtenerNumero(sel)   -> '+573001234567' | '' (vacío) | null (inválido)
 *   ValidacionCelular.asignarNumero(sel, valor)
 *   ValidacionCelular.validarCampo(sel)    -> true / false (muestra mensaje)
 */
(function (window, $) {
    'use strict';

    if (!$ || typeof window.intlTelInput !== 'function') {
        return;
    }

    var SELECTOR = '[data-validar-celular]';
    var PAIS_DEFECTO = 'co';

    var TRADUCCIONES = {
        selectedCountryAriaLabel: 'Cambiar país para el número de teléfono, seleccionado ${countryName} (${dialCode})',
        noCountrySelected: 'Selecciona el país para el número de teléfono',
        countryListAriaLabel: 'Lista de países',
        searchPlaceholder: 'Buscar país',
        clearSearchAriaLabel: 'Borrar búsqueda',
        closeCountrySelectorAriaLabel: 'Cerrar',
        searchEmptyState: 'No se han encontrado resultados',
        searchSummaryAria: function (count) {
            if (count === 0) {
                return 'No se han encontrado resultados';
            }
            if (count === 1) {
                return '1 resultado encontrado';
            }
            return count + ' resultados encontrados';
        }
    };

    var MENSAJES = {
        INVALID_COUNTRY_CODE: 'El indicativo de país no es válido.',
        TOO_SHORT: 'El número es demasiado corto para el país seleccionado.',
        TOO_LONG: 'El número es demasiado largo para el país seleccionado.',
        defecto: 'Ingrese un celular válido para el país seleccionado.'
    };

    function $de(sel) {
        return sel && sel.jquery ? sel : $(sel);
    }

    function instancia($input) {
        return $input.length ? window.intlTelInput.getInstance($input[0]) : null;
    }

    function inicializar(el) {
        if (!el || window.intlTelInput.getInstance(el)) {
            return;
        }

        var $el = $(el);

        window.intlTelInput(el, {
            initialCountry: PAIS_DEFECTO,
            countryOrder: ['co', 'us', 'es', 'mx', 'ec', 've', 'pe', 'pa'],
            countryNameLocale: 'es',
            uiTranslations: TRADUCCIONES,
            countrySearch: true,
            separateDialCode: true,
            strictMode: true,
            formatAsYouType: true,
            allowedNumberTypes: ['MOBILE', 'FIXED_LINE_OR_MOBILE'],
            containerClass: 'iti-bloque'
        });

        // El tipo "tel" activa el teclado numérico en móviles.
        if ($el.attr('type') === 'text') {
            $el.attr('type', 'tel');
        }

        // El valor que viaja al servidor va en un input oculto con el mismo
        // name, en formato E.164; el visible queda solo para mostrar/editar.
        var nombre = $el.attr('name');
        if (nombre) {
            var $oculto = $('<input type="hidden" class="celular-e164">').attr('name', nombre);
            $el.removeAttr('name').attr('data-celular-name', nombre);
            $el.closest('.iti').after($oculto);
            $el.data('celularOculto', $oculto);
            sincronizarOculto($el);
        }
    }

    function sincronizarOculto($input) {
        var $oculto = $input.data('celularOculto');
        if (!$oculto) {
            return;
        }
        var numero = obtenerNumero($input);
        // Si es inválido se envía lo digitado (el submit ya lo habrá bloqueado).
        $oculto.val(numero === null ? $.trim($input.val() || '') : numero);
    }

    function inicializarEn(contexto) {
        $(contexto || document).find(SELECTOR).each(function () {
            inicializar(this);
        });
    }

    function $feedbackDe($input) {
        var id = $input.attr('id');
        var $contenedor = $input.closest('.iti');
        var $ancla = $contenedor.length ? $contenedor : $input;
        var $msg = $ancla.next('.celular-feedback');

        if (!$msg.length) {
            $msg = $('<div class="celular-feedback invalid-feedback d-none" role="alert"></div>');
            if (id) {
                $msg.attr('data-for', id);
            }
            $ancla.after($msg);
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

    function omitido($input) {
        return $input.is('[data-no-celular-validacion]')
            || $input.closest('form').is('[data-no-celular-validacion]')
            || $input.prop('readonly')
            || $input.prop('disabled');
    }

    /**
     * Valida el campo. Devuelve true si es válido o está vacío (y no se exige).
     */
    function validarCampo(sel, opciones) {
        var $input = $de(sel);
        opciones = $.extend({ mostrar: true, exigirRequerido: false }, opciones || {});

        if (!$input.length || omitido($input)) {
            return true;
        }

        var iti = instancia($input);

        if (!iti) {
            return true;
        }

        if (!$.trim($input.val() || '')) {
            if ($input.prop('required') && opciones.exigirRequerido) {
                if (opciones.mostrar) {
                    mostrarError('Ingrese el número de celular.', $input);
                }
                return false;
            }
            limpiarError($input);
            return true;
        }

        if (!iti.isValidNumber()) {
            if (opciones.mostrar) {
                var codigo = iti.getValidationError();
                mostrarError(MENSAJES[codigo] || MENSAJES.defecto, $input);
            }
            return false;
        }

        limpiarError($input);
        return true;
    }

    /**
     * Número en formato E.164. '' si está vacío, null si es inválido.
     */
    function obtenerNumero(sel) {
        var $input = $de(sel);
        var iti = instancia($input);

        if (!$.trim($input.val() || '')) {
            return '';
        }

        if (!iti) {
            return $.trim($input.val());
        }

        return iti.isValidNumber() ? iti.getNumber() : null;
    }

    /**
     * Asigna un número (E.164 o nacional colombiano) actualizando bandera y formato.
     */
    function asignarNumero(sel, valor) {
        var $input = $de(sel);
        var iti = instancia($input);
        valor = $.trim(valor || '');

        limpiarError($input);

        if (!iti) {
            $input.val(valor);
            return;
        }

        if (valor.charAt(0) !== '+') {
            iti.setSelectedCountry(PAIS_DEFECTO);
        }

        iti.setNumber(valor);
        sincronizarOculto($input);
    }

    function validarFormulario($form) {
        var ok = true;
        var $primero = null;

        $form.find(SELECTOR).each(function () {
            if (!validarCampo($(this), { mostrar: true })) {
                ok = false;
                $primero = $primero || $(this);
            }
        });

        if ($primero) {
            $primero.trigger('focus');
        }

        return ok;
    }

    function normalizarFormulario($form) {
        $form.find(SELECTOR).each(function () {
            sincronizarOculto($(this));
        });
    }

    $(document).on('input', SELECTOR, function () {
        limpiarError($(this));
        sincronizarOculto($(this));
    });

    $(document).on('countrychange', SELECTOR, function () {
        var $input = $(this);
        sincronizarOculto($input);
        if ($.trim($input.val() || '')) {
            validarCampo($input, { mostrar: true });
        }
    });

    $(document).on('focusout', SELECTOR, function () {
        var $input = $(this);

        if (!$.trim($input.val() || '')) {
            limpiarError($input);
            return;
        }

        validarCampo($input, { mostrar: true });
    });

    $(document).on('submit', 'form:not([data-no-celular-validacion])', function (e) {
        var $form = $(this);

        if (!$form.find(SELECTOR).length) {
            return;
        }

        if (!validarFormulario($form)) {
            e.preventDefault();
            e.stopImmediatePropagation();
            return;
        }

        normalizarFormulario($form);
    });

    // Modales que se muestran después (o se inyectan por AJAX).
    $(document).on('show.bs.modal', function (e) {
        inicializarEn(e.target);
    });

    $(function () {
        inicializarEn(document);
    });

    window.ValidacionCelular = {
        inicializarEn: inicializarEn,
        validarCampo: validarCampo,
        validarFormulario: validarFormulario,
        obtenerNumero: obtenerNumero,
        asignarNumero: asignarNumero
    };
})(window, window.jQuery);
