<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Installation

**2. Install Laravel**

```
  cp .env.example .env
  composer install
  php artisan key:generate
  php artisan migrate 
  php artisan db:seed
```

**3. Install NPM**

```
  npm install
```

**4. Run Project**

```
  npm run build
  php artisan serve
```

## API List

**1. Login Device**
```

Endpoint URL: /api/device/login
Method: POST
Request(JSON):

        {
            "deviceToken": "8096-70085-0610-BX-7108"
        }
Example Response(JSON):

        {
            "success": true,
            "message": "Login success",
            "data": {
                "config": [],
                "is_premium": 0
        }
}   
     
```

**2. Subscribe**
```

Endpoint URL: /api/device/subscribe
Method: POST
Request(JSON):

        {
            "deviceToken": "8096-70085-0610-BX-7108",
            "productId": "2",
            "receiptToken": "AXW345STYUJ56B8JKS"
        }
Example Response(JSON):

        {
            "success": true,
            "message": "Subscription completed"
        }
}   
     
```

Run Postman: https://documenter.getpostman.com/view/4871431/2s9YRDzVpw
