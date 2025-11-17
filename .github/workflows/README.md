# GitHub Actions Workflows

This directory contains the CI/CD workflows for the Laravel project.

## Laravel CI Workflow

The `laravel.yml` workflow runs on every push and pull request to the `main` and `dev` branches.

### Jobs

#### 1. Laravel Tests
- **Matrix Strategy**: Tests on PHP 8.2 and 8.3
- **Steps**:
  - Checks out the code
  - Sets up PHP with required extensions
  - Sets up Node.js 20
  - Caches Composer dependencies for faster builds
  - Installs PHP and NPM dependencies
  - Builds frontend assets with Vite
  - Generates application key
  - Runs database migrations
  - Executes PHPUnit tests in parallel

#### 2. Code Quality Checks
- Runs Laravel Pint to ensure code follows PSR-12 coding standards
- Fails if code doesn't meet style requirements

#### 3. Security Checks
- Runs `composer audit` to check for known security vulnerabilities in dependencies
- Alerts if any vulnerable packages are detected

### Configuration

The workflow uses:
- **Database**: SQLite in-memory for fast testing
- **Cache**: Array driver for faster tests
- **Queue**: Sync for immediate job processing
- **Mail**: Array driver to prevent actual emails

### Local Testing

To run the same checks locally:

```bash
# Run tests
php artisan test --parallel

# Check code style
vendor/bin/pint --test

# Fix code style
vendor/bin/pint

# Check security
composer audit
```

### Troubleshooting

If the workflow fails:

1. **PHP Version**: Ensure your local PHP version matches (8.2 or 8.3)
2. **Dependencies**: Run `composer install` and `npm install`
3. **Assets**: Ensure `npm run build` completes successfully
4. **Tests**: Run tests locally with `php artisan test`
5. **Code Style**: Run `vendor/bin/pint` to auto-fix style issues
