#!/bin/bash
set -e

export HOME=/root
export GIT_SSH_COMMAND='ssh -i /root/.ssh/github_ed25519 -o IdentitiesOnly=yes'

# 定义所有变量
WORKDIR="/root/docker/project/bagisto/workspace/bagisto"
BRANCH="main"
TAG="SNAPSHOT"
RETAG="${RETAG:-true}"
IMAGE_NAME="bagisto2025/bagisto"

cd "$WORKDIR"

echo "==> Step 1: Fetch latest code and manage tags"
git fetch --all --tags
git checkout "$BRANCH"
git pull origin "$BRANCH"

echo "==> Step 2: Check Git Tag: $TAG"

if git rev-parse -q --verify "refs/tags/$TAG" >/dev/null; then
    echo "Tag $TAG already exists."

    if [ "$RETAG" == true ]; then
        echo "RETAG=true, retagging..."
        git tag -d "$TAG" 2>/dev/null || true
        git push origin --delete "$TAG" 2>/dev/null || true
        git tag -a "$TAG" -m "Tagging branch $BRANCH at $(date +%Y-%m-%d)"
        git push origin "$TAG"
    else
        echo "RETAG=false, checkout existing tag."
        git checkout "tags/$TAG"
        current_tag_revision=$(git describe --tags --abbrev=0)
        echo "Current tag revision: $current_tag_revision"
    fi
else
    echo "Tag $TAG does not exist. Creating..."
    git tag -a "$TAG" -m "Tagging branch $BRANCH at $(date +%Y-%m-%d)"
    git push origin "$TAG"
fi

echo "==> Step 3: Docker operations"

if docker ps -a --format '{{.Names}}' | grep -q '^bagisto$'; then
    docker stop bagisto 2>/dev/null
    docker rm bagisto
    echo "Bagisto container removed"
else
    echo "Bagisto container does not exist"
fi

echo "Build Docker image: ${IMAGE_NAME}:${TAG}"
docker build -t "${IMAGE_NAME}:${TAG}" .

echo "Logout from Docker Hub"
docker logout

echo "All done! Image pushed: ${IMAGE_NAME}:${TAG}"
echo "Build completed successfully!"