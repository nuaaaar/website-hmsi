
# Website HMSI ITK

Project ini merupakan  Website HMSI ITK.




## Jalankan Secara Lokal

- Clone project

  ```bash
    git clone https://github.com/nuaaaar/website-hmsi.git
  ```
- Buka XAMPP lalu jalankan Apache & MySQL
- Buat database dengan nama "hmsi"
- Buka terminal dan pindah ke direktori project

  ```bash
    cd website-hmsi
  ```
- Migrate database

  ```bash
    php artisan migrate --seed
  ```
- Link folder storage

  ```bash
    php artisan storage:link
  ```
- Jalankan project secara lokal

  ```bash
    php artisan serve
  ```

## Akses admin

- URL Dashboard : http://127.0.0.1:8000/login
    
    ```bash
      username: admin
      password: adm1n_
    ```

