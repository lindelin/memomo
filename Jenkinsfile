pipeline {
  agent any
  stages {
    stage('install') {
      steps {
        sh '''composer install
cp .env.example .env
php artisan key:generate'''
      }
    }
  }
}