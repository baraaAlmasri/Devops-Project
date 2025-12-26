#!/bin/bash
echo "Enter the commit message"
read Message
User=`whoami`
cd /home/$User/Devops-Project
git add .
git commit -m "$Message"
git push origin Testing
