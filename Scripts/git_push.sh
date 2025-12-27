#!/bin/bash

USER_NAME=$(whoami)

cd /home/$USER_NAME/Devops-Project || exit 1

echo "Current git status:"
git status

CURRENT_BRANCH=$(git branch --show-current)
echo "Current branch: $CURRENT_BRANCH"

read -p "Enter branch to push to (default: $CURRENT_BRANCH): " BRANCH
BRANCH=${BRANCH:-$CURRENT_BRANCH}

git checkout "$BRANCH" || { echo "Branch not found"; exit 1; }

echo "Enter commit message :"
read MESSAGE

if [ $# -eq 0 ]; then
    echo "No files specified. Adding all changes..."
    git add .
else
    echo "Adding files: $*"
    git add "$@"
fi

git commit -m "$MESSAGE"

git push origin "$BRANCH"
