pipeline {
  agent any
  stages {
    stage('install') {
      steps {
        sh '''sudo composer install
cp .env.example .env
sudo php artisan key:generate'''
      }
    }
  }
}