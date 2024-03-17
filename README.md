# Project Setup Instructions

Follow these steps to set up the project on your local machine.

## Prerequisites

Ensure you have Composer and Node.js installed on your computer.

## Installation

1. **Clone the project:**
   Ensure you are in the root directory of your project.

2. **Install Composer Dependencies:**
   Run the following command:
   ```
   composer install
   ```
   When prompted to download optional packages, type `Y` to proceed.

3. **Set Up Environment File:**
   Copy the `.env.example` file and rename the copy to `.env`. Then, generate an application key using:
   ```
   php artisan key:generate
   ```

4. **Database Migration:**
   Run the migrations with the following command:
   ```
   php artisan migrate
   ```
   If prompted to add the database, type `Y`.

5. **Create Symbolic Link:**
   Execute the command below to create a symbolic link for the storage:
   ```
   php artisan storage:link
   ```

6. **Install Node.js Dependencies:**
   First, install Vite globally using:
   ```
   npm install -g create-vite
   ```
   Then, install the project's Node.js dependencies:
   ```
   npm install
   ```

7. **Run Development Server:**
   Start the Vite development server using:
   ```
   npm run dev
   ```
   Open a new terminal, navigate to your project directory, and start the Laravel development server:
   ```
   php artisan serve
   ```

## Post-Installation

Ensure to update the `.env` file variables to match your local environment settings.

Now, your project should be up and running on your local machine!
