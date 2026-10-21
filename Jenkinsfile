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
        stage('3. Deploy MySQL Database') {
            steps {
                echo 'Deploying MySQL Database Container...'
                sh '''
                docker run -d \
                  --name exploreo-db \
                  --network exploreo-net \
                  -e MYSQL_ROOT_PASSWORD=rootpassword \
                  -e MYSQL_DATABASE=exploreodb \
                  -p 3306:3306 \
                  mysql:8.0
                '''
            }
        }
        stage('4. Deploy Exploreo Application') {
            steps {
                echo 'Running Exploreo Application Container...'
                sh '''
                docker run -d \
                  --name exploreo-app \
                  --network exploreo-net \
                  -p 80:8080 \
                  springboot-app:1.0.0
                '''
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
