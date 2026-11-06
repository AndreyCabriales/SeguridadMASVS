# 🚕 GoTaxi - Auditoría y Mitigación de Seguridad OWASP MASVS

Proyecto de servicio de taxis web auditado y corregido bajo el marco de pruebas de seguridad **OWASP MASVS (Mobile Application Security Verification Standard)** para la materia de Seguridad en Aplicaciones de la **Universidad Tecnológica de Gutiérrez Zamora (UTGZ)**.

---

## 📋 Resumen de la Auditoría

Se identificaron y mitigaron vulnerabilidades críticas en el ciclo de vida de desarrollo de software (SDLC) cubriendo las 8 dimensiones del estándar MASVS:

1. **STORAGE:** Eliminación de contraseñas expuestas en vistas, tablas y DOM.
2. **CRYPTO:** Migración de hashing obsoleto `MD5` a `BCRYPT` mediante `password_hash()` y `password_verify()`.
3. **AUTH:** Implementación de control de sesiones obligatorio (`auth_check.php`) para evitar navegación forzada y destrucción segura de cookies en logout.
4. **NETWORK:** Configuración de directivas de transporte seguro, cookies con banderas `HttpOnly` y `SameSite=Lax`, e inserción de cabeceras de seguridad (`X-Frame-Options`, `X-Content-Type-Options`).
5. **PLATFORM:** Protección contra peticiones forzadas de eliminación directa (CSRF/IDOR) implementando validación de tokens de un solo uso (`csrf_helper.php`).
6. **CODE:** Erradicación total de Inyección SQL (SQLi) mediante **Consultas Preparadas (Prepared Statements)** y prevención de XSS con `htmlspecialchars()`.
7. **RESILIENCE:** Ocultamiento de trazas y nombres internos de MySQL (`display_errors = 0`) y redirección de fallos a logs internos seguros.
8. **PRIVACY:** Inclusión de consentimiento explícito de Aviso de Privacidad en formularios de registro y enmascaramiento de datos personales (teléfonos móviles).

---

## 📊 Matriz de Checklist MASVS (Plantilla Oficial)

| Área MASVS | Qué revisar | Estado | Evidencia / Hallazgo y Corrección |
|:---|:---|:---:|:---|
| **STORAGE** | Tokens, logs, caché, respaldos y datos locales. | **C** | **SEC-01 (Solucionado):** Se eliminó la exposición de contraseñas en texto plano y hashes de `usuarios_tabla.php`, `drivers_tabla.php`, `usuarios_ver.php` y `drivers_ver.php`. |
| **CRYPTO** | Algoritmos, claves, aleatoriedad y gestión de secretos. | **C** | **SEC-02 (Solucionado):** Se sustituyó `md5()` por `password_hash()` con BCRYPT en altas de usuarios y conductores, implementando verificación segura con `password_verify()` en el login. |
| **AUTH** | Credenciales, sesión, autorización y cierre de sesión. | **C** | **SEC-03 (Solucionado):** Se creó el middleware `auth_check.php` bloqueando el acceso a no autenticados en todas las tablas y paneles administrativos; logout destruye sesión y cookie. |
| **NETWORK** | HTTPS/TLS, certificados y bloqueo de tráfico claro. | **C** | **SEC-04 (Solucionado):** Configuración de cookies de sesión con `HttpOnly`, `SameSite=Lax` y cabeceras de protección web (`X-Content-Type-Options`, `X-Frame-Options`) en `security_headers.php` y `.htaccess`. |
| **PLATFORM** | Permisos, componentes, enlaces profundos y WebViews. | **C** | **SEC-05 (Solucionado):** Se blindó la eliminación de registros en `usuarios_eliminar.php`, `drivers_eliminar.php` y `taxis_eliminar.php` con validación estricta de tokens CSRF generados por sesión. |
| **CODE** | Validación, errores, dependencias y modo depuración. | **C** | **SEC-06 (Solucionado):** Se migraron todas las consultas dinámicas a **Prepared Statements** con `mysqli_prepare()` y `bind_param()` eliminando SQL Injection y aplicando sanitización XSS. |
| **RESILIENCE** | Manipulación, ingeniería inversa y controles de entorno. | **C** | **SEC-07 (Solucionado):** Se deshabilitó `display_errors`, silenciando errores de base de datos al usuario final y registrándolos en logs seguros del servidor. |
| **PRIVACY** | Minimización, consentimiento, rastreadores y retención. | **C** | **SEC-08 (Solucionado):** Se añadió casilla obligatoria de consentimiento de Aviso de Privacidad en `PaginaWebRegistrarse.html` y helper de enmascaramiento de teléfonos (`privacy_helper.php`). |

*Nomenclatura: C = Cumple | NC = No cumple | N/A = No aplica*

---

## 🌳 Estructura de Ramas en Git

* **`main`:** Contiene el proyecto en su estado original (línea base con vulnerabilidades registradas para evidencia).
* **`auditoria-masvs`:** Rama de trabajo donde se aplicaron y confirmaron cada una de las 8 correcciones con commits independientes.

### Historial de Commits Trazables
```text
* fix(privacy): corregido error de privacy - anadido aviso de privacidad y enmascaramiento de datos personales
* fix(resilience): corregido error de resilience - ocultos errores tecnicos de mysql y gestion segura de excepciones
* fix(code): corregido error de code - erradicada inyeccion SQL con prepared statements y sanitizacion XSS
* fix(platform): corregido error de platform - eliminacion segura mediante validacion de token CSRF
* fix(network): corregido error de network - configuradas cookies seguras con HttpOnly y cabeceras de proteccion HTTP
* fix(auth): corregido error de auth - implementado control de sesion obligatorio y proteccion de rutas
* fix(crypto): corregido error de crypto - implementado hashing seguro con bcrypt y password_verify
* fix(storage): corregido error de storage - eliminada exposicion de contrasenas en tablas y vistas
* feat: proyecto inicial GoTaxi con vulnerabilidades MASVS registradas
```

---

## 🚀 Despliegue Local con XAMPP

1. Iniciar **Apache** y **MySQL** desde el Panel de Control de XAMPP.
2. Importar la base de datos `gotaxi.sql` en phpMyAdmin:
   * Acceder a `http://localhost/phpmyadmin`
   * Crear la base de datos `gotaxi`
   * Importar el archivo `gotaxi.sql` incluido en este repositorio.
3. Abrir en el navegador:
   * Página Principal: `http://localhost/U2Act2_AndreyCabriales/U2Act2_AndreyCabriales/GoTaxi_Nuevo/PAGINAS/PaginaWeb.html`
   * Iniciar Sesión: `http://localhost/U2Act2_AndreyCabriales/U2Act2_AndreyCabriales/GoTaxi_Nuevo/PAGINAS/PaginaWebIniciarSesion.html`

---

## 📤 Subir este repositorio a GitHub

Para subir el proyecto a tu cuenta de GitHub, ejecuta en una terminal:

```bash
cd "C:\xampp\htdocs\U2Act2_AndreyCabriales\U2Act2_AndreyCabriales\GoTaxi_Nuevo"

# 1. Crear el repositorio en https://github.com/new (ejemplo: GoTaxi-MASVS)
# 2. Conectar tu repositorio remoto:
git remote add origin https://github.com/TU_USUARIO/TU_REPOSITORIO.git

# 3. Subir la rama principal y la rama de auditoría:
git push -u origin main
git push -u origin auditoria-masvs
```
