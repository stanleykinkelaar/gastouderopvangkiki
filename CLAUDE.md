# Claude Code Configuration for Gastouderopvangkiki

This Laravel project has been set up with Laravel Boost for enhanced AI development assistance.

## Laravel Boost Configuration

Laravel Boost has been installed and configured to work with Claude Code and other AI assistants.

### Installed Packages
- `laravel/boost` - AI development tools for Laravel
- `laravel/mcp` - Model Context Protocol integration
- `laravel/roster` - Team and developer management

### Configuration Files
- `config/boost.php` - Main Boost configuration
- Environment variables in `.env`:
  - `BOOST_ENABLED=true` - Enables Laravel Boost functionality
  - `BOOST_BROWSER_LOGS_WATCHER=true` - Enables browser console log monitoring

### Development Commands
- `composer dev` - Start development server with concurrent processes (server, queue, vite)
- `php artisan serve` - Start Laravel development server
- `npm run dev` - Start Vite development server
- `php artisan queue:listen` - Start queue worker

### Testing
- `vendor/bin/pest` - Run PHP tests using Pest
- `php artisan test` - Alternative test runner

### Code Quality
- `vendor/bin/pint` - Laravel Pint code formatter
- Check `composer.json` for available scripts

## Project Structure
This is a Laravel Livewire starter kit with:
- Livewire components for reactive UI
- Volt for simplified component syntax
- Flux UI components
- SQLite database (development)
- Authentication system included

## Notes for Claude Code/Junie
- The project uses PHP 8.3+ 
- Laravel Framework 12.0+
- Livewire for frontend reactivity
- SQLite for local development database
- Pest for testing framework