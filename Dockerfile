# Use the official PHP image
FROM php:8.2-cli

# Set the working directory inside the container
WORKDIR /app

# Copy all files into the container
COPY . /app

# Expose port 8080
EXPOSE 8080

# Command to start the PHP built-in server
CMD ["php", "-S", "0.0.0.0:8080", "-t", "."]
