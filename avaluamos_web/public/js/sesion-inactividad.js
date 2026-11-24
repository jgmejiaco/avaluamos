/**
 * Cierre de sesión por inactividad + renovación JWT mientras hay interacción.
 *
 * opts:
 *  - idleMinutes: minutos sin actividad para cerrar
 *  - jwtExp: unix timestamp de expiración del JWT actual
 *  - keepaliveUrl: POST para renovar token
 *  - logoutUrl: redirección al cerrar
 *  - refreshSkewSeconds: renovar si faltan menos de N segundos
 */
window.initSesionInactividad = function (opts) {
    var idleMs = Math.max(1, Number(opts.idleMinutes) || 120) * 60 * 1000;
    var jwtExp = Number(opts.jwtExp) || 0;
    var skew = Number(opts.refreshSkewSeconds) || 300;
    var idleTimer = null;
    var keepaliveEnCurso = false;
    var ultimoKeepalive = 0;
    var cerrando = false;

    function csrfHeaders() {
        var token = document.querySelector('meta[name="csrf-token"]');
        return token ? { 'X-CSRF-TOKEN': token.getAttribute('content') } : {};
    }

    function cerrarPorInactividad() {
        if (cerrando) {
            return;
        }
        cerrando = true;

        if (typeof Swal === 'undefined') {
            window.location.href = opts.logoutUrl;
            return;
        }

        Swal.fire({
            icon: 'warning',
            title: 'La sesión se cierra',
            text: 'Se cerró la sesión por inactividad.',
            confirmButtonText: 'Aceptar',
            allowOutsideClick: false
        }).then(function () {
            window.location.href = opts.logoutUrl;
        });
    }

    function renovarSiCorresponde() {
        var ahora = Math.floor(Date.now() / 1000);
        var hacePoco = Date.now() - ultimoKeepalive < 30000;

        if (keepaliveEnCurso || hacePoco || !opts.keepaliveUrl || !jwtExp) {
            return;
        }

        if (jwtExp - ahora > skew) {
            return;
        }

        keepaliveEnCurso = true;
        ultimoKeepalive = Date.now();

        fetch(opts.keepaliveUrl, {
            method: 'POST',
            headers: Object.assign({
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }, csrfHeaders()),
            credentials: 'same-origin'
        })
            .then(function (res) {
                if (!res.ok) {
                    throw new Error('keepalive failed');
                }
                return res.json();
            })
            .then(function (data) {
                if (data && data.exp) {
                    jwtExp = Number(data.exp);
                }
            })
            .catch(function () {
                // Si no se pudo renovar y el JWT ya venció, el próximo request lo cerrará.
            })
            .finally(function () {
                keepaliveEnCurso = false;
            });
    }

    function registrarActividad() {
        if (cerrando) {
            return;
        }

        clearTimeout(idleTimer);
        idleTimer = setTimeout(cerrarPorInactividad, idleMs);
        renovarSiCorresponde();
    }

    ['click', 'keydown', 'scroll', 'mousemove', 'touchstart', 'mousedown'].forEach(function (evt) {
        document.addEventListener(evt, registrarActividad, { passive: true, capture: true });
    });

    if (window.jQuery) {
        jQuery(document).on('ajaxSend', registrarActividad);
    }

    registrarActividad();
};
