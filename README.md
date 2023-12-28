## Laravel Social Media API

This document outlines the API for a Laravel-based social media application. 

**Features:**

* User registration and login
* Profile management
* Following and unfollowing users
* Posting and managing content (text, images, videos)
* Liking and commenting on content
* Chatting with other users
* Notifications for new activities

**Installation:**

1. Clone the repository.
2. Run `composer install` to install dependencies.
3. Copy the `.env.example` file to `.env` and configure database and application settings.
4. Run `php artisan migrate` to create database tables.
5. Run `php artisan key:generate` to generate an application key.
6. Run `php artisan serve` to start the development server.

**API Endpoints:**

* **Users:**
    * `/users` (GET): Get all users.
    * `/users/{id}` (GET): Get specific user by ID.
    * `/users/{id}/posts` (GET): Get all posts of a specific user.
    * `/users/{id}/followers` (GET): Get all followers of a specific user.
    * `/users/{id}/following` (GET): Get all users followed by a specific user.
    * `/register` (POST): Register a new user.
    * `/login` (POST): Login a user.
    * `/users/{id}` (PUT): Update user profile.
    * `/users/{id}` (DELETE): Delete a user.

* **Posts:**
    * `/posts` (GET): Get all posts.
    * `/posts/{id}` (GET): Get specific post by ID.
    * `/posts` (POST): Create a new post.
    * `/posts/{id}` (PUT): Update a post.
    * `/posts/{id}` (DELETE): Delete a post.

* **Likes:**
    * `/posts/{id}/likes` (GET): Get all likes for a post.
    * `/posts/{id}/like` (POST): Like a post.
    * `/posts/{id}/unlike` (DELETE): Unlike a post.

* **Comments:**
    * `/posts/{id}/comments` (GET): Get all comments for a post.
    * `/posts/{id}/comments` (POST): Create a new comment on a post.
    * `/posts/{id}/comments/{comment_id}` (PUT): Update a comment.
    * `/posts/{id}/comments/{comment_id}` (DELETE): Delete a comment.

* **Chat:**
    * `/chat/messages/{user_id}` (GET): Get all messages with a specific user.
    * `/chat/messages` (POST): Send a new message.

* **Notifications:**
    * `/notifications/{user_id}` (GET): Get all notifications for a user.
    * `/notifications/{id}` (PUT): Mark a notification as read.

**Authentication:**

The API uses JWT (JSON Web Token) for authentication. A token is generated when a user logs in and should be sent with subsequent requests in the Authorization header.

**Example Usage:**

1. Register a new user:

```
POST /register

Content-Type: application/json

{
  "name": "John Doe",
  "email": "johndoe@example.com",
  "password": "secret"
}
```

2. Get all posts:

```
GET /posts

Authorization: Bearer <token>
```

3. Create a new post:

```
POST /posts

Authorization: Bearer <token>

Content-Type: application/json

{
  "body": "This is my first post!"
}
```

**Additional Notes:**

* This is a basic example, and additional endpoints and functionality can be added as needed.
* Error responses will be returned in JSON format with an appropriate status code.
* Refer to the Laravel documentation for further information on API development.

**Feel free to contribute to this API and make it your own!**
