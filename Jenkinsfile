pipeline {
  agent any
  stages {
    stage('install') {
      steps {
        sh 'composer install'
        sh 'cp .env.jenkins .env'
        sh 'php artisan key:generate'
        sh 'php artisan migrate:fresh --seed'
      }
    }
    stage('test') {
      steps {
        sh './vendor/bin/phpunit'
      }
    }
    stage('release') {
      steps {
        sh 'cd /home/lindale/apps/memomo'
        sh 'sudo git pull'
        sh 'sudo chown -R www-data:www-data .'
        sh 'sudo chmod -R 777 storage'
      }
    }
  }
}