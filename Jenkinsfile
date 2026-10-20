pipeline {
    agent any
    stages {
        stage('1. Checkout Source') {
            steps {
                echo 'Checking out code from GitHub'
                git branch: 'main',
                    credentialsId: 'github-token',
                    url: 'https://github.com/Mehroze-Ali/Exploreo.git'
            }
        }
        stage('2. Maven Build') {
            steps {
                echo 'Building the application with Maven'
                sh 'mvn clean package -DskipTests'
            }
        }
    }
    post {
        success {
            echo "SUCCESS : ${JOB_NAME} #${BUILD_NUMBER}"
        }
        failure {
            echo 'Cleaning workspace'
            cleanWs()
        }
    }
}
