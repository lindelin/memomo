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
  }
}