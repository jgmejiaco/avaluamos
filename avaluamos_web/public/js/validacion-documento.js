/**
 * Validación global de tipo + número de documento (Colombia).
 *
 * Pares: data-doc-tipo="clave" en el select y data-doc-numero="clave" en el input.
 * Opt-out: data-no-doc-validacion en el form o en el campo.
 */
(function (window, $) {
    'use strict';

    if (!$) {
        return;
    }

    var REGLAS = {
        1:  { nombre: 'Cédula Ciudadanía',        tipo: 'digitos', min: 5,  max: 10 },
        2:  { nombre: 'Cédula Extranjería',       tipo: 'digitos', min: 4,  max: 7 },
        3:  { nombre: 'Pasaporte',                tipo: 'alfanum', min: 5,  max: 16 },
        4:  { nombre: 'NIT',                      tipo: 'nit' },
        5:  { nombre: 'Tarjeta Identidad',        tipo: 'digitos', min: 5,  max: 11 },
        7:  { nombre: 'Diplomático',              tipo: 'alfanum', min: 5,  max: 11 },
        8:  { nombre: 'NIT Personas Naturales',   tipo: 'nit' },
        9:  { nombre: 'Registro Civil',           tipo: 'digitos', min: 5,  max: 11 },
        10: { nombre: 'Pasaporte ONU',            tipo: 'alfanum', min: 5,  max: 16 },
        11: { nombre: 'Permiso Especial Permanencia', tipo: 'digitos', min: 15, max: 15 },
        12: { nombre: 'Salvoconducto Permanencia', tipo: 'alfanum', min: 5,  max: 8 }
    };

    function reglaDe(idTipo) {
        return REGLAS[String(idTipo)] || null;
    }

    function digitoVerificacionNit(base) {
        var pesos = [3, 7, 13, 17, 19, 23, 29, 37, 41, 43, 47, 53, 59, 67, 71];
        var suma = 0;
        var i;
        var digitos = String(base).split('').reverse();

        for (i = 0; i < digitos.length; i++) {
            suma += parseInt(digitos[i], 10) * pesos[i];
        }

        var residuo = suma % 11;
        return residuo > 1 ? 11 - residuo : residuo;
    }

    function mensajeError(regla, valor) {
        if (regla.tipo === 'nit') {
            return 'El ' + regla.nombre + ' debe tener el formato 890905055-9 (sin puntos ni espacios).';
        }

        if (regla.tipo === 'digitos') {
            if (regla.min === regla.max) {
                return 'El ' + regla.nombre + ' debe tener exactamente ' + regla.max + ' dígitos.';
            }

            return 'El ' + regla.nombre + ' debe tener entre ' + regla.min + ' y ' + regla.max + ' dígitos (sin puntos ni espacios).';
        }

        return 'El ' + regla.nombre + ' debe ser alfanumérico, entre ' + regla.min + ' y ' + regla.max + ' caracteres (sin espacios).';
    }

    function validarNumero(idTipo, valor) {
        var regla = reglaDe(idTipo);
        var v = $.trim(valor || '');

        if (!regla) {
            return { ok: true, valor: v };
        }

        if (!v) {
            return { ok: true, valor: v, vacio: true };
        }

        if (regla.tipo === 'nit') {
            if (!/^\d{8,9}-\d$/.test(v)) {
                return { ok: false, valor: v, mensaje: mensajeError(regla, v) };
            }

            var partes = v.split('-');
            var base = partes[0];
            var dv = parseInt(partes[1], 10);

            if (digitoVerificacionNit(base) !== dv) {
                return {
                    ok: false,
                    valor: v,
                    mensaje: 'El dígito de verificación del ' + regla.nombre + ' no es válido.'
                };
            }

            return { ok: true, valor: v };
        }

        if (regla.tipo === 'digitos') {
            if (!/^\d+$/.test(v) || v.length < regla.min || v.length > regla.max) {
                return { ok: false, valor: v, mensaje: mensajeError(regla, v) };
            }

            return { ok: true, valor: v };
        }

        // alfanumérico: letras y números, sin espacios ni símbolos
        if (!/^[A-Za-z0-9]+$/.test(v) || v.length < regla.min || v.length > regla.max) {
            return { ok: false, valor: v, mensaje: mensajeError(regla, v) };
        }

        return { ok: true, valor: v.toUpperCase() };
    }

    function aplicarAtributosInput($numero, idTipo) {
        var regla = reglaDe(idTipo);

        $numero.removeAttr('maxlength inputmode pattern');

        if (!regla || $numero.prop('readonly') || $numero.prop('disabled')) {
            return;
        }

        if (regla.tipo === 'nit') {
            $numero.attr({ maxlength: 11, inputmode: 'numeric', pattern: '\\d{8,9}-\\d' });
            return;
        }

        if (regla.tipo === 'digitos') {
            $numero.attr({
                maxlength: regla.max,
                inputmode: 'numeric',
                pattern: '\\d{' + regla.min + ',' + regla.max + '}'
            });
            return;
        }

        $numero.attr({
            maxlength: regla.max,
            inputmode: 'text',
            pattern: '[A-Za-z0-9]{' + regla.min + ',' + regla.max + '}'
        });
    }

    function filtrarEntrada($numero, idTipo, valor) {
        var regla = reglaDe(idTipo);
        var v = String(valor || '');

        if (!regla) {
            return v;
        }

        if (regla.tipo === 'nit') {
            v = v.replace(/[^\d-]/g, '');
            var partes = v.split('-');
            var base = (partes[0] || '').replace(/\D/g, '').slice(0, 9);
            var dv = partes.length > 1
                ? partes.slice(1).join('').replace(/\D/g, '').slice(0, 1)
                : '';

            if (v.indexOf('-') >= 0 || dv) {
                if (base.length < 8) {
                    return base;
                }
                return base + '-' + dv;
            }

            return base;
        }

        if (regla.tipo === 'digitos') {
            return v.replace(/\D/g, '').slice(0, regla.max);
        }

        return v.replace(/[^A-Za-z0-9]/g, '').toUpperCase().slice(0, regla.max);
    }

    function $tipoPorClave(clave, $contexto) {
        var $scope = $contexto && $contexto.length ? $contexto : $(document);
        return $scope.find('[data-doc-tipo="' + clave + '"]').first();
    }

    function $numeroPorClave(clave, $contexto) {
        var $scope = $contexto && $contexto.length ? $contexto : $(document);
        return $scope.find('[data-doc-numero="' + clave + '"]').first();
    }

    function $feedbackDe($numero) {
        var id = $numero.attr('id');
        var $msg = $numero.siblings('.doc-numero-feedback');

        if (!$msg.length && id) {
            $msg = $numero.closest('.form-group, .mb-3, div').find('.doc-numero-feedback[data-for="' + id + '"]');
        }

        if (!$msg.length) {
            $msg = $(
                '<div class="doc-numero-feedback invalid-feedback d-none" role="alert"></div>'
            );
            if (id) {
                $msg.attr('data-for', id);
            }
            $numero.after($msg);
        }

        return $msg;
    }

    function limpiarError($numero) {
        if (!$numero || !$numero.length) {
            return;
        }

        $numero.removeClass('is-invalid');
        $feedbackDe($numero).addClass('d-none').text('');
    }

    function mostrarError(mensaje, $numero) {
        if (!$numero || !$numero.length) {
            return;
        }

        var $msg = $feedbackDe($numero);

        $numero.addClass('is-invalid');
        // Bootstrap solo muestra .invalid-feedback con display:block si el hermano tiene is-invalid;
        // forzamos visibilidad por si el markup no es hermano directo en todos los formularios.
        $msg.removeClass('d-none').css('display', 'block').text(mensaje);
    }

    function validarPar($tipo, $numero, opciones) {
        opciones = opciones || {};

        if (!$tipo.length || !$numero.length) {
            return true;
        }

        if ($numero.is('[data-no-doc-validacion]') || $tipo.is('[data-no-doc-validacion]')) {
            return true;
        }

        if ($numero.prop('readonly') || $numero.prop('disabled')) {
            return true;
        }

        var idTipo = $tipo.val();
        var valor = $numero.val();
        var requerido = $numero.prop('required') || $tipo.prop('required');

        if (!idTipo) {
            if (requerido && $.trim(valor || '') !== '') {
                if (opciones.mostrar) {
                    mostrarError('Seleccione el tipo de documento.', $numero);
                }
                return false;
            }
            limpiarError($numero);
            return true;
        }

        var resultado = validarNumero(idTipo, valor);

        if (resultado.vacio) {
            if (requerido && opciones.exigirRequerido) {
                if (opciones.mostrar) {
                    mostrarError('Ingrese el número de documento.', $numero);
                }
                return false;
            }
            limpiarError($numero);
            return true;
        }

        if (!resultado.ok) {
            if (opciones.mostrar) {
                mostrarError(resultado.mensaje, $numero);
            }
            return false;
        }

        if (resultado.valor !== valor) {
            $numero.val(resultado.valor);
        }

        limpiarError($numero);
        return true;
    }

    function validarFormulario($form) {
        var ok = true;
        var claves = {};

        $form.find('[data-doc-numero]').each(function () {
            var clave = $(this).attr('data-doc-numero');
            if (clave) {
                claves[clave] = true;
            }
        });

        Object.keys(claves).forEach(function (clave) {
            if (!ok) {
                return;
            }

            var $tipo = $tipoPorClave(clave, $form);
            var $numero = $numeroPorClave(clave, $form);

            if (!validarPar($tipo, $numero, { mostrar: true, exigirRequerido: false })) {
                ok = false;
            }
        });

        return ok;
    }

    function sincronizarPar(clave, $contexto) {
        var $tipo = $tipoPorClave(clave, $contexto);
        var $numero = $numeroPorClave(clave, $contexto);

        if ($tipo.length && $numero.length) {
            aplicarAtributosInput($numero, $tipo.val());
        }
    }

    $(document).on('change', '[data-doc-tipo]', function () {
        var clave = $(this).attr('data-doc-tipo');
        var $form = $(this).closest('form');
        var $numero = $numeroPorClave(clave, $form.length ? $form : null);

        aplicarAtributosInput($numero, $(this).val());
        limpiarError($numero);

        if ($numero.length && $.trim($numero.val() || '') !== '') {
            var filtrado = filtrarEntrada($numero, $(this).val(), $numero.val());
            $numero.val(filtrado);
            validarPar($(this), $numero, { mostrar: true });
        }
    });

    $(document).on('input', '[data-doc-numero]', function () {
        var $numero = $(this);
        var clave = $numero.attr('data-doc-numero');
        var $form = $numero.closest('form');
        var $tipo = $tipoPorClave(clave, $form.length ? $form : null);
        var idTipo = $tipo.val();
        var filtrado = filtrarEntrada($numero, idTipo, $numero.val());

        if (filtrado !== $numero.val()) {
            $numero.val(filtrado);
        }

        // Mientras escribe, ocultamos el aviso; se vuelve a evaluar al salir del campo.
        limpiarError($numero);
    });

    $(document).on('focusout', '[data-doc-numero]', function () {
        var $numero = $(this);
        var clave = $numero.attr('data-doc-numero');
        var $form = $numero.closest('form');
        var $tipo = $tipoPorClave(clave, $form.length ? $form : null);

        if (!$.trim($numero.val() || '')) {
            limpiarError($numero);
            return;
        }

        validarPar($tipo, $numero, { mostrar: true });
    });

    $(document).on('submit', 'form:not([data-no-doc-validacion])', function (e) {
        var $form = $(this);

        if (!$form.find('[data-doc-numero]').length) {
            return;
        }

        if (!validarFormulario($form)) {
            e.preventDefault();
            e.stopImmediatePropagation();
        }
    });

    $(function () {
        $('[data-doc-tipo]').each(function () {
            sincronizarPar($(this).attr('data-doc-tipo'), $(this).closest('form'));
        });
    });

    window.ValidacionDocumento = {
        validarNumero: validarNumero,
        validarFormulario: validarFormulario,
        reglas: REGLAS
    };
})(window, window.jQuery);
