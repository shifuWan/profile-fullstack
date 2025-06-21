# Profile Simple
## Installation

Clone the repository

```
git clone https://github.com/shifuWan/profile-fullstack.git
```

Switch to the repo folder

```
cd profile-fullstack
```

switch to frontend folder (nuxt app)

```
cd frontend

cp .env.example .env
```

Make sure to install the dependencies:
```bash
# npm
npm install

# pnpm
pnpm install

# yarn
yarn install

# bun
bun install
```

Build your code:

```bash
# npm
npm run dev


# pnpm
pnpm run dev


# yarn
yarn dev


# bun
bun run dev

```

switch to backend folder (laravel app)

```
cd ../backend
```


Install all the dependencies using composer

```
composer install
```

Copy the example env file and make the required configuration changes in the .env file

```
cp .env.example .env
```

Generate a new application key

```
php artisan key:generate
```

Run the database migrations (**Set the database connection in .env before migrating**)

```
php artisan migrate
```

Run the database seeders (optional)

```
php artisan db:seed
```

Start the local development server

```
php artisan serve
```

You can now access the server at http://localhost:8000
