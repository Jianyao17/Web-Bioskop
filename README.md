# Laravel Project Setup

Panduan untuk setup proyek Laravel Web-Bioskop yang menggunakan Livewire, Tailwind CSS, dan Flowbite.

## Prasyarat

Pastikan Anda telah menginstal:
- [Composer](https://getcomposer.org/download/)
- [Node.js](https://nodejs.org/en/download/)

## Langkah-langkah Instalasi

### 1. Clone Repository

Clone repository proyek ini ke komputer Anda:

```sh
git clone https://github.com/username/repo-name.git
cd repo-name
```

### 2. Instal Dependensi PHP
Instal dependensi PHP menggunakan Composer:
```
composer install
```

### 3. Konfigurasi File Environment
Salin file .env.example menjadi .env dan generate key:
```
cp .env.example .env
php artisan key:generate
```

### 4. Instal Dependensi Node.js
Instal dependensi Node.js menggunakan npm atau yarn:
```
npm install
# atau
yarn install
```

### 5. Instal Tailwind CSS dan Flowbite
Instal Tailwind CSS dan Flowbite:
```
npm install tailwindcss flowbite
```

### 6. Build Asset
Build asset menggunakan Laravel Mix:
```
npm run dev
# atau untuk production
npm run prod
```

### 7. Buat Storage Link
Buat symbolic link untuk direktori storage:
```
php artisan storage:link
```

### 8. Migrasi Database
Jalankan migrasi database untuk membuat tabel:
```
php artisan migrate
```

### 9. Build CSS
Jalankan perintah berikut ketika memodifikasi tampilan blade view:
```
npm run build-css
```