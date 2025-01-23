<?php 
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: inicio_sesion.php');  // Redirigir al inicio de sesión si no está autenticado
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="css/uneti.css">
    <link rel="shortcut icon" href="images/uneti.png" type="image/x-icon">
</head>
<body>

    <!-- Barra lateral de navegación -->
    <aside class="sidebar">
        <ul class="menu-list">
            <li><a href="#" id="inicioLink"><i class="fas fa-house-user"></i> Inicio</a></li>
            <li><a href="#" id="generarLink"><i class="fas fa-file-upload"></i> Blog</a></li>
            <li><a href="#" id="historialLink"><i class="fas fa-history"></i> Carreras</a></li>
            <li><a href="cerrar_sesion.php" class="logout-button"><i class="fas fa-right-from-bracket"></i> Cerrar Sesión</a></li>
        </ul>
    </aside>
    
    <!-- Contenido principal -->
    <main class="content">
        <!-- Sección de Inicio -->
        <div id="inicio" class="section">
            <div class="inicio-header">
                <img src="images/uneti.png" alt="Logo UNETI" class="uneti-logo">
                <h1>Bienvenido</h1>
                <p class="usuario-info">Usuario: <?php echo $_SESSION['usuario']; ?></p>
            </div>
            <div class="inicio-welcome">
                <p>Utilice el menú lateral para acceder a las distintas funcionalidades de la plataforma.</p>
            </div>
        </div>
        
        <!-- Sección de Blog -->
        <div id="generar" class="section hidden">
            <h2>Generar Documento SENIAT</h2>
            <form method="POST" action="procesar_archivo.php" class="upload-form" target="_blank">
                <div class="form-group">
                    <label for="numeroIna">Número INA:</label>
                    <input type="text" id="numeroIna" name="numero_ina" placeholder="Ingrese el número INA" required>
                </div>
                <div class="form-group">
                    <label for="fechaRecepcion">Fecha de Recepción:</label>
                    <input type="date" id="fechaRecepcion" name="fecha_recepcion" required>
                </div>
                <div class="form-group">
                    <label for="dependencia">Dependencia:</label>
                    <input type="text" id="dependencia" name="dependencia" placeholder="Ingrese la dependencia" required>
                </div>
                <div class="form-actions">
                    <button type="submit" name="generar_pdf" class="btn btn-primary">Generar PDF</button>
                    <button type="submit" name="generar_excel" class="btn btn-secondary">Generar Excel</button>
                </div>
            </form>
        </div>

        <!-- Sección de Carreras -->
        <div id="historial" class="section hidden">
            <h2>Historial de Documentos</h2>
            <!-- Aquí puedes añadir contenido relacionado con el historial -->
        </div>
    </main>

    <script>
        // Función para cambiar entre secciones del menú
        document.addEventListener("DOMContentLoaded", function () {
            const sections = document.querySelectorAll('.section');
            const menuLinks = document.querySelectorAll('.menu-list li a');

            function hideAllSections() {
                sections.forEach(section => {
                    section.classList.add('hidden');
                });
            }

            function showSection(sectionId) {
                hideAllSections();
                const section = document.getElementById(sectionId);
                if (section) {
                    section.classList.remove('hidden');
                }
            }

            menuLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const targetId = event.target.id.replace('Link', '');
                    showSection(targetId);
                });
            });

            showSection('inicio'); // Mostrar la sección de inicio por defecto
        });
    </script>

</body>
</html>
