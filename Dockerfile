# Use an official PHP runtime as the base image
FROM php:8.2-cli

# Set the working directory inside the container
WORKDIR /app

# Copy all the files from your project into the container
COPY . /app

# Expose port 8080 to the outside world
EXPOSE 8080

# Start the built-in PHP server when the container runs
CMD ["php", "-S", "0.0.0.0:8080", "-t", "."]
