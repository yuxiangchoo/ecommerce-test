#!/bin/bash

echo
echo -e "\e[36mBuild Bagisto Container\e[0m"
echo -e "\e[31m------------------------------------\e[0m"
source /root/docker/project/bagisto/workspace/bagisto/scripts/build-bagisto.sh
echo -e "\e[31m------------------------------------\e[0m"
echo

# Wait for a short time to allow the application to start
echo -e "\e[36mStarting Bagisto Container\e[0m"
docker run -d \
  --name bagisto \
  -p 8000:8000 \
  -v /root/docker/volume/bagisto_mnt/storage:/var/www/html/bagisto/storage \
  bagisto2025/bagisto:SNAPSHOT
echo "Started successfully!"

# Define the URL to check
URL="https://the9sen.com"

# Define the timeout in seconds
TIMEOUT=10

# Define the interval between checks in seconds
INTERVAL=5

# Calculate the number of iterations based on the timeout and interval
ITERATIONS=$((TIMEOUT / INTERVAL))

# Loop to check the URL
for ((i = 0; i < ITERATIONS; i++)); do
  # Make the curl request and store the HTTP status code
  HTTP_STATUS=$(curl -s -o /dev/null -w "%{http_code}" "$URL")

  # Check if the HTTP status code is 200
  if [ "$HTTP_STATUS" -eq 200 ]; then
    echo
    echo -e "\e[36mDocker Logs: Bagisto Container\e[0m"
    echo -e "\e[31m------------------------------------\e[0m"
    sudo docker logs bagisto
    echo -e "\e[31m------------------------------------\e[0m"
    echo
    echo -e "\e[36mDeployment & Health check successful!\e[0m"

    TIMEOUT=15

    # Clear caches
    echo
    echo -e "\e[36mStarting Clear Caches\e[0m"
    docker exec bagisto php artisan config:clear
    docker exec bagisto php artisan cache:clear
    docker exec bagisto php artisan view:clear
    docker exec bagisto php artisan route:clear
    docker exec bagisto php artisan optimize:clear
    echo -e "\e[36mClear Caches successful!\e[0m"
    echo

    # Rebuild necessary caches
    #echo -e "\e[36mRebuild necessary caches successful!\e[0m"
    #docker exec bagisto php artisan config:cache
    #docker exec bagisto php artisan route:cache
    
    #echo
    #echo -e "\e[36mRestarting Bagisto Container\e[0m"
    #docker restart bagisto
    #echo -e "\e[36mRestart Bagisto Container Successful!\e[0m"
    #echo

    #echo -e "\e[36mClear Unused Docker Images Successful!\e[0m"
    #yes | docker system prune

    exit 0 # Exit with success status code
  fi

  # Sleep for the specified interval
  echo "Sleep for $INTERVAL second before next healthcheck"
  sleep "$INTERVAL"
done

# If the loop completes without a successful health check, print an error message
sudo docker logs bagisto
echo "Health check failed: URL did not return 200 status code within $TIMEOUT seconds"
exit 1 # Exit with failure status code


