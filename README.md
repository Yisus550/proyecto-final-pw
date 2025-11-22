# Sistema de Punto de Venta (POS) - Laravel

## 📋 Presentación del Proyecto

Sistema de Punto de Venta (Point of Sale) desarrollado con Laravel 11, diseñado para gestionar las operaciones comerciales de un negocio minorista. El sistema permite administrar productos, inventario, empleados, clientes, órdenes y sus detalles asociados.

### Características Principales

- **Gestión de Categorías**: Organización de productos por categorías
- **Administración de Productos**: Control completo del catálogo de productos
- **Control de Inventario**: Seguimiento en tiempo real del stock disponible
- **Gestión de Empleados**: Registro y administración del personal
- **Gestión de Clientes**: Base de datos de clientes con historial
- **Sistema de Órdenes**: Procesamiento y seguimiento de ventas
- **Detalles de Órdenes**: Registro detallado de cada transacción

### Tecnologías Utilizadas

- **Framework**: Laravel 11.x
- **PHP**: 8.2 o superior
- **Base de Datos**: MySQL/MariaDB
- **Frontend**: Blade Templates
- **Herramientas de Desarrollo**: Laravel Pint, PHPUnit

---

## 🚀 Instalación y Configuración

### Requisitos Previos

- PHP >= 8.2
- Composer
- MySQL/MariaDB
- Node.js y NPM (opcional, para assets)

### Pasos de Instalación

1. **Clonar el repositorio**
```bash
git clone <repository-url>
cd proyecto-final-pw
```

2. **Instalar dependencias de PHP**
```bash
composer install
```

3. **Configurar el archivo de entorno**
```bash
cp .env.example .env
```

4. **Editar el archivo `.env` con tus credenciales de base de datos**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pos_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. **Generar la clave de aplicación**
```bash
php artisan key:generate
```

6. **Crear la base de datos**
```bash
# Acceder a MySQL
mysql -u root -p

# Crear la base de datos
CREATE DATABASE pos_database CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

7. **Ejecutar migraciones con seeders (primera vez)**
```bash
php artisan migrate:fresh --seed
```

Este comando creará todas las tablas necesarias y poblará la base de datos con datos de prueba.

8. **Iniciar el servidor de desarrollo**
```bash
php artisan serve
```

El sistema estará disponible en `http://localhost:8000`

---

## 📊 Estructura de la Base de Datos

### Tablas Principales

- **categories**: Categorías de productos
- **products**: Catálogo de productos
- **inventories**: Control de stock
- **employees**: Personal de la empresa
- **customers**: Base de datos de clientes
- **orders**: Órdenes de venta
- **order_details**: Detalles de cada orden

### Relaciones

```
categories (1) → (N) products
products (1) → (1) inventories
products (1) → (N) order_details
employees (1) → (N) orders
customers (1) → (N) orders
orders (1) → (N) order_details
```

---

## 🎨 Estándares de Código Laravel

### Laravel Pint - Code Style

Este proyecto utiliza Laravel Pint para mantener un estilo de código consistente.

**Ejecutar Pint para formatear el código:**
```bash
# Verificar el estilo del código
./vendor/bin/pint --test

# Formatear automáticamente el código
./vendor/bin/pint

# Formatear archivos específicos
./vendor/bin/pint app/Models
./vendor/bin/pint app/Http/Controllers
```

**Configuración de Pint:**
El archivo `pint.json` en la raíz del proyecto define las reglas de estilo.

### Convenciones de Nombres

#### Controladores
```php
// Singular, PascalCase, sufijo "Controller"
ProductController.php
CategoryController.php
OrderController.php
```

#### Modelos
```php
// Singular, PascalCase
Product.php
Category.php
Order.php
OrderDetail.php
```

#### Migraciones
```php
// Snake_case con timestamp
2024_11_22_000000_create_products_table.php
2024_11_22_000001_create_categories_table.php
```

#### Tablas de Base de Datos
```php
// Plural, snake_case
products
categories
order_details
```

#### Métodos de Controlador
```php
// CamelCase, verbos descriptivos
public function index()
public function store()
public function update()
public function destroy()
```

#### Variables
```php
// CamelCase
$productName
$totalAmount
$customerEmail
```

#### Rutas
```php
// Kebab-case, plural para recursos
Route::resource('products', ProductController::class);
Route::get('order-details', [OrderDetailController::class, 'index']);
```

### Ejemplos de Buenas Prácticas

**Modelo:**
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'unit_price',
        'is_active',
    ];

    protected $casts = [
        'unit_price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
```

**Controlador:**
```php
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(15);
        
        return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'unit_price' => 'required|numeric|min:0',
        ]);

        $product = Product::create($validated);

        return redirect()
            ->route('products.show', $product)
            ->with('success', 'Producto creado exitosamente.');
    }
}
```

**Migración:**
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->decimal('unit_price', 10, 2);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
```

---

## 🧪 Testing

### Ejecutar Tests

```bash
# Ejecutar todos los tests
php artisan test

# Ejecutar tests con cobertura
php artisan test --coverage

# Ejecutar tests específicos
php artisan test --filter ProductTest
```

### Crear Tests

```bash
# Test de Feature
php artisan make:test ProductTest

# Test Unitario
php artisan make:test ProductTest --unit
```

---

## 📝 Comandos Útiles

### Artisan Commands

```bash
# Limpiar cachés
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Listar rutas
php artisan route:list

# Crear modelo con migración, factory y seeder
php artisan make:model Product -mfs

# Crear controlador de recursos
php artisan make:controller ProductController --resource

# Ejecutar seeders específicos
php artisan db:seed --class=ProductSeeder

# Refrescar base de datos con seeders
php artisan migrate:fresh --seed

# Crear enlace simbólico para storage
php artisan storage:link
```

### Composer Commands

```bash
# Actualizar dependencias
composer update

# Actualizar autoload
composer dump-autoload

# Instalar en producción (sin dev dependencies)
composer install --no-dev --optimize-autoloader
```

---

## 🔒 Seguridad

### Consideraciones de Seguridad

1. **Nunca subir el archivo `.env` al repositorio**
2. **Usar variables de entorno para credenciales sensibles**
3. **Mantener Laravel y dependencias actualizadas**
4. **Validar siempre los datos de entrada**
5. **Usar protección CSRF en formularios**
6. **Implementar autenticación y autorización apropiadas**

### Ejemplo de Validación Segura

```php
$validated = $request->validate([
    'email' => 'required|email|unique:customers',
    'phone_number' => 'required|regex:/^[0-9]{10}$/',
    'unit_price' => 'required|numeric|min:0|max:999999.99',
]);
```

---

## 🚀 Despliegue en Producción

### Checklist de Producción

```bash
# 1. Optimizar configuración
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 2. Optimizar autoload
composer install --optimize-autoloader --no-dev

# 3. Configurar permisos
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# 4. Configurar variables de entorno
APP_ENV=production
APP_DEBUG=false
```

### Variables de Entorno Importantes

```env
APP_NAME="POS System"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=your-host
DB_PORT=3306
DB_DATABASE=your-database
DB_USERNAME=your-username
DB_PASSWORD=your-strong-password

CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis
```

---

## 📚 Recursos Adicionales

- [Documentación de Laravel](https://laravel.com/docs)
- [Laravel Pint](https://laravel.com/docs/pint)
- [Laracasts](https://laracasts.com)
- [Laravel News](https://laravel-news.com)

---

## 👥 Contribución

Para contribuir al proyecto:

1. Fork el repositorio
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Ejecuta `./vendor/bin/pint` antes de hacer commit
4. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
5. Push a la rama (`git push origin feature/AmazingFeature`)
6. Abre un Pull Request

---

## 📄 Licencia

Este proyecto está bajo la licencia MIT.

---

## 📞 Soporte

Para reportar bugs o solicitar features, por favor abre un issue en el repositorio.

---

**Desarrollado con ❤️ usando Laravel**