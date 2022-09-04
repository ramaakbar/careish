# Careish

Careish adalah aplikasi penyedia jasa perawat lansia berbasis website. **WIP**

## Tech Stack

-   Laravel
-   TailwindCSS with Flowbite
-   Livewire
-   AlpineJS
-   MySQL

## Requirement

The following tools are required in order to start the installation.

-   PHP >=8.0
-   Composer
-   Node package manager (NPM, Yarn)
-   MySql Database

## Development Setup

1. Clone the project

```bash
  git clone https://github.com/ramaakbar/careish.git
```

2. Go to the project directory

```bash
  cd careish
```

3. Install dependencies (composer and nodejs)

```bash
  composer install && npm install
```

4. Setup a local database called `careish`
5. Copy the `.env.example` file to `.env`

```bash
  cp .env.example .env
```

6. Generate a new app key with

```bash
  php artisan key:generate
```

7. Prepare database with migration and seeder

```bash
  php artisan migrate --seed
```

8. Start laravel server and run node

```bash
  php artisan serve
```

```bash
  npm run dev
```

Project will be running on http://127.0.0.1:8000. You can login in as admin with test@example.com & password.

## Contributing

1. Make new branch (contoh nama branchnya `dev`)

```bash
  git branch -b dev
```

2. Melakukan perubahan di branch `dev`

3. Push branch ke origin

```bash
git push origin dev
```

4. Go to Careish Github repo, and open pull request
