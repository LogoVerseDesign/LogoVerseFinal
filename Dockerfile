# Use an official PHP runtime as a base image
FROM php:8.2-cli

# Set the working directory
WORKDIR /app

# Copy the app files to the container
COPY . /app

# Expose port 8080
EXPOSE 8080

# Start the PHP built-in server
CMD ["php", "-S", "0.0.0.0:8080", "-t", "."]
