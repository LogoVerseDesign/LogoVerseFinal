# Use the official PHP runtime
FROM php:8.2-cli

# Set the working directory
WORKDIR /app

# Copy all project files to the container
COPY . /app

# Expose port 8080
EXPOSE 8080

# Start the built-in PHP server
CMD ["php", "-S", "0.0.0.0:8080", "-t", "."]
