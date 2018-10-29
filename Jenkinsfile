pipeline {
  agent any
  stages {
    stage('Install') {
      steps {
        sh 'composer install'
        sh 'cp .env.jenkins .env'
        sh 'php artisan key:generate'
        sh 'php artisan migrate:fresh --seed'
      }
    }
    stage('Test') {
      steps {
        sh './vendor/bin/phpunit'
      }
    }
    stage('Release') {
      steps {
        sh '''cd /home/lindale/apps/memomo
sudo git pull
sudo chown -R www-data:www-data .
sudo chmod -R 777 storage'''
      }
    }
  }
}