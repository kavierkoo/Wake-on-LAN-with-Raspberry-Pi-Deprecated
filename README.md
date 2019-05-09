# Project Title

Wake On LAN with Raspberry Pi

## Objective
As it is pretty hard to find a way to Wake on LAN to my devices within home network, I decided to build one myself.

This project allow users wake their PC with a hit of a button on any web browsers and uses minimal electricity.

With this, users can now put their computer to sleep and wake it up to remote in or access media / file server anytime.


## Getting Started
This guide will not cover installation of OS & packages, hardening of OS, and Networking.

As I am running my Raspberry Pi Zero W on Raspbian, hence there will be minimal security enabled.
Please harden the OS before publishing it to production as it is extremely vulnerable to any sorts of attack.

User are able to access from anywhere with Internet available,
To wake **devices within same Local Area Network (LAN) of Raspberry Pi** due to the limitation of Wake on LAN.

### Prerequisites
This Project uses: 
* Raspberry Pi Zero W : As it is cheap & low power consumption
* PHP 7
* Laravel v5.3.31 
* Mysql 
* Etherwake : For Wake On LAN
* Apache2 


### Installing

1. Download Wake-on-LAN-with-Raspberry-Pi

  ```
  git clone https://github.com/kavierkoo/Wake-on-LAN-with-Raspberry-Pi.git
  ```

2. Copy .env.example to .env

  Linux
  ```
  cp .env.example .env
  ```

  Windows
  ```
  copy .env.example .env
  ```

3. Change information in .env file 

4. Grant permission (Feel free to change to desire permission)
  ```
  sudo chown www-data:www-data /path/to/directory
  sudo chmod -R 775 /path/to/your/project
  ```

5. Generate key file
  ```
  php artisan key:generate
  ```

6. Generate database tables
  ```
  php artisan migrate
  ```

7. Apache directory point to public folder
  Example:
  ```
  /var/www/html/xxx/public
  ```

8. Restart apache service

9. You're good to go

# Demo
## Screenshot
### Mobile Site
  <img src="https://i.imgur.com/6QY5H7P.png">

### Desktop Site
  <img src="https://i.imgur.com/i7uVbjE.png">

## User Type:
### Admin:
* Trigger Wake on LAN : Click a Button to Wake On LAN
* Create
  * New User : Add new users
  * New Device : Add new device to wake on LAN
* Modify
  * User : Escalate / De-escalate users to User / Admin
  * Password : Change your own password
* Remove
  * User : Delete User
  * Device : Delete device to Wake On LAN
- Logout

### User:
* Trigger Wake on LAN : Click a Button to Wake On LAN
* Change Password : Change your own password
* Logout


## Author
Kavier Koo 
Any queries, please contact me [here](http://kavierkoo.com/#contact)

### License
This project is licensed under the [MIT License](https://opensource.org/licenses/MIT)
