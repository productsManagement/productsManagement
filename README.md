# productsManagement

SELECT concat( "'", column_name, "', " ) FROM information_schema.columns WHERE table_name = 'promotions'

Install:
	Run on terminal:
		php artisan key:generateInstall
		sudo composer update


Run:
	php artisan serve


composer search <part of package name>

composer require --dev <package name>

php artisan db:seed --class=ProductsTableSeeder

git remote add <master_name> <link github>  //tao 1 lan
git remote add origin <fork_name> <link fork github> //tao 1 lan

git pull --rebase <master_name> master

git checkout -b <branch name2>
git add -A
git commit -m "meassage"
git push -f origin name2
	