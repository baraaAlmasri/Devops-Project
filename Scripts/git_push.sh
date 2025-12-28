echo "Navigating to project directory..."

cd ~/Devops-Project || { echo "Project directory not found"; exit 1; }

CURRENT_BRANCH=$(git branch --show-current)

echo "Current git status:"
git status
echo "---------------------------"

echo "Enter files to commit (use space to separate multiple files or . for all files)"
read FILES

if [ "$FILES" != "." ];
 then
    for f in $FILES;
     do
        if ! [ -e "$f" ];
         then
            echo "File not found: $f"
            exit 1
        fi
    done
fi

echo "Enter your commit message:"
read COMMIT_MSG


echo "Enter branch to push to (press Enter to use current branch: $CURRENT_BRANCH):"
read BRANCH
if [ -z "$BRANCH" ];
 then
  BRANCH="$CURRENT_BRANCH"
fi

git add $FILES

git commit -m "$COMMIT_MSG"


git push origin $BRANCH

echo "Files pushed successfully to branch: $BRANCH"