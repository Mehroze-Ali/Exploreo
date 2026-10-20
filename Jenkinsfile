pipeline {
    agent any
    environment {
        EKS_CLUSTER      = 'dev-eks-cluster'
        AWS_REGION       = 'us-east-1'
        AWS_ACCOUNT_ID   = '123456789012'
        ECR_REPOSITORY   = 'springboot-app'
        IMAGE_TAG        = 'v1.0.${BUILD_NUMBER}'
        APP_NAME         = 'springboot-app'
        K8S_NAMESPACE    = 'default'
    }
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
        stage('3. SonarQube Scan') {
            steps {
                echo 'Running SonarQube analysis'
                withSonarQubeEnv('SonarQube') {
                    sh 'mvn sonar:sonar'
                }
            }
        }
        stage('4. Trivy File Scan') {
            steps {
                echo 'Scanning project files with Trivy'
                sh 'trivy fs .'
            }
        }
        stage('5. Docker Build') {
            steps {
                echo 'Building Docker image'
                sh 'docker build -t ${ECR_REPOSITORY}:${IMAGE_TAG} .'
            }
        }
        stage('6. Trivy Image Scan') {
            steps {
                echo 'Scanning Docker image with Trivy'
                sh 'trivy image ${ECR_REPOSITORY}:${IMAGE_TAG}'
            }
        }
        stage('7. Push Image to Amazon ECR') {
            steps {
                echo 'Pushing Docker image to Amazon ECR'
                withCredentials([
                    [class: 'AmazonWebServicesCredentialsBinding',
                     credentialsId: 'aws-creds']
                ]) {
                    sh '''
                    aws ecr get-login-password --region ${AWS_REGION} | \
                    docker login --username AWS --password-stdin \
                    ${AWS_ACCOUNT_ID}.dkr.ecr.${AWS_REGION}.amazonaws.com
                    docker tag ${ECR_REPOSITORY}:${IMAGE_TAG} ${AWS_ACCOUNT_ID}.dkr.ecr.${AWS_REGION}.amazonaws.com/${ECR_REPOSITORY}:${IMAGE_TAG}
                    docker push ${AWS_ACCOUNT_ID}.dkr.ecr.${AWS_REGION}.amazonaws.com/${ECR_REPOSITORY}:${IMAGE_TAG}
                    '''
                }
            }
        }
        stage('8. Deploy to Amazon EKS') {
            steps {
                echo "Deploying to Amazon EKS"
                sh '''
                aws eks update-kubeconfig --region ${AWS_REGION} --name ${EKS_CLUSTER}
                kubectl set image deployment/${APP_NAME} ${APP_NAME}=${AWS_ACCOUNT_ID}.dkr.ecr.${AWS_REGION}.amazonaws.com/${ECR_REPOSITORY}:${IMAGE_TAG} -n ${K8S_NAMESPACE}
                '''
            }
        }
        stage('9. Verify Deployment') {
            steps {
                echo 'Verifying deployment'
                sh 'kubectl get rollout status deployment/${APP_NAME} -n ${K8S_NAMESPACE} --timeout=120s'
                sh 'kubectl get pods -n ${K8S_NAMESPACE}'
                sh 'kubectl get svc -n ${K8S_NAMESPACE}'
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
