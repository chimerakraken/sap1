# SAP1

### Installation
1. Clone this repo ```git clone https://github.com/chimerakraken/sap1.git```.
2. Install dependencies via ```composer install``` and ```npm install && npm run dev```. _(You may need a higher privileged user account to execute this command)_
3. Copy ```.env.example``` to ```.env``` and configure based on your local machine's environment.
4. Generate application key via ```php artisan key:generate```.
5. Run database migration via ```php artisan migrate``` you may also append ```--seed``` command to generate and save default system configuration and values.
6. Finally run ```php artisan serve```.
