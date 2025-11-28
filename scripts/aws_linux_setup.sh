#!/bin/bash

echo "==== 1. 更新系统 ===="
sudo dnf update -y

echo "==== 2. 安装 PHP 8.1 + 扩展 ===="
sudo amazon-linux-extras enable php8.1
sudo dnf clean metadata
sudo dnf install -y php php-cli php-pdo php-mysqlnd php-mbstring php-xml php-bcmath php-curl php-zip php-gd php-fpm php-common

echo "==== 3. 安装 nginx ===="
sudo dnf install -y nginx

echo "==== 4. 安装 Composer（稳定版） ===="
EXPECTED_CHECKSUM="$(php -r 'copy("https://composer.github.io/installer.sig", "php://stdout");')"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '$EXPECTED_CHECKSUM') { echo '✅ Installer verified'; } else { echo '❌ Installer corrupt'; unlink('composer-setup.php'); exit(1); } echo PHP_EOL;"
php composer-setup.php
sudo mv composer.phar /usr/local/bin/composer
rm composer-setup.php

echo "==== 5. 安装 Node.js 18 + yarn ===="
curl -fsSL https://rpm.nodesource.com/setup_18.x | sudo bash -
sudo dnf install -y nodejs
sudo npm install -g yarn

echo "==== 6. 安装 Docker ===="
sudo dnf install -y docker
sudo systemctl enable docker
sudo systemctl start docker
sudo usermod -aG docker $USER

echo "==== 7. 启动服务（PHP-FPM + nginx + docker） ===="
sudo systemctl enable php-fpm
sudo systemctl start php-fpm
sudo systemctl enable nginx
sudo systemctl start nginx

echo "==== ✅ 环境安装完成！ ===="
php -v
composer --version
node -v
yarn -v
docker --version

echo "==== 🔁 请重新登录 SSH 以使 Docker 用户权限生效 ===="
