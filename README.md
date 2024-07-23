# Tanjung Mulia Informatika Technical Test

This project is a Laravel 11 application using Admin LTE v3, MySQL 8, and Tailwind CSS. It includes features for user authentication, a dashboard, and the ability for users to upload multiple posts.

## Installation

### Prerequisites
- PHP 8.0 or higher
- Composer
- Node.js & npm
- MySQL 8

### Steps
1. Clone the repository:
    ```sh
    git clone https://github.com/yourusername/tanjung-mulia-informatika-technical-test.git
    cd tanjung-mulia-informatika-technical-test
    ```

2. Install PHP dependencies:
    ```sh
    composer install
    ```

3. Install Node dependencies:
    ```sh
    npm install
    ```

4. Copy `.env.example` to `.env` and configure your database settings:
    ```sh
    cp .env.example .env
    ```

5. Generate application key:
    ```sh
    php artisan key:generate
    ```

6. Run database migrations:
    ```sh
    php artisan migrate
    ```

7. Serve the application:
    ```sh
    php artisan serve
    ```

## Features
- User Authentication (Login, Register, Logout)
- Dashboard
- Post Management (CRUD)
- Users can upload multiple posts

## Usage
1. Register a new user or log in with an existing account.
2. Access the dashboard to manage posts.
3. Upload, edit, or delete posts.

## ERD
```mermaid
erDiagram
    USERS {
        int id
        string name
        string email
        string password
    }
    POSTS {
        int id
        string image
        string caption
        int user_id
    }
    DASHBOARDS {
        int id
        int user_id
    }
    USERS ||--o{ POSTS : "has"
    USERS ||--o{ DASHBOARDS : "has"
    POSTS ||--|{ DASHBOARDS : "belongs to"
```

## Flowchart
```mermaid
flowchart TD
    Start --> |User Authentication| A[Login]
    A --> |Success| B[Dashboard]
    B --> |Manage Posts| C[Add Post]
    B --> |Manage Posts| D[Edit Post]
    B --> |Manage Posts| E[Delete Post]
    C --> End
    D --> End
    E --> End
    A --> |Fail| F[Register]
    F --> B
    End
```


## Activity Diagram
```mermaid
sequenceDiagram
    participant User
    participant System

    User->>System: Register
    System-->>User: Registration Form
    User->>System: Submit Registration
    System-->>User: Registration Success

    User->>System: Login
    System-->>User: Login Form
    User->>System: Submit Login
    System-->>User: Login Success

    User->>System: View Dashboard
    System-->>User: Display Dashboard

    User->>System: Add Post
    System-->>User: Add Post Form
    User->>System: Submit Post
    System-->>User: Post Added

    User->>System: Edit Post
    System-->>User: Edit Post Form
    User->>System: Submit Post
    System-->>User: Post Updated

    User->>System: Delete Post
    System-->>User: Confirm Delete
    User->>System: Confirm
    System-->>User: Post Deleted
```

## Contributing
This project is for demonstration and technical test purposes. However, feedback and suggestions are welcome.

## Contact
Adisa Laras Pertiwi - adisalaras41@gmail.com
