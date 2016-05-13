# kisikisi.id

## to-do install
- install XAMPP
- install git (https://git-scm.com/downloads)
- install NodeJS (https://nodejs.org/en/download/)
- install composer (https://getcomposer.org/download/)
- install bower globally `npm install -g bower`
- Register trello.com
- Register git and ask to join team

## to-do first (do it with command/shell)
- change directory to htdocs directory `cd \xampp\htdocs`
- clone this repository `git clone https://github.com/kisikisi/kisikisi.git`
- change directory to kisikisi `cd kisikisi`
- install composer dependencies `composer install`
- install npm dependencies `npm install`
- install bower dependencies `bower install`
- run `composer dump-autoload`

## Create virtual host to running
- how to create virtual host on windows `https://delanomaloney.com/2013/07/10/how-to-set-up-virtual-hosts-using-xampp/`
- create virtual host for `C:\xampp\htdocs\kisikisi\` to `http://kisikisi.dev`
- create virtual host for `C:\xampp\htdocs\kisikisi\public` to `http://api.kisikisi.dev`
- create virtual host for `C:\xampp\htdocs\kisikisi\public` to `http://admin.kisikisi.dev`
- create virtual host for `C:\xampp\htdocs\kisikisi\storage\files` to `http://files.kisikisi.dev`
- Example:
`<VirtualHost *:80>
	DocumentRoot "C:/xampp/htdocs/kisikisi"
	ServerName testsite.dev
</VirtualHost>`

## Back-end Development Guide
- install any dependency using bower, ex: `bower install jquery-ui --save`
- save file at `resources` directory
- add bower_components file using gulpfile.js
- build files using gulp script
-- `gulp back-fontmin` to build font files
-- `gulp back-imagemin` to minimize image files
-- `gulp back-jsmin` to build js files
-- `gulp back-cssmin` to build css files

## Daftar nama tim
-
-
-
-