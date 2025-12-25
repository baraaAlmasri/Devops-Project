Devops Project – CI/CD Automated Restaurant Recommendation System
## Overview

This project demonstrates the automation of software development and deployment processes using a full CI/CD pipeline. The goal is to build a web-based Restaurant Recommendation System hosted on a virtualized environment and managed via automated workflows.

The system allows users to input their favorite meal and receive restaurant recommendations from a pre-populated database. The project leverages modern DevOps tools to ensure smooth integration, testing, and deployment.

## Features

Full Stack Web Application: Includes frontend, backend, and database components.

Database Integration: Stores a list of restaurants for recommendation queries.

User-Friendly GUI: Accepts user input and returns personalized restaurant recommendations.

Automated Git Workflow: Each team member pushes code changes automatically via a Bash script.

CI/CD Pipeline: Managed through Jenkins to pull, build, test, and deploy the application.

Dockerized Deployment: The application runs inside a Docker container for portability and consistency.

SSH Access: Client connects to the server via SSH using VSCode for remote development.

## Architecture

Application Server: Virtual machine or container hosting the application environment.

Client Machine: Connects to the server via SSH to develop and interact with the application.

GitHub Repository: Stores project code and enables team collaboration.

Jenkins CI/CD: Automates building, testing, and deploying updates to the application.

Docker Container: Hosts the application, ensuring consistency across environments...